<?php

namespace App\Http\Controllers;

use App\Models\Snippet;
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
            'snippets' => Snippet::where('author_id', $author->id)->get()->sortByDesc->updated_at,
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required', 'unique:snippets'],
            'content' => ['required'],
        ]);

        $attributes['author_id'] = $request->user()->id;

        $snippet = Snippet::create($attributes);

        if ($request->has('tags')) {
            $tags = $request->string('tags')->explode('|');

            foreach ($tags as $name) {
                $tag = Tag::firstOrCreate([
                    'name' => mb_strtolower($name),
                ]);

                $snippet->tags()->attach($tag);
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Snippet  $snippet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Snippet $snippet)
    {
        $attributes = $request->validate([
            'title' => ['required', Rule::unique('snippets')->ignore($snippet)],
            'content' => ['required'],
        ]);

        $snippet->update($attributes);

        if ($request->has('tags')) {
            $newTags = [];
            $tags = $request->string('tags')->explode('|');

            foreach ($tags as $name) {
                $tag = Tag::firstOrCreate([
                    'name' => mb_strtolower($name),
                ]);

                $newTags[] = $tag->id;
            }

            $snippet->tags()->sync($newTags);
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
