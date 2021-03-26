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

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();

//questa route mi indirizza grazie al PostController a tutti i post grazie al metodo @index
Route::get('/posts', 'PostController@index')->name('guest.post.index');

//questa route mi indirizza al post selezionato grazie al PostController e al metodo @show
Route::get('/posts/{slug}', 'PostController@show')->name('guest.post.show');

Route::prefix('admin')
//Cartella in cui é situtato il controller per GUEST
->namespace('Admin')
->middleware('auth')
->group(function(){
    Route::get('/', 'HomeController@index')
    ->name('home');
    // Route::resource('/post', 'PostController');
    //successivamente posso inserirci tutte le rotte di cui ho bisogno
    Route::resource( '/post', 'PostController');
});

// Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');


// Route::get('admin/prova', function(){
//     return view('admin.post.index');
//     // return 'ciao';
// });
