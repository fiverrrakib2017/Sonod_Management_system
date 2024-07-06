<?php

use App\Http\Controllers\Backend\Admin\AdminController;
use Illuminate\Support\Facades\Route;

/*Backend Route*/
Route::get('/admin/login', [AdminController::class, 'login_form'])->name('admin.login');
Route::post('login-functionality',[AdminController::class,'login_functionality'])->name('login.functionality');

Route::group(['middleware'=>'admin'],function(){
    Route::get('admin/logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::get('/',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::post('/admin/get_dashboard_data',[AdminController::class,'get_data'])->name('admin.dashboard_get_all_data');

   
});
