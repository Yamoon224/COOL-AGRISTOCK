<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\RottenController;
use App\Http\Controllers\TariffController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReleaseController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\CapacityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\TemperatureController;

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

Route::get('/', [Controller::class, 'welcome'])->name('welcome');

Route::middleware(['auth', 'locale'])->group(function () {
    Route::get('/profile', [Controller::class, 'profile'])->name('profile');
    Route::post('/dashboard/content', [Controller::class, 'getDashboardContent']);    
    Route::get('/{locale}/update', [Controller::class, 'setLocaleUpdate'])->name('locale.update');
    Route::get('/dashboard', [Controller::class, 'dashboard'])->middleware('verified')->name('dashboard');    
    Route::get('/customers', [UserController::class, 'customers'])->middleware(['admin.supervisor.accountant'])->name('customers');
    Route::get('/{id}/invoice', [PdfController::class, 'invoice'])->middleware(['admin.supervisor.accountant'])->name('stocks.invoice');

    Route::resource('stocks', StockController::class);
    Route::resource('details', DetailController::class);
    Route::resource('rottens', RottenController::class);
    Route::resource('tariffs', TariffController::class);
    Route::resource('payments', PaymentController::class);
    Route::resource('billings', BillingController::class);
    Route::resource('releases', ReleaseController::class);
    Route::resource('claims', ClaimController::class);

    Route::middleware('supervisor')->group(function () {
        Route::get('/incidents/{status}/{id}', [IncidentController::class, 'setStatus'])->name('incidents.status');

        Route::resource('temperatures', TemperatureController::class);
        Route::resource('capacities', CapacityController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('storages', StorageController::class);
        Route::resource('products', ProductController::class);
        Route::resource('incidents', IncidentController::class);

        Route::middleware('admin')->group(function () {
            Route::get('/groups', [Controller::class, 'groups'])->name('groups');
            Route::get('/cities', [Controller::class, 'cities'])->name('cities');

            Route::resource('users', UserController::class);
        });
    });   
});

require __DIR__.'/auth.php';
