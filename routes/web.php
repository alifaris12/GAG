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

    // --- Lab  (sesuai view yang sudah ada) ---
    Route::get('/lab-ekonomi', function () {
        return view('admin.lab-ekonomi'); // Menampilkan halaman program penelitian
    })->name('lab-ekonomi');
    
    Route::get('/Lab-keuangan-perbangkan', function () {
        return view('admin.Lab-keuangan-perbangkan'); // Menampilkan halaman program kerjasama
    })->name('Lab-keuangan-perbangkan');

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

    // --- Tambahkan rute untuk program-lab-ekonomi-islam ---
    Route::get('/lab-ekonomi-islam', function () {
        return view('admin.lab-ekonomi-islam'); // Menampilkan halaman Lab Ekonomi Islam
    })->name('lab-ekonomi-islam');
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
    Route::get('/lab-ekonomi-u', function () {
        return view('dashboard.lab-ekonomi-u'); // Menampilkan halaman program penelitian
        })->name('lab-ekonomi-u');

     Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
     Route::get('/lab-keuangan-perbankan-u', function () {
        return view('dashboard.lab-keuangan-perbankan-u'); // Menampilkan halaman program penelitian
        })->name('lab-keuangan-perbankan-u');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
     Route::get('/lab-ekonomi-islam-u', function () {
        return view('dashboard.lab-ekonomi-islam-u'); // Menampilkan halaman program penelitian
        })->name('lab-ekonomi-islam-u');
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
