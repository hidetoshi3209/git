<?php
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Contracts\Routing\Registrar;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DisplayController::class, 'index']);
Route::get('/mypage', [DisplayController::class, 'indexmypage']);
Route::get('/product/{id}/detail', [DisplayController::class, 'productDetail'])->name('product.detail');
Route::get('/create_product' ,[RegistrationController::class,'createProductForm'])->name('create.product');
Route::post('/create_product' ,[RegistrationController::class,'createProduct']);
Route::get('/buy/{id}' .[RegistrationController::class,'buyProductForm'])->name('buy.product');
Route::post('/buy/{id}' .[RegistrationController::class,'buyProduct']);
