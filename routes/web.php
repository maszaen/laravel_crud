<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () {
        $totalProducts = \App\Models\Product::count();
        $totalStock = \App\Models\Product::sum('stock');
        $lowStock = \App\Models\Product::where('stock', '<=', 5)->count();
        $outOfStock = \App\Models\Product::where('stock', 0)->count();
        
        $recentProducts = \App\Models\Product::latest()->take(5)->get();
        
        return view('dashboard', compact('totalProducts', 'totalStock', 'lowStock', 'outOfStock', 'recentProducts'));
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Product Routes (CRUD)
    Route::resource('products', ProductController::class);
});

require __DIR__.'/auth.php';
