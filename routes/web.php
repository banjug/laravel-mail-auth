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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/', 'GuestController@index')->name('home');

Route::post('/register', 'Auth\RegisterController@register')->name('register');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// rotte delle pagine dei videogiochi
Route::middleware('auth')->prefix('/games')->group(function() { //posso aggiungere ->prefix('games') siccome le rotte sono raggruppate e aggiunge /games prima di ogni url
    Route::get('/', 'GamesController@games')->name('games');   
});

// rotte api per passare dati a VUE
Route::get('/api/games/list', 'ApiController@getGames')->name('api.games.list');