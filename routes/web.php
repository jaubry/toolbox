<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth'])->name('home');

Route::post('/change_country', [App\Http\Controllers\HomeController::class, 'changeCountry'])->name('change.country');

Route::middleware(['database.connections', 'auth'])->group(function() {
    Route::get('/employee/list', [App\Http\Controllers\EmployeeController::class, 'index'])->name('emp.list');
    Route::get('/employee/add', [App\Http\Controllers\EmployeeController::class, 'add'])->name('emp.add');
    Route::get('/employee/edit/{id}', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('emp.edit');
    Route::post('/employee/save', [App\Http\Controllers\EmployeeController::class, 'save'])->name('emp.save');
});
//Route::get('/employee/list', [App\Http\Controllers\EmployeeController::class, 'index'])->name('emp.list');



/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');
Route::post('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search_post');


Route::get('/employee/view/{id}', [App\Http\Controllers\HomeController::class, 'view'])->name('emp.view');
Route::post('/employee/save/infos', [App\Http\Controllers\HomeController::class, 'saveInfos'])->name('emp.save.infos');
Route::get('/employee/save/stores', [App\Http\Controllers\HomeController::class, 'saveStores'])->name('emp.save.stores');
Route::post('/employee/save/role', [App\Http\Controllers\HomeController::class, 'saveRole'])->name('emp.save.role');

Route::post('/employee/check-email-unique', [App\Http\Controllers\HomeController::class, 'checkEmailUnique'])->name('emp.check.email');

//Route::post('/employee/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('emp');
*/
// --------------------------- products
Route::get('/catalog/stockout', [App\Http\Controllers\ProductController::class, 'stockout'])->name('catalog.stockout');