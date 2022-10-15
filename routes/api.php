<?php

use App\Models\Snippet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('search', function (Request $request) {
    return Snippet::search($request->input('q'))
        ->get()
        ->map(fn ($s) => [
            'id' => $s->id,
            'title' => $s->title,
            'link' => route('snippets.show', ['snippet' => $s->id]),
        ]);
});
