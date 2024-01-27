<?php

use App\Http\Controllers\SakitController;
use App\Http\Controllers\RayonsController;
use App\Http\Controllers\RombelsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



use function Ramsey\Uuid\v1;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
})->name('login');


Route::middleware('IsLogin')->group(function () {
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/home', function () {
        return view('home');
    })->name('home');
});

Route::post('/login', [UserController::class, 'loginAuth'])->name('login.auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/error-permission', function () {
    return view('errors.permission');
})->name('error.permission');

Route::middleware(['IsLogin', 'IsAdmin'])->group(function () {
    Route::get('/home', function () {
        return view('pages.admin.home');
    })->name('home.page');


    Route::prefix('/rombel')->name('rombel.')->group(function () {
        Route::get('/', [RombelsController::class, 'index'])->name('home');
        Route::get('/create', [RombelsController::class, 'create'])->name('create');
        Route::post('/store', [RombelsController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [RombelsController::class, 'edit'])->name('edit');
        Route::patch('/edit/{id}', [RombelsController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [RombelsController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/rayon')->name('rayon.')->group(function () {
        Route::get('/', [RayonsController::class, 'index'])->name('home');
        Route::get('/create', [RayonsController::class, 'create'])->name('create');
        Route::post('/store', [RayonsController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [RayonsController::class, 'edit'])->name('edit');
        Route::patch('/edit/{id}', [RayonsController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [RayonsController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('home');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/store', [UserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
        Route::patch('/edit/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    });

    Route::prefix('/sakit')->name('sakit.')->group(function () {
        Route::get('/', [SakitController::class, 'index'])->name('home');
        Route::get('/show/{id}', [SakitController::class, 'show'])->name('show');
        Route::get('/rekap', [SakitController::class, 'rekap'])->name('rekap');
        Route::get('/create', [SakitController::class, 'create'])->name('create');
        Route::post('/store', [SakitController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SakitController::class, 'edit'])->name('edit');
        Route::patch('/edit/{id}', [SakitController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [SakitController::class, 'destroy'])->name('delete');
        Route::get('/print/{id}', [SakitController::class, 'print'])->name('print');
        Route::get('/download/{id}', [SakitController::class, 'downloadPDF'])->name('download');
        Route::get('/export', [SakitController::class, 'export'])->name('export');
    });
});

Route::middleware(['IsLogin', 'IsPs'])->group(function () {
    Route::prefix('/ps')->name('pemb.')->group(function () {
        Route::get('/dashboard', function () {
            return view('pages.pembimbing.home');
        })->name('ps.home');
        
        Route::prefix('/student')->name('student.')->group(function (){
            Route::get('/show',[StudentsController::class, 'showSiswaByRayon'])->name('show');
        });
        });
    });

Route::middleware(['IsLogin', 'IsPu'])->group(function () {
    Route::prefix('/pu')->name('pet.')->group(function () {
        Route::get('/dashboard', function () {
            return view('pages.petugas.home');
        })->name('pu.home');

        Route::prefix('/student')->name('student.')->group(function () {
            Route::get('/', [StudentsController::class, 'index'])->name('home');
            Route::get('/create', [StudentsController::class, 'create'])->name('create');
            Route::post('/store', [StudentsController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [StudentsController::class, 'edit'])->name('edit');
            Route::patch('/edit/{id}', [StudentsController::class, 'update'])->name('update');
            Route::delete('/delete/{id}', [StudentsController::class, 'destroy'])->name('delete');

            Route::prefix('/sakit')->name('sakit.')->group(function () {
                Route::get('/', [SakitController::class, 'index'])->name('home');
                Route::get('/show/{id}', [SakitController::class, 'show'])->name('show');
                Route::get('/rekap', [SakitController::class, 'rekap'])->name('rekap');
                Route::get('/create', [SakitController::class, 'create'])->name('create');
                Route::post('/store', [SakitController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [SakitController::class, 'edit'])->name('edit');
                Route::patch('/edit/{id}', [SakitController::class, 'update'])->name('update');
                Route::delete('/delete/{id}', [SakitController::class, 'destroy'])->name('delete');
                Route::get('/print/{id}', [SakitController::class, 'print'])->name('print');
                Route::get('/download/{id}', [SakitController::class, 'downloadPDF'])->name('download');
                Route::get('/export', [SakitController::class, 'export'])->name('export');
            });
        });

    });
});

