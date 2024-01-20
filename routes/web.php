<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('clients' , ClientController::class); //todo Nos va a generar el nombre y la ruta de cada uno de los metodos que hay dentro del archivo  ClientController (index, destory , show , update, store etc...)

//todo Por lo tanto las rutas se llamaran :

//* clients.index
