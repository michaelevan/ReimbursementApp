<?php

use App\Http\Controllers\DirekturController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaffController;
use App\Http\Middleware\jabatanMiddleware;
use Illuminate\Support\Facades\Route;

// LOGIN & LOGOUT
Route::get('/', [LoginController::class, "formLogin"]);
Route::post('/', [LoginController::class, "loginData"]);
Route::get('/logout', [LoginController::class, "logout"])->name('logout');

// STAFF
Route::prefix('/staff')->middleware('auth')->group(function(){
    Route::get('/', [StaffController::class, "formStaff"]);
    Route::get('/buatReimbursement', [StaffController::class, "formBuatReimbursement"]);
    Route::post('/buatReimbursement', [StaffController::class, "tambahReimbursement"]);
    Route::post('/editReimbursement', [StaffController::class, "formEditReimbursement"]);
    Route::post('/editReimbursement', [StaffController::class, "editReimbursement"]);
});


// DIREKTUR
Route::prefix('/direktur')->middleware('auth')->group(function(){
    Route::get('/', [DirekturController::class, "formDirektur"]);
    Route::prefix('/listKaryawan')->group(function(){
        Route::get('/', [DirekturController::class, "formListKaryawan"]);
        Route::get('/{id}', [DirekturController::class, "formEditKaryawan"]);
        Route::post('/{id}', [DirekturController::class, "editKaryawan"]);
    });

    Route::get('/tambahKaryawan', [DirekturController::class, "formTambahKaryawan"]);
    Route::post('/tambahKaryawan', [DirekturController::class, "TambahKaryawan"]);
    Route::get('/terimaReimbursement/{id}', [DirekturController::class, "terimaReimbursement"]);
    Route::get('/tolakReimbursement/{id}', [DirekturController::class, "tolakReimbursement"]);
});


// FINANCE
Route::prefix('/finance')->middleware('auth')->group(function(){
    Route::get('/', [FinanceController::class, "formFinance"]);
    Route::get('/terimaPembayaran/{id}', [FinanceController::class, "terimaPembayaran"]);
    Route::get('/tolakPembayaran/{id}', [FinanceController::class, "tolakPembayaran"]);
});
