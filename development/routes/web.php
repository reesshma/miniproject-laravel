<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\ManagerController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\DetailsController;

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
Route::group(['prefix' => 'admins', 'as' => 'admins.', 'middleware' => ['auth'] ],
function (){
    Route::get('index', [AdminController::class, 'index'])->name('index'); 
    Route::get('create', [AdminController::class, 'create'])->name('create');  
    Route::post('store', [AdminController::class, 'store'])->name('store'); 
    Route::get('edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [AdminController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [AdminController::class, 'destroy'])->name('destroy');              
});

Route::group(['prefix' => 'customers', 'as' => 'customers.', 'middleware' => ['auth']],
function (){
    Route::get('index', [CustomerController::class, 'index'])->name('index'); 
    Route::get('create', [CustomerController::class, 'create'])->name('create');  
    Route::post('store', [CustomerController::class, 'store'])->name('store'); 
    Route::get('edit/{id}', [CustomerController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [CustomerController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [CustomerController::class, 'destroy'])->name('destroy');              
});

Route::group(['prefix' => 'managers', 'as' => 'managers.', 'middleware' =>['auth']],
function (){
    Route::get('index', [ManagerController::class, 'index'])->name('index'); 
    Route::get('create', [ManagerController::class, 'create'])->name('create');  
    Route::post('store', [ManagerController::class, 'store'])->name('store'); 
    Route::get('edit/{id}', [ManagerController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [ManagerController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [ManagerController::class, 'destroy'])->name('destroy');              
});

Route::group(['prefix' => 'products', 'as' => 'products.',],
function (){
    Route::get('index', [ProductController::class, 'index'])->name('index'); 
    Route::get('create', [ProductController::class, 'create'])->name('create');  
    Route::post('store', [ProductController::class, 'store'])->name('store'); 
    Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('destroy/{id}', [ProductController::class, 'destroy'])->name('destroy');  
    Route::get('list', [ProductController::class, 'list'])->name('list');  
    Route::get('purchase', [ProductController::class, 'purchase'])->name('purchase');  
    Route::post('click', [ProductController::class, 'click'])->name('click');             
});
Route::group(['prefix' => 'details', 'as' => 'details.',],
function (){
Route::post('store', [DetailsController::class, 'store'])->name('store');  
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
