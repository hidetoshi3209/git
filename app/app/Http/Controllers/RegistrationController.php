<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

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
        // $product = Product::find($productId);

        // return view('buy_form',[
        //     'product' => $product,
        // ]);
        dd($productId);
    }
}
