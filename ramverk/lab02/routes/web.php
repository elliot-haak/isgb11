<?php

use Illuminate\Support\Facades\Route;
use App\Models\Movie;
use App\Http\Controllers\MoviesController;

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

$router->get('/', function () { 
	return "Satfläsk!";
});

$router->get('movies', 'App\Http\Controllers\MoviesController@getAllMovies');
$router->get('movies/{id}', 'App\Http\Controllers\MoviesController@searchMovie');

