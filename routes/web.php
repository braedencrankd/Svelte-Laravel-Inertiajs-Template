<?php

use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
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

    // $sections = [
    //     [
    //         'bg' => 'bg-primary',
    //         'blocks' => [
    //             ['id' => 'text-block-one', 'heading' => 'TEST'],
    //             ['id' => 'text-block-two', 'heading' => 'TEST'],
    //         ],
    //     ],
    //     [
    //         'bg' => 'bg-primary',
    //         'blocks' => [
    //             ['id' => 'text-block-one', 'heading' => 'TEST'],
    //             ['id' => 'text-block-two', 'heading' => 'TEST'],
    //         ],
    //     ],
    // ];

    // echo '<pre>', print_r($sections, true), '</pre>';
    // echo '<pre>', print_r(json_encode($sections), true), '</pre>';

    // $entry = Entry::make()
    //     ->published()
    //     ->data(['title' => 'Updated Title'])
    //     ->etc();

    // $entry->save();

    // echo '<pre>', print_r($entry, true), '</pre>';

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