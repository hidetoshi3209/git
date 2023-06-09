<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\user;

class DisplayController extends Controller
{
    public function index() {
        $product = new Product;
        $products = $product->all();

        return view('home',[
            'products' =>$products,
        ]);
    }

    public function indexmypage() {
        $product = new Product;
        $products = $product->all();

        return view('main',[
            'products' =>$products,
        ]);
    }

    public function productDetail(int $productId) {
        $product = Product::find($productId);

        return view('product',[
            'product' => $product,
        ]);
    }

    public function buyHistory() {
        $product = new Product;
        $user = new User;
        $buy_product = $product->with('buy')->first();
        $buy_user = $user->with('buy')->first();
        dd($buy_user);
        return view('buy_history');

        

    }
}
