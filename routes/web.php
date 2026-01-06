<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect root ke login / dashboard sesuai role
Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }
        return redirect('/dashboard');
    }
    return redirect('/login');
});

// ======================================================================
// Authentication routes (hanya untuk guest/belum login)
// ======================================================================
Route::middleware('guest')->group(function () {
    // Login User
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);

    // Registration
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);

    // Password reset (form kirim email reset)
    Route::get('password/reset', function () {
        return view('auth.passwords.email');
    })->name('password.request');

    // LOGIN ADMIN (dipindah ke guest agar tidak dapat diakses bila sudah login)
    Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
});

// ======================================================================
// Rute dashboard & halaman Admin (terproteksi middleware 'admin')
// ======================================================================
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Halaman pilih program admin
    Route::get('/admin/pilih-program', function () {
        return view('admin.pilih-program');
    })->name('admin.pilih-program');

    // --- Lab Ekonomi (dengan controller) ---
    Route::get('/lab-ekonomi', [App\Http\Controllers\Admin\LabEkonomiController::class, 'index'])->name('lab-ekonomi');
    Route::post('/lab-ekonomi/{id}/approve', [App\Http\Controllers\Admin\LabEkonomiController::class, 'approve'])->name('lab-ekonomi.approve');
    Route::post('/lab-ekonomi/{id}/reject', [App\Http\Controllers\Admin\LabEkonomiController::class, 'reject'])->name('lab-ekonomi.reject');
    Route::delete('/lab-ekonomi/{id}', [App\Http\Controllers\Admin\LabEkonomiController::class, 'destroy'])->name('lab-ekonomi.destroy');
    

    // --- Lab Keuangan perbankan (dengan controller) ---
    Route::get('/lab-keuangan-perbankan', [App\Http\Controllers\Admin\LabKeuanganPerbankanController::class, 'index'])->name('lab-keuangan-perbankan');
    Route::post('/lab-keuangan-perbankan/{id}/approve', [App\Http\Controllers\Admin\LabKeuanganPerbankanController::class, 'approve'])->name('lab-keuangan-perbankan.approve');
    Route::post('/lab-keuangan-perbankan/{id}/reject', [App\Http\Controllers\Admin\LabKeuanganPerbankanController::class, 'reject'])->name('lab-keuangan-perbankan.reject');
    Route::delete('/lab-keuangan-perbankan/{id}', [App\Http\Controllers\Admin\LabKeuanganPerbankanController::class, 'destroy'])->name('lab-keuangan-perbankan.destroy');

    // --- Lab Ekonomi Islam (dengan controller) ---
    Route::get('/lab-ekonomi-islam', [App\Http\Controllers\Admin\LabEkonomiIslamController::class, 'index'])->name('lab-ekonomi-islam');
    Route::post('/lab-ekonomi-islam/{id}/approve', [App\Http\Controllers\Admin\LabEkonomiIslamController::class, 'approve'])->name('lab-ekonomi-islam.approve');
    Route::post('/lab-ekonomi-islam/{id}/reject', [App\Http\Controllers\Admin\LabEkonomiIslamController::class, 'reject'])->name('lab-ekonomi-islam.reject');
    Route::delete('/lab-ekonomi-islam/{id}', [App\Http\Controllers\Admin\LabEkonomiIslamController::class, 'destroy'])->name('lab-ekonomi-islam.destroy');

    Route::get('/program-pengabdian', function () {
        return view('admin.program-pengabdian'); // Menampilkan halaman program pengabdian
    })->name('program-pengabdian');

    // --- Route tambahan (disamakan dengan nama di Blade) ---
    Route::get('/program-input', function () {
        return view('admin.program-input'); // Halaman input program
    })->name('input.program');

    Route::get('/program-daftar', function () {
        return view('admin.program-daftar'); // Daftar program
    })->name('daftar.program');

    Route::get('/program-upload', function () {
        return view('admin.program-upload'); // Upload Excel
    })->name('upload.excel');

});







// ======================================================================
// Logout (hanya untuk user yang sudah login)
// ======================================================================
Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

// ======================================================================
// Protected routes untuk user biasa
// ======================================================================
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
    
    // Lab Ekonomi - User
    Route::get('/lab-ekonomi-u', [App\Http\Controllers\BookingController::class, 'showLabEkonomi'])->name('lab-ekonomi-u');
    Route::post('/lab-ekonomi-u/booking', [App\Http\Controllers\BookingController::class, 'storeLabEkonomi'])->name('booking.lab-ekonomi.store');
    Route::get('/lab-ekonomi-u/booked-slots', [App\Http\Controllers\BookingController::class, 'getBookedSlotsLabEkonomi'])->name('booking.lab-ekonomi.booked-slots');

    // Lab Keuangan Perbankan - User
    Route::get('/lab-keuangan-perbankan-u', [App\Http\Controllers\BookingController::class, 'showLabKeuanganPerbankan'])->name('lab-keuangan-perbankan-u');
    Route::post('/lab-keuangan-perbankan-u/booking', [App\Http\Controllers\BookingController::class, 'storeLabKeuanganPerbankan'])->name('booking.lab-keuangan-perbankan.store');
    Route::get('/lab-keuangan-perbankan-u/booked-slots', [App\Http\Controllers\BookingController::class, 'getBookedSlotsLabKeuanganPerbankan'])->name('booking.lab-keuangan-perbankan.booked-slots');

    // Lab Ekonomi Islam - User
    Route::get('/lab-ekonomi-islam-u', [App\Http\Controllers\BookingController::class, 'showLabEkonomiIslam'])->name('lab-ekonomi-islam-u');
    Route::post('/lab-ekonomi-islam-u/booking', [App\Http\Controllers\BookingController::class, 'storeLabEkonomiIslam'])->name('booking.lab-ekonomi-islam.store');
    Route::get('/lab-ekonomi-islam-u/booked-slots', [App\Http\Controllers\BookingController::class, 'getBookedSlotsLabEkonomiIslam'])->name('booking.lab-ekonomi-islam.booked-slots');
});

// ======================================================================
// Fallback route setelah login (redirect sesuai role)
// ======================================================================
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }
        return redirect('/dashboard');
    })->name('home');
});
