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

        $product->image = $request->image;
        $product->title = $request->title;
        $product->price = $request->price;
        $product->comment = $request->comment;
        $product->condition = $request->condition;

        $product->save();

        return redirect('/mypage');
    }
}
