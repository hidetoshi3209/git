<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\user;
use App\Buy;
use Illuminate\Support\Facades\Auth;

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
        // $product = new Product;
        // $products = $product->all();

        $product = Product::query();
        $products = $product->where('user_id',Auth::id())->get();
        $roles =User::where('role','0');

        return view('main',[
            'products' =>$products,
            'role' => $roles,
        ]);
    }

    public function productDetail(Product $product) {

        return view('product',[
            'product' => $product,
        ]);
    }

    public function buyHistory() {
        $instance = new Buy;

        $history = $instance->join('products','buys.product_id','products.id')->join('users','buys.user_id','users.id')->get();
        $record = $history->where('user_id','!=',Auth::id());

        return view('buy_history',[
            'records' => $record,
        ]);
    }

    public function profitHistory() {
        $instance = new Buy;

        $history = $instance->join('products','buys.product_id','products.id')->join('users','buys.user_id','users.id')->get();
        $record = $history->where('user_id',Auth::id());
        
        return view('profit_history',[
            'records' => $record,
        ]);
    }

    public function indexowner() {
        $user = new User;
        $product = new Product;

        $users = $user->all();
        $products = $product->all();
        $roles =User::where('role','1');

        return view('ownertop',[
            'users' => $users,
            'products' => $products,
            'role' => $roles,
        ]);
    }

    public function userDetail(User $user) {

        return view('account_stop',[
            'user' => $user,
        ]);
    }

    public function goodsDetail(Product $product) {

        return view('goods_stop',[
            'goods' => $product,
        ]);
    }
}
