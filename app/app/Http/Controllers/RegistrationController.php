<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;

class RegistrationController extends Controller
{
    public function createProductForm() {
        return view('product_form');
    }

    public function createProduct(Request $request) {
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

        $product->save();

        return redirect('/mypage');
    }

    public function buyProductForm($productId) {
        
        $params = Product::where('id',$productId)->where('user_id','1')->get();
        // dd($params);
        return view('buy_form',[
            'product' => $params,
        ]);
        
    }

    public function buyProduct(Request $request) {
        $user = new User;


        $user->name = $request->name;
        $user->tel = $request->tel;
        $user->postcode = $request->postcode;
        $user->address = $request->address;

        $user->save();

        return redirect('/mypage');
    }

    public function accountForm(int $id) {
        $user = new User;
        $result = $user->find($id);

        return view('account',[
            'account' => $result,
        ]);
    }

    public function account(int $id, Request $request) {
        $instance = new user;
        $record = $instance->find($id);

        $columns = ['name','email','password','tel','postcode','address'];

        foreach($columns as $column) {
            $record->$column = $request->$column;
        }
        $record->save();

        return redirect('/mypage');
    }

    public function deleteAccountForm(int $id) {
        $instance = new User;
        $record = $instance->find($id);

        $record->delete();
        return redirect('/');
    }

    public function editProfileForm(int $id) {
        $instance = new User;
        $record =$instance->find($id);

        return view('profile',[
            'profile' => $record,
        ]);
    }

    public function editProfile(int $id,Request $request) {
        $user = new User;
        $record =$user->find($id);
        // dd($record);

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
}
