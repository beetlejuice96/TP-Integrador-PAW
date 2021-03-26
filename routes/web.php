<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('web.home');
})->name("index");

Route::get('/login',[LoginController::class,'login'])->name("login_view");
Route::post('/login', [LoginController::class,'authenticate'])->name('login');;//redirige al login.

Route::get('/register',[UserController::class,'create'])->name("register"); //redirige al register
Route::post('/register',[UserController::class,'store'])->name("registerPost");


Route::get('/reset',function (){
    return view('auth.reset');
});

Route::get('/services',function (){
    return view('web.services');
})->name("services");

//Cars

Route::get('/create-car',function (){
    return view('web.cars-create');
});

Route::get('/cars',function (){
    return view('web.cars-index');
})->name("cars");

Route::get('/show-car',function (){
    return view('web.cars-show');
});

Route::get('/locate-car',function (){
    return view('web.cars-locate');
});


//appointments
Route::get('/appointments-request',function (){
    return view('web.appointments-request');
});

Route::get('/appointments-index',function (){
    return view('web.appointments-index');
})->name("appointments");

//varios
Route::get('/about',function (){
    return view('web.about');
})->name("about");

Route::get('/contact',function (){
    return view('web.contact');
})->name('contact');

//administrator
Route::get('/administrator',function (){
    return view('web.administrator-index');
});

//moderators
Route::get('/moderator/appointments',function (){
    return view('web.moderators-appointments');
});

Route::get('/moderator/emails',function (){
    return view('web.moderators-emails');
});

//profile
Route::get('/profile/myprofile',function (){
    return view('web.profile-myprofile');
})->name("profile.index");

Route::get('/terms-and-conditions',function (){
    return view('web.terms-and-conditions');
})->name("terms-and-conditions");
