<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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

route::group(['middleware' => 'guest'], function()
{
    route::get('/register', [AuthController::class, 'register'])->name('register');
    route::post('/registerpost', [AuthController::class, 'registerpost'])->name('registerpost');

    route::get('/login', [AuthController::class, 'login'])->name('login');
    route::post('/loggedin', [AuthController::class, 'loggedin'])->name('loggedin');

});


route::group(['middleware' => 'auth'], function(){
    
    route::get('/home', [HomeController::class, 'index'])->name('home');

    route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});