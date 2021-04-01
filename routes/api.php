<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//creo la mia prima rotta che nel mio caso puó essere sia get, che post.
Route::get('/posts', 'Api\PostController@index')->middleware('api_token');
//a quessto punto devo crearmi una folder API e un controller POSTCONTROLLER con un metodo INDEX
//ci sono delle rotte che hanno in automatico api davanti , sono tutte quelle che creo dentro il file api.php


















