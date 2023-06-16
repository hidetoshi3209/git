<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterProduct;
use App\Http\Requests\EditAccount;
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

    public function buyProductForm($productId) {

        $params = Product::where('id',$productId)->first();

        return view('buy_form',[
            'product' => $params,
        ]);
        
    }

    public function buyProduct(Request $request,$productId) {
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

    public function deleteAccountForm() {
        $instance = new User;
        $record = $instance->find(Auth::id());

        $record->delete();
        return redirect('/');
    }

    public function editProfileForm() {
        $instance = new User;
        $record =$instance->find(Auth::id());

        return view('profile',[
            'profile' => $record,
        ]);
    }

    public function editProfile(Request $request) {
        $user = new User;
        $record =$user->find(Auth::id());

        $dir = 'profile';

        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('image')->storeAs('public/' . $dir, $file_name);

        $record->image = $file_name;
        $record->profile = $request->profile;

        $record->save();

        return redirect('/mypage');
    }

    public function deleteAccountflgForm(int $id, Request $request){
        $instance = new User;
        $record = $instance->find($id);
        
        $record->del_flg = 1;
        $record->del_flg = $request->del_flg;

        $record->save();

        return redirect('/owner');
    }

    public function deleteGoodsflgForm(int $id){
        $instance = new Product;
        $record = $instance->find($id);

        $record->del_flg = 1;
        $record->save();

        return redirect('/owner');
    }

    public function ownerAccountForm() {
        $user = new User;
        $result = $user->find(Auth::id());

        return view('owner_account',[
            'account' => $result,
        ]);
    }

    public function ownerAccount(Request $request) {
        $instance = new user;
        $record = $instance->find(Auth::id());

        $columns = ['name','email','password'];

        foreach($columns as $column) {
            $record->$column = $request->$column;
        }
        $record->save();

        return redirect('/owner');
    }
}
