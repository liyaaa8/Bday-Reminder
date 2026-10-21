<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PenerimaNotifikasiController;
use App\Http\Controllers\NotifikasiLogController;
use App\Models\Nasabah;
use App\Models\NotifikasiLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| WELCOME / HALAMAN DEPAN
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    $today = Carbon::today();

    // Total seluruh nasabah
    $totalNasabah = Nasabah::count();

    // Jumlah ulang tahun bulan ini
    $ulangTahunBulanIni = Nasabah::whereMonth(
        'tanggal_lahir',
        $today->month
    )->count();

    // Tanggal besok
    $tomorrow = $today->copy()->addDay();

    // Jumlah nasabah yang ulang tahun besok
    $reminderHariIni = Nasabah::whereMonth(
        'tanggal_lahir',
        $tomorrow->month
    )
        ->whereDay(
            'tanggal_lahir',
            $tomorrow->day
        )
        ->count();

    // Jumlah log reminder yang dibuat hari ini
    $reminderTerkirim = NotifikasiLog::whereDate(
        'created_at',
        $today
    )->count();

    /*
    |--------------------------------------------------------------------------
    | 3 ULANG TAHUN TERDEKAT
    |--------------------------------------------------------------------------
    */

    $ulangTahunTerdekat = Nasabah::whereNotNull('tanggal_lahir')
        ->get()
        ->sortBy(function ($nasabah) use ($today) {

            $tanggalLahir = Carbon::parse(
                $nasabah->tanggal_lahir
            );

            $tanggalUlangTahun = Carbon::create(
                $today->year,
                $tanggalLahir->month,
                $tanggalLahir->day
            );

            // Kalau ulang tahun tahun ini sudah lewat,
            // gunakan tahun depan
            if ($tanggalUlangTahun->lt($today)) {
                $tanggalUlangTahun->addYear();
            }

            return $tanggalUlangTahun->timestamp;
        })
        ->take(3);

    return view('welcome', compact(
        'totalNasabah',
        'ulangTahunBulanIni',
        'reminderHariIni',
        'reminderTerkirim',
        'ulangTahunTerdekat'
    ));
});


/*
|--------------------------------------------------------------------------
| TEST EMAIL
|--------------------------------------------------------------------------
*/

Route::get('/test-email', function () {

    Mail::raw(
        'Halo, ini percobaan email Birthday Reminder',
        function ($message) {

            $message->to('adindajuliaputri034@gmail.com')
                ->subject('Test Email');

        }
    );

    return "Email terkirim";
});


/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/

// Login
Route::get(
    '/admin/login',
    [AdminAuthController::class, 'login']
)->name('admin.login');

Route::post(
    '/admin/login',
    [AdminAuthController::class, 'authenticate']
)->name('admin.login.submit');


// Register
Route::get(
    '/admin/register',
    [AdminAuthController::class, 'register']
)->name('admin.register');

Route::post(
    '/admin/register',
    [AdminAuthController::class, 'registerStore']
)->name('admin.register.submit');


// Logout
Route::post(
    '/admin/logout',
    [AdminAuthController::class, 'logout']
)->name('admin.logout');


/*
|--------------------------------------------------------------------------
| AREA ADMIN & USER
|--------------------------------------------------------------------------
|
| Semua akun yang sudah login boleh:
|
| - Melihat Dashboard
| - Melihat Data Nasabah
| - Melihat Log Reminder
|
| TIDAK boleh melakukan perubahan data Nasabah.
|
*/

Route::middleware('auth:admin')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | NASABAH - LIHAT SAJA
    |--------------------------------------------------------------------------
    |
    | Admin dan User sama-sama boleh melihat data nasabah.
    |
    | PENTING:
    | Route create/store/edit/update/destroy TIDAK berada
    | di dalam group ini.
    |
    */

    Route::get(
        '/customers',
        [NasabahController::class, 'index']
    )->name('customers.index');


    /*
    |--------------------------------------------------------------------------
    | LOG REMINDER - LIHAT SAJA
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/log-reminder',
        [NotifikasiLogController::class, 'index']
    )->name('log-reminder.index');


    /*
    |--------------------------------------------------------------------------
    | KHUSUS ADMIN
    |--------------------------------------------------------------------------
    |
    | Semua route di bawah ini membutuhkan:
    |
    | 1. Sudah login
    | 2. role = admin
    |
    */

    Route::middleware('admin.only')->group(function () {

        /*
        |--------------------------------------------------------------------------
        | IMPORT EXCEL
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/import',
            [ImportController::class, 'index']
        )->name('import.index');

        Route::post(
            '/import',
            [ImportController::class, 'store']
        )->name('import.store');


        /*
        |--------------------------------------------------------------------------
        | CRUD NASABAH
        |--------------------------------------------------------------------------
        |
        | Hanya Admin:
        |
        | - Tambah
        | - Edit
        | - Update
        | - Hapus
        |
        | Tidak ada index di sini karena customers.index
        | sudah dibuat di area Admin & User.
        |
        */

        Route::get(
            '/customers/create',
            [NasabahController::class, 'create']
        )->name('customers.create');

        Route::post(
            '/customers',
            [NasabahController::class, 'store']
        )->name('customers.store');

        Route::get(
            '/customers/{customer}/edit',
            [NasabahController::class, 'edit']
        )->name('customers.edit');

        Route::put(
            '/customers/{customer}',
            [NasabahController::class, 'update']
        )->name('customers.update');

        Route::delete(
            '/customers/{customer}',
            [NasabahController::class, 'destroy']
        )->name('customers.destroy');


        /*
        |--------------------------------------------------------------------------
        | PENERIMA NOTIFIKASI
        |--------------------------------------------------------------------------
        |
        | Hanya Admin yang boleh:
        |
        | - Melihat
        | - Menambah
        | - Edit
        | - Update
        | - Hapus
        |
        */

        Route::resource(
            'notification-receivers',
            PenerimaNotifikasiController::class
        );

    });

});


/*
|--------------------------------------------------------------------------
| AUTH BAWAAN LARAVEL
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';