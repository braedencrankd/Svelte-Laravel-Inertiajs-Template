<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use Statamic\Facades\Entry;

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


require __DIR__ . '/auth.php';


Route::get('/', function () {


    $entries = Entry::query()
        ->where('collection', 'posts')
        ->limit(5)
        ->get();

    $entry = Entry::findBySlug('first-post', 'posts');

    // $entry = Entry::make()
    //     ->published()
    //     ->data(['title' => 'Updated Title'])
    //     ->etc();

    // $entry->save();

    echo '<pre>', print_r($entry, true), '</pre>';

    $posts = Entry::query()
        ->where('collection', 'posts')->find('first-post');

    $user = optional(auth()->user())->getAttributes();

    return Inertia::render('Welcome', [
        'user' => $user,
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::get('/posts/{slug}', function ($slug) {

    $post = Entry::findBySlug($slug, 'posts');

    $post->set('title', 'bar');
    $post->save();
    return Inertia::render('posts/show', [
        'post' => $post,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
