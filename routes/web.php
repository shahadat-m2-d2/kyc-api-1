<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name?}', function ($name="") {
    if(view()->exists('hello')){
        return view('hello', ["name"=>$name]);
    } else { 
        echo "Not Found"; 
    } 
    
});

Route::view("contact", "/contact");

Route::get("user/{id}", [UserController::class, 'show']);

Route::get("api/country_list", [UserController::class, 'country_list']);



//Route::view("users", "/users");
Route::get("users", [UserController::class, 'index']);
Route::get("customers", [UserController::class, 'customers']);

