<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Public\ContactController as PublicContactController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\ContactController;


Route::get('/', [\App\Http\Controllers\Public\HomeController::class, 'index'])
    ->name('home');



Route::middleware(['auth', 'check.status', 'can:access-admin'])->prefix('admin')->name('admin.')->group(function () {

    // Panel compartido (Admin y Empleado)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // === RUTAS EXCLUSIVAS DEL ADMINISTRADOR ===
    Route::middleware('can:manage-users')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::patch('/users/{user}/status', [UserController::class, 'toggleStatus'])->name('users.toggle-status');
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::patch('/products/{product}/status', [ProductController::class, 'toggleStatus'])->name('products.toggle-status');
    });

    // === RUTAS COMPARTIDAS (Admin y Empleado) ===

    // Inventario
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
    Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');

    // Contacto (Bandeja)
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::patch('/contacts/{contact}/status', [ContactController::class, 'markAsAttended'])->name('contacts.mark-attended');
});


Route::post('/contacto', [PublicContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');
