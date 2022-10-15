<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSnippetRequest;
use App\Http\Requests\UpdateSnippetRequest;
use App\Models\Snippet;
use App\Models\SnippetFile;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SnippetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('snippets.index', [
            'snippets' => Snippet::all()->sortByDesc->updated_at,
        ]);
    }

    public function author(User $author)
    {
        return view('snippets.index', [
            'snippets' => $author->snippets->sortByDesc->updated_at,
            'type' => 'author',
            'author' => $author,
        ]);
    }

    public function tag(Tag $tag)
    {
        return view('snippets.index', [
            'snippets' => $tag->snippets->sortByDesc->updated_at,
            'type' => 'tag',
            'tag' => $tag,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('snippets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSnippetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSnippetRequest $request)
    {
        $attributes = $request->validated();

        $attributes['author_id'] = $request->user()->id;

        /** @var Snippet $snippet */
        $snippet = Snippet::create($attributes);

        if ($request->has('tags')) {
            $tags = json_decode($request->input('tags'));

            foreach ($tags as $entry) {
                $tag = Tag::firstOrCreate([
                    'name' => mb_strtolower($entry->value),
                ]);

                $snippet->tags()->attach($tag);
            }
        }

        if ($request->has('files')) {
            $files = json_decode($request->input('files'));
            foreach ($files as $data) {
                $snippet->files()->create([
                    'filename' => $data->filename,
                    'content' => $data->content,
                    'type' => $data->type,
                    'syntax' => $data->syntax,
                ]);
            }
        }

        return redirect()->route('snippets.show', ['snippet' => $snippet]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function show(Snippet $snippet)
    {
        $snippet->increment('views');

        return view('snippets.show', ['snippet' => $snippet]);
    }

    public function raw(Snippet $snippet)
    {
        return response(
            content: $snippet->content,
            headers: [
                'Content-Type' => 'text/plain',
            ],
        );
    }

    public function rawFile(SnippetFile $file)
    {
        return response(
            content: $file->content,
            headers: [
                'Content-Type' => 'text/plain',
            ],
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function edit(Snippet $snippet)
    {
        return view('snippets.edit', ['snippet' => $snippet]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSnippetRequest  $request
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSnippetRequest $request, Snippet $snippet)
    {
        $attributes = $request->validated();

        $snippet->update($attributes);

        if ($request->has('tags')) {
            $newTags = [];
            $tags = json_decode($request->input('tags'));

            foreach ($tags as $entry) {
                $tag = Tag::firstOrCreate([
                    'name' => mb_strtolower($entry->value),
                ]);

                $newTags[] = $tag->id;
            }

            $snippet->tags()->sync($newTags);
        }

        if ($request->has('files')) {
            $files = json_decode($request->input('files'));
            $savedFiles = [];

            foreach ($files as $data) {
                if ($data->id === 'new') {
                    $file = $snippet->files()->create([
                        'filename' => $data->filename,
                        'content' => $data->content,
                        'type' => $data->type,
                        'syntax' => $data->syntax,
                    ]);
                    $savedFiles[] = $file->id;
                } else {
                    $file = SnippetFile::find($data->id);
                    if ($file !== null) {
                        $file->filename = $data->filename;
                        $file->content = $data->content;
                        $file->type = $data->type;
                        $file->syntax = $data->syntax;
                        $file->save();
                        $savedFiles[] = $file->id;
                    }
                }
            }

            SnippetFile::whereNotIn('id', $savedFiles)->delete();
        }

        return redirect()->route('snippets.show', ['snippet' => $snippet->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Snippet $snippet)
    {
        //
    }
}
