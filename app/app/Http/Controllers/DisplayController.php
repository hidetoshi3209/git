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
}
