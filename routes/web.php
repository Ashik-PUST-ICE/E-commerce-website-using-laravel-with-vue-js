<?php


use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\auth\authController;
use App\Models\Role;

Route::get('/', function () {
    return view('admin/index');
});


Route::get('/createAdmin',[AuthController::class,'createCustomer']);

Route::get('/login', function () {
    return view('auth/signin');
});


Route::post('/login_user',[authController::class,'loginUser']);

