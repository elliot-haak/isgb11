<?php

use Illuminate\Support\Facades\Route;
use App\Models\Car;
use App\Http\Controllers\CarsController;

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

$router->get('bilar', 'App\Http\Controllers\CarsController@index');

$router->get('bilar/{id}', 'App\Http\Controllers\CarsController@read');

//localhost/ramverk/bilar/public/xxxxx


