<?php

use App\Http\Controllers\Backend\Admin\AdminController;
use App\Http\Controllers\Backend\Certificate\birth_certificateController;
use App\Http\Controllers\Backend\Certificate\CitizenshipController;
use App\Http\Controllers\Backend\Certificate\Inheritance_certificate_controller;
use App\Http\Controllers\Backend\Division\DivisionController;
use App\Http\Controllers\Backend\House\HouseController;
use App\Http\Controllers\Backend\Institude\Institude_controller;
use App\Http\Controllers\Backend\Post_Office\Post_OfficeController;
use App\Http\Controllers\Backend\Union\UnionController;
use App\Http\Controllers\Backend\Upzila\UpzilaController;
use App\Http\Controllers\Backend\Village\VillageController;
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
        Route::get('/get-upzila/{zila_id}','get_upzila')->name('admin.upzila.get_upzila');
    });
    /** Union Management Route **/
    Route::prefix('admin/union')->controller(UnionController::class)->group(function(){
        Route::get('/list', 'index')->name('admin.union.index');
        Route::get('/all_data', 'all_data')->name('admin.union.all_data');
        Route::post('/store', 'store')->name('admin.union.store');
        Route::post('/delete', 'delete')->name('admin.union.delete');
        Route::get('/edit/{id}', 'edit')->name('admin.union.edit');
        Route::post('/update', 'update')->name('admin.union.update');
        Route::get('/get-union/{upzila_id}','get_union')->name('admin.union.get_union');
    });
    /** Post Office Management Route **/
    Route::prefix('admin/post_office')->controller(Post_OfficeController::class)->group(function(){
        Route::get('/list', 'index')->name('admin.post_office.index');
        Route::get('/all_data', 'all_data')->name('admin.post_office.all_data');
        Route::post('/store', 'store')->name('admin.post_office.store');
        Route::post('/delete', 'delete')->name('admin.post_office.delete');
        Route::get('/edit/{id}', 'edit')->name('admin.post_office.edit');
        Route::post('/update', 'update')->name('admin.post_office.update');
        Route::get('/get-post_office/{union_id}','get_post_office')->name('admin.post_office.get_post_office');
    });
    /** Village Management Route **/
    Route::prefix('admin/village')->controller(VillageController::class)->group(function(){
        Route::get('/list', 'index')->name('admin.village.index');
        Route::get('/all_data', 'all_data')->name('admin.village.all_data');
         Route::post('/store', 'store')->name('admin.village.store');
         Route::post('/delete', 'delete')->name('admin.village.delete');
         Route::get('/edit/{id}', 'edit')->name('admin.village.edit');
         Route::post('/update', 'update')->name('admin.village.update');
         Route::get('/get_village/{post_office_id}','get_village')->name('admin.village.get_village');
    });
    /** House Management Route **/
    Route::prefix('admin/house')->controller(HouseController::class)->group(function(){
        Route::get('/list', 'index')->name('admin.house.index');
        Route::get('/all_data', 'all_data')->name('admin.house.all_data');
        Route::post('/store', 'store')->name('admin.house.store');
        //  Route::post('/delete', 'delete')->name('admin.village.delete');
        Route::get('/edit/{id}', 'edit')->name('admin.house.edit');
        Route::post('/update', 'update')->name('admin.house.update');
    });
    /** Institute Management Route **/
    Route::prefix('admin/institute')->controller(Institude_controller::class)->group(function(){
        Route::get('/list', 'index')->name('admin.institute.index');
        Route::get('/all_data', 'all_data')->name('admin.institute.all_data');
        Route::post('/store', 'store')->name('admin.institute.store');
         Route::post('/delete', 'delete')->name('admin.institute.delete');
        Route::get('/edit/{id}', 'edit')->name('admin.institute.edit');
        Route::post('/update', 'update')->name('admin.institute.update');
    });
    /** CitizenShip Centificate Management Route **/
    Route::prefix('admin/citizenship_certificate')->controller(CitizenshipController::class)->group(function(){
        Route::get('/list', 'index')->name('admin.citizenship_certificate.index');
        Route::get('/all_data', 'all_data')->name('admin.citizenship_certificate.all_data');
        Route::post('/store', 'store')->name('admin.citizenship_certificate.store');
         Route::post('/delete', 'delete')->name('admin.citizenship_certificate.delete');
        Route::get('/edit/{id}', 'edit')->name('admin.citizenship_certificate.edit');
        Route::post('/update', 'update')->name('admin.citizenship_certificate.update');
    });
    /** Inheritance Centificate Management Route **/
    Route::prefix('admin/inheritance_certificate')->controller(Inheritance_certificate_controller::class)->group(function(){
        Route::get('/list', 'index')->name('admin.inheritance_certificate.index');
        Route::get('/all_data', 'all_data')->name('admin.inheritance_certificate.all_data');
        Route::post('/store', 'store')->name('admin.inheritance_certificate.store');
         Route::post('/delete', 'delete')->name('admin.inheritance_certificate.delete');
        Route::get('/edit/{id}', 'edit')->name('admin.inheritance_certificate.edit');
        Route::post('/update', 'update')->name('admin.inheritance_certificate.update');
    });

 /** Birth Centificate Management Route **/
 Route::prefix('admin/birth_certificate')->controller(birth_certificateController::class)->group(function(){
    Route::get('/list', 'index')->name('admin.birth_certificate.index');
    Route::get('/upload', 'upload')->name('admin.birth_certificate.upload');
    // Route::get('/all_data', 'all_data')->name('admin.citizenship_certificate.all_data');
    // Route::post('/store', 'store')->name('admin.citizenship_certificate.store');
    //  Route::post('/delete', 'delete')->name('admin.citizenship_certificate.delete');
    // Route::get('/edit/{id}', 'edit')->name('admin.citizenship_certificate.edit');
    // Route::post('/update', 'update')->name('admin.citizenship_certificate.update');
});


});
