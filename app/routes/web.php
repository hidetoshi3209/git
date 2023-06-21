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
Route::get('/product/{product}/detail', [DisplayController::class, 'productDetail'])->name('product.detail');

    Auth::routes();

    Route::group(['middleware' => 'auth'],function() {

        Route::resource('follow', 'FollowController');
        Route::get('/mypage', [DisplayController::class, 'indexmypage']);
        Route::get('/create_product' ,[RegistrationController::class,'createProductForm'])->name('create.product');
        Route::post('/create_product' ,[RegistrationController::class,'createProduct']);
        Route::get('/buy/{product}' ,[RegistrationController::class,'buyProductForm'])->name('buy.product');
        Route::post('/buy/{product}' ,[RegistrationController::class,'buyProduct']);
        Route::get('/account/{user}' ,[RegistrationController::class,'accountForm'])->name('account');
        Route::post('/account/{user}' ,[RegistrationController::class,'account']);
        Route::get('/delete_account/{user}',[RegistrationController::class,'deleteAccountForm'])->name('delete.account');
        Route::get('/edit_profile/{user}',[RegistrationController::class,'editProfileForm'])->name('edit.profile');
        Route::post('/edit_profile/{user}',[RegistrationController::class,'editProfile']);
        Route::get('/buy_history',[DisplayController::class,'buyHistory']);
        Route::get('/profit_history',[DisplayController::class,'profitHistory']);
        Route::get('/owner',[DisplayController::class,'indexowner']);
        Route::get('/owner/user_detail/{user}',[DisplayController::class,'userDetail'])->name('user.detail');
        Route::get('/owner/goods_detail/{product}',[DisplayController::class,'goodsDetail'])->name('goods.detail');
        Route::get('/delete_account_flg/{user}',[RegistrationController::class,'deleteAccountflgForm'])->name('delete.accountflg');
        Route::get('/back_account_flg/{user}',[RegistrationController::class,'backAccountflgForm'])->name('back.accountflg');
        Route::get('/delete_goods_flg/{product}',[RegistrationController::class,'deleteGoodsflgForm'])->name('delete.goodsflg');
        Route::get('/back_goods_flg/{product}',[RegistrationController::class,'backGoodsflgForm'])->name('back.goodsflg');
        Route::get('/owner/account/{user}',[RegistrationController::class,'ownerAccountForm'])->name('owner.account');
        Route::post('/owner/account/{user}',[RegistrationController::class,'ownerAccount']);
        Route::post('/like',[RegistrationController::class,'like']);
        Route::get('/like/history',[DisplayController::class,'likeHistory']);
        Route::get('/user_profile/{user}',[DisplayController::class,'userProfile'])->name('user.profile');
        Route::get('/product_list',[DisplayController::class,'productList'])->name('product.list');
    });
