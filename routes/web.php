<?php

use App\Http\Controllers\SnippetController;
use App\Models\Snippet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function (Request $request) {
    if ($request->user() === null) {
        return redirect()->route('login');
    }

    return redirect()->route('dashboard');
});

Route::get('/dashboard', function (Request $request) {
    return view('dashboard', [
        'latestSnippets' => Snippet::latest()->take(5)->get(),
        'mostViewedSnippets' => Snippet::orderBy('views', 'desc')->take(5)->get(),
        'favoriteSnippets' => $request->user()->favorites()->simplePaginate(5),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('snippets')
    ->controller(SnippetController::class)
    ->middleware(['auth'])
    ->group(function () {
        Route::get('favorites', 'favorites')->name('snippets.favorites');
        Route::get('author/{author}', 'author')->name('snippets.author');
        Route::get('tag/{tag:name}', 'tag')->name('snippets.tag');
        Route::get('file/{file}/raw', 'rawFile')->name('snippets.raw_file');
        Route::get('file/{file}/download', 'downloadFile')->name('snippets.download_file');
        Route::get('{snippet}/raw', 'raw')->name('snippets.raw');
    });

Route::resource('snippets', SnippetController::class)->middleware(['auth']);

require __DIR__ . '/auth.php';
