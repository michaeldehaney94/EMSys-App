<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DepartmentController;


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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//resource route handler used to handle all http request
Route::resource('users', UserController::class);
Route::resource('countries', CountryController::class);
Route::resource('states', StateController::class);
Route::resource('cities', CityController::class);
Route::resource('departments', DepartmentController::class);


//change password form route in edit blade
//users.change.password is the name of the targetted route
Route::post('users/{user}/change-password', [ChangePasswordController::class, 'change_password'])->name('users.change.password');

//{any} will allow the route to auto-fill the view folder URL param name for the page location
//the name of the blade page in view folder doesn't have to be statically entered to create a route to the page. {any} does it for you.
Route::get('{any}', function () {
    return view('employees.index');
})->where('any', '.*');