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

Route::get('/dashboard', function () {
    return view('dashboard', [
        'latestSnippets' => Snippet::orderBy('created_at', 'desc')->take(5)->get(),
        'mostViewedSnippets' => Snippet::orderBy('views', 'desc')->take(5)->get(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('snippets')
    ->controller(SnippetController::class)
    ->middleware(['auth'])
    ->group(function () {
        Route::get('author/{author}', 'author')->name('snippets.author');
        Route::get('tag/{tag:name}', 'tag')->name('snippets.tag');
    });

Route::resource('snippets', SnippetController::class)->middleware(['auth']);

require __DIR__ . '/auth.php';
