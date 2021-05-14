<?php

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/web/dashboard', \App\Http\Livewire\Web\Dashboard::class)->name('web.dashboard');
    Route::get('/web/articles', \App\Http\Livewire\Web\Articles::class);
    Route::get('/web/pages', \App\Http\Livewire\Web\Pages::class);

    Route::get('/web/article/{method}/{uid?}', \App\Http\Livewire\Form\Article::class);
    Route::get('/content/{post}/{version}', \App\Http\Livewire\Content\Visual::class);

    Route::get('/user/profile', \App\Http\Livewire\User\Profile::class)->name('profile.show');
});
