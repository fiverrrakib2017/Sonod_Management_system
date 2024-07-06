<?php

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\DivisionController;
use Illuminate\Support\Facades\Route;

/*Backend Route*/
Route::get('/admin/login', [AdminController::class, 'login_form'])->name('admin.login');
Route::post('login-functionality',[AdminController::class,'login_functionality'])->name('login.functionality');

Route::group(['middleware'=>'admin'],function(){
    Route::get('admin/logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::get('/',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::post('/admin/get_dashboard_data',[AdminController::class,'get_data'])->name('admin.dashboard_get_all_data');

    /** Division Management  Route **/
    Route::prefix('admin/division')->group(function(){
        Route::controller(DivisionController::class)->group(function(){
            Route::post('/store','store')->name('admin.division.store');
            Route::get('/all_data','all_data')->name('admin.division.all_data');
            Route::get('/list','index')->name('admin.division.index');
            Route::get('/edit/{id}','edit')->name('admin.division.edit');
            Route::post('/update','update')->name('admin.division.update');
            Route::post('/delete','delete')->name('admin.division.delete');
        });
    });
});
