<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterProduct;
use App\Http\Requests\EditAccount;
use App\Http\Requests\BuyProduct;
use App\Product;
use App\User;
use App\Buy;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function createProductForm() {
        return view('product_form');
    }

    public function createProduct(RegisterProduct $request) {
        $product = new Product;

        $dir = 'product';

        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('image')->storeAs('public/' . $dir, $file_name);
        
        $product->image = $file_name;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->comment = $request->comment;
        $product->condition = $request->condition;

        Auth::user()->product()->save($product);

        return redirect('/mypage');
    }

    public function buyProductForm(Product $product) {

        return view('buy_form',[
            'product' => $product,
        ]);
        
    }

    public function buyProduct(BuyProduct $request,$productId) {
        $user = new User;

        $user->name = Auth::name();
        $user->tel = $request->tel;
        $user->postcode = $request->postcode;
        $user->address = $request->address;

        $user->save();

        $buy = new Buy;

        $buy->user_id = Auth::id();
        $buy->product_id = $productId;

        // $buy->save();
        Auth::user()->buys()->save($buy);

        return redirect('/mypage');
    }

    public function accountForm(User $user) {
        // dd($user['name']);
        return view('account',[
            'account' => $user,
        ]);
    }

    public function account(EditAccount $request,User $user) {
        
        $columns = ['name','email','password','tel','postcode','address'];

        foreach($columns as $column) {
            $user->$column = $request->$column;
        }
        $user->save();

        return redirect('/mypage');
    }

    public function deleteAccountForm(User $user) {

        $user->delete();
        return redirect('/');
    }

    public function editProfileForm(User $user) {

        return view('profile',[
            'profile' => $user,
        ]);
    }

    public function editProfile(Request $request,User $user) {

        $dir = 'profile';

        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('image')->storeAs('public/' . $dir, $file_name);

        $user->image = $file_name;
        $user->profile = $request->profile;

        $user->save();

        return redirect('/mypage');
    }

    public function deleteAccountflgForm(User $user){
        
        $user->del_flg = 1;
        $user->save();

        return redirect('/owner');
    }

    public function deleteGoodsflgForm(Product $product){

        $product->del_flg = 1;
        $product->save();

        return redirect('/owner');
    }

    public function ownerAccountForm(User $user) {

        return view('owner_account',[
            'account' => $user,
        ]);
    }

    public function ownerAccount(Request $request,User $user) {

        $columns = ['name','email','password'];

        foreach($columns as $column) {
            $user->$column = $request->$column;
        }
        $user->save();

        return redirect('/owner');
    }
}
