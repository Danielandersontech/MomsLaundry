<?php

use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LaporanOrderController;
use App\Http\Controllers\LaporanPenggunaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;
use PHPUnit\Framework\Attributes\Group;

Route::middleware([Authenticate::class])->group(function () {
    // Admin routes
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('pengguna', PenggunaController::class);
        Route::resource('package', PackageController::class);
        Route::resource('order', OrderController::class);
        Route::resource('payment', PaymentController::class);
        Route::resource('feedback', FeedbackController::class);
        Route::resource('laporan-pengguna', LaporanPenggunaController::class);
        Route::resource('laporan-order', LaporanOrderController::class);
    });

    Route::prefix('pengguna')->group(function () {

        Route::get('feedback/create', [FeedbackController::class, 'create'])->name('pengguna.feedback.create');
        Route::post('feedback/store', [FeedbackController::class, 'store'])->name('pengguna.feedback.store');
        Route::get('profil', [PenggunaController::class, 'profil'])->name('pengguna.profil'); 
        Route::get('paket', [PackageController::class, 'paket'])->name('pengguna.paket');  
        Route::get('order', [OrderController::class, 'order'])->name('pengguna.order');  
        Route::get('order/print/{id}', [OrderController::class, 'printReceipt'])->name('pengguna.printOrder');  

    });

});
// Public routes  
Route::get('pengguna/dashboard', function () {  
    return view('pengguna.dashboard'); // Ganti dengan nama view yang sesuai  
})->name('pengguna.dashboard');  
  
// Authentication routes  
Auth::routes();  
  
// Logout route  
Route::post('/logout', function () {  
    Auth::logout();  
    return redirect('/login');  
})->name('logout'); 
