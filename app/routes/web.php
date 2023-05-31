<?php
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
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
Route::get('/create_goods' ,[RegistrationController::class,'createGoodsForm'])->name('create.goods');
Route::post('/create_goods' ,[RegistrationController::class,'createGoods']);
