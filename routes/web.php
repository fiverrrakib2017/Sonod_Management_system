<?php

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Division\DivisionController;
use App\Http\Controllers\Backend\Upzila\UpzilaController;
use App\Http\Controllers\Backend\Zila\ZilaController;
use Illuminate\Support\Facades\Route;

/* Backend Route */
Route::get('/admin/login', [AdminController::class, 'login_form'])->name('admin.login');
Route::post('login-functionality', [AdminController::class, 'login_functionality'])->name('login.functionality');

Route::middleware('admin')->group(function () {
    Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/get_dashboard_data', [AdminController::class, 'get_data'])->name('admin.dashboard_get_all_data');

    /** Division Management Route **/
    Route::prefix('admin/division')->controller(DivisionController::class)->group(function () {
        Route::post('/store', 'store')->name('admin.division.store');
        Route::get('/all_data', 'all_data')->name('admin.division.all_data');
        Route::get('/list', 'index')->name('admin.division.index');
        Route::get('/edit/{id}', 'edit')->name('admin.division.edit');
        Route::post('/update', 'update')->name('admin.division.update');
        Route::post('/delete', 'delete')->name('admin.division.delete');
    });

    /** Zila Management Route **/
    Route::prefix('admin/zila')->controller(ZilaController::class)->group(function () {
        Route::get('/list', 'index')->name('admin.zila.index');
        Route::get('/all_data', 'all_data')->name('admin.zila.all_data');  
        Route::post('/store', 'store')->name('admin.zila.store');
        Route::post('/delete', 'delete')->name('admin.zila.delete');
        Route::get('/edit/{id}', 'edit')->name('admin.zila.edit');
        Route::post('/update', 'update')->name('admin.zila.update');
        Route::get('/get-zila/{division_id}','get_zila')->name('admin.zila.get_zila');
    });
    /** Upozila Management Route **/
    Route::prefix('admin/upzila')->controller(UpzilaController::class)->group(function(){
        Route::get('/list', 'index')->name('admin.upzila.index'); 
        Route::get('/all_data', 'all_data')->name('admin.upzila.all_data'); 
        Route::post('/store', 'store')->name('admin.upzila.store'); 
        Route::get('/edit/{id}', 'edit')->name('admin.upzila.edit'); 
        Route::post('/update', 'update')->name('admin.upzila.update');
        Route::post('/delete', 'delete')->name('admin.upzila.delete');
    });
});
