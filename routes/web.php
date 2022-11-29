<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminBuildingController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes(
//     ['register' => false]
// );
Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard',[AdminDashboardController::class, 'show']);

    #User
    Route::get('admin/user/list',[AdminUserController::class, 'show']);
    Route::get('admin/user/add', [AdminUserController::class, 'add']);
    Route::post('admin/user/store', [AdminUserController::class, 'store']);
    Route::get('admin/user/delete/{id}', [AdminUserController::class, 'delete'])->name('user.delete');
    Route::post('admin/user/action', [AdminUserController::class, 'action']);
    Route::get('admin/user/edit/{id}', [AdminUserController::class, 'edit'])->name('user.edit');
    Route::post('admin/user/update/{id}', [AdminUserController::class, 'update'])->name('user.update');
    Route::get('admin/user/permanentlydelete/{id}',[AdminUserController::class, 'permanentlyDelete'])->name('user.permanentlydelete');
    Route::get('admin/user/restore/{id}',[AdminUserController::class, 'restore'])->name('user.restore');

    #Building
    Route::get('admin/building/add',[AdminBuildingController::class, 'add']);
    Route::get('admin/building/list',[AdminBuildingController::class, 'show']);
    Route::post('admin/building/store',[AdminBuildingController::class, 'store']);
});
