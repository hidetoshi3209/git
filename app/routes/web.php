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
    Auth::routes();

    Route::group(['middleware' => 'auth'],function() {

        Route::get('/mypage', [DisplayController::class, 'indexmypage']);
        Route::get('/product/{product}/detail', [DisplayController::class, 'productDetail'])->name('product.detail');
        Route::get('/create_product' ,[RegistrationController::class,'createProductForm'])->name('create.product');
        Route::post('/create_product' ,[RegistrationController::class,'createProduct']);
        Route::get('/buy/{product}' ,[RegistrationController::class,'buyProductForm'])->name('buy.product');
        Route::post('/buy/{product}' ,[RegistrationController::class,'buyProduct']);
        Route::get('/account/{user}' ,[RegistrationController::class,'accountForm'])->name('account');
        Route::post('/account/{user}' ,[RegistrationController::class,'account']);
        Route::get('/delete_account/{id}',[RegistrationController::class,'deleteAccountForm'])->name('delete.account');
        Route::get('/edit_profile/{id}',[RegistrationController::class,'editProfileForm'])->name('edit.profile');
        Route::post('/edit_profile/{id}',[RegistrationController::class,'editProfile']);
        Route::get('/buy_history',[DisplayController::class,'buyHistory']);
        Route::get('/profit_history',[DisplayController::class,'profitHistory']);
        Route::get('/owner',[DisplayController::class,'indexowner']);
        Route::get('/owner/user_detail/{user}',[DisplayController::class,'userDetail'])->name('user.detail');
        Route::get('/owner/goods_detail/{product}',[DisplayController::class,'goodsDetail'])->name('goods.detail');
        Route::get('/delete_account_flg/{id}',[RegistrationController::class,'deleteAccountflgForm'])->name('delete.accountflg');
        Route::get('/delete_goods_flg/{id}',[RegistrationController::class,'deleteGoodsflgForm'])->name('delete.goodsflg');
        Route::get('/owner/account/{id}',[RegistrationController::class,'ownerAccountForm'])->name('owner.account');
        Route::post('/owner/account/{id}',[RegistrationController::class,'ownerAccount']);
    });
