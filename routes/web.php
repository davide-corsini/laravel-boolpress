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
//*rotta per collegare contatti.blade.php
Route::get('/contatti', 'HomeController@contatti')->name('guest.contatti');

//*rotta per il form action del file contatti.blade.php
Route::post('/contatti', 'HomeController@sendcontact')->name('guest.contatti.sent');

//rotta per esito messaggio
Route::get('/inviato', 'HomeController@contattoInviato')->name('validation');

Route::prefix('admin')
//Cartella in cui é situtato il controller per GUEST
->namespace('Admin')
->middleware('auth')
->group(function(){
    Route::get('/', 'HomeController@index')
    ->name('home');
    //Rotta per vedere i dati dell'utente
    Route::get('/profile', 'HomeController@profile')->name('profile');
    //rotta per la action di genera il token nel file profile.blade
    Route::post('/genera-token', 'HomeController@generaToken')->name('genera-token');
    //successivamente posso inserirci tutte le rotte di cui ho bisogno
    Route::resource( '/post', 'PostController');

});

// Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');


// Route::get('admin/prova', function(){
//     return view('admin.post.index');
//     // return 'ciao';
// });


// +--------+-----------+------------------------+------------------+------------------------------------------------------------------------+------------+
// | Domain | Method    | URI                    | Name             | Action
//                              | Middleware |
// +--------+-----------+------------------------+------------------+------------------------------------------------------------------------+------------+
// |        | GET|HEAD  | /                      | index            | App\Http\Controllers\HomeController@index 
//                              | web        |
// |        | GET|HEAD  | admin                  | home             | App\Http\Controllers\Admin\HomeController@index                        | web        |
// |        |           |                        |                  |
//                              | auth       |
// |        | POST      | admin/post             | post.store       | App\Http\Controllers\Admin\PostController@store                        | web        |
// |        |           |                        |                  |
//                              | auth       |
// |        | GET|HEAD  | admin/post             | post.index       | App\Http\Controllers\Admin\PostController@index                        | web        |
// |        |           |                        |                  |
//                              | auth       |
// |        | GET|HEAD  | admin/post/create      | post.create      | App\Http\Controllers\Admin\PostController@create                       | web        |
// |        |           |                        |                  |
//                              | auth       |
// |        | DELETE    | admin/post/{post}      | post.destroy     | App\Http\Controllers\Admin\PostController@destroy                      | web        |
// |        |           |                        |                  |
//                              | auth       |
// |        | PUT|PATCH | admin/post/{post}      | post.update      | App\Http\Controllers\Admin\PostController@update                       | web        |
// |        |           |                        |                  |
//                              | auth       |
// |        | GET|HEAD  | admin/post/{post}      | post.show        | App\Http\Controllers\Admin\PostController@show                         | web        |
// |        |           |                        |                  |
//                              | auth       |
// |        | GET|HEAD  | admin/post/{post}/edit | post.edit        | App\Http\Controllers\Admin\PostController@edit                         | web        |
// |        |           |                        |                  |
//                              | auth       |
// |        | GET|HEAD  | api/user               |                  | Closure
//                              | api        |
// |        |           |                        |                  |
//                              | auth:api   |
// |        | POST      | login                  |                  | App\Http\Controllers\Auth\LoginController@login                        | web        |
// |        |           |                        |                  |
//                              | guest      |
// |        | GET|HEAD  | login                  | login            | App\Http\Controllers\Auth\LoginController@showLoginForm                | web        |
// |        |           |                        |                  |
//                              | guest      |
// |        | POST      | logout                 | logout           | App\Http\Controllers\Auth\LoginController@logout                       | web        |
// |        | POST      | password/confirm       |                  | App\Http\Controllers\Auth\ConfirmPasswordController@confirm            | web        |
// |        |           |                        |                  |
//                              | auth       |
// |        | GET|HEAD  | password/confirm       | password.confirm | App\Http\Controllers\Auth\ConfirmPasswordController@showConfirmForm    | web        |
// |        |           |                        |                  |
//                              | auth       |
// |        | POST      | password/email         | password.email   | App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail  | web        |
// |        | POST      | password/reset         | password.update  | App\Http\Controllers\Auth\ResetPasswordController@reset                | web        |
// |        | GET|HEAD  | password/reset         | password.request | App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm | web        |
// |        | GET|HEAD  | password/reset/{token} | password.reset   | App\Http\Controllers\Auth\ResetPasswordController@showResetForm        | web        |
// |        | GET|HEAD  | posts                  | guest.post.index | App\Http\Controllers\PostController@index 
//                              | web        |
// |        | GET|HEAD  | posts/{slug}           | guest.post.show  | App\Http\Controllers\PostController@show  
//                              | web        |
// |        | POST      | register               |                  | App\Http\Controllers\Auth\RegisterController@register                  | web        |
// |        |           |                        |                  |
//                              | guest      |
// |        | GET|HEAD  | register               | register         | App\Http\Controllers\Auth\RegisterController@showRegistrationForm      | web        |
// |        |           |                        |                  |
//                              | guest      |
// +--------+-----------+------------------------+------------------+------------------------------------------------------------------------+------------+








































































































































