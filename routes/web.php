<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Models\Role;

Route::get('/', function () {
    return view('admin/index');
});


Route::get('/createAdmin',[AuthController::class,'createCustomer']);


