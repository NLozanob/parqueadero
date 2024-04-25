<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware'=> ['auth']], function(){
    //Panel de control
    Route::get('/home', [App\Hppt\Controllers\HomeController::class, 'index'])->name('home');
    //Products product
    Route::resource('products', ProductController::class);
    Route::get('changestatusdoproduct', [ProductController::class, 'changestatusdoproduct'])->name('changestatusdoproduct');
    //Customers customer
    Route::resource('customers', ProductController::class);
    //Orders order
    Route::resource('orders', ProductController::class);
});

Route::get('/about', function () { 
    return 'Acerca de nosotros'; 
});

Route::get('/user/{id}', function ($id) { 
    return 'ID de usuario: ' . $id; 
});

Route::get('/contacto', function () { 
    return 'Página de contacto'; 
})->name('contacto');

Route::get('/usuario/{id}', function ($id) {
    return 'ID de usuario: ' . $id;
})->where('id', '[0-9]{3}');

Route::prefix('admin')->group(function () { 
    Route::get('/', function () { 
        return 'Panel de administración'; 
    }); 
    Route::get('/users', function () { 
        return 'Lista de usuarios'; 
    }); 
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');