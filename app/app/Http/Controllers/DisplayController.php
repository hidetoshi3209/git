<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

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
        $product = new Product;
        $where = $product->where('id','=',$productId)->get();

        return view('product',[
            'product' => $where,
        ]);
    }
}
