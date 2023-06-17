<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\user;
use App\Buy;
use Illuminate\Auth\Middleware\RequirePassword;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    public function index(Request $request) {
        $title = $request->title;
        $min = $request->min;
        $max = $request->max;
        $product = new Product;
        $products = $product->all();

        if(isset($title) || isset($min) || isset($max)){
            $products = $product->where('title',$title)->whereBetween('price',[$min,$max])->get();
        }

        return view('home',[
            'products' =>$products,
            'title' => $title,
            'min' => $min,
            'max' => $max,
        ]);
    }

    public function indexmypage(Request $request) {
        // $product = new Product;
        // $products = $product->all();
        $title = $request->title;
        $min = $request->min;
        $max = $request->max;
        $user = new User;
        $product = Product::query();
        $products = $product->where('user_id',Auth::id())->get();
        $users =$user->where('role','0')->get(); 
        $del_flg = $user->value('del_flg');

        if(isset($title) || isset($min) || isset($max)){
            $products = $product->where('title',$title)->whereBetween('price',[$min,$max])->get();
        }

        if($del_flg == 0){
            return view('main',[
                'products' =>$products,
                'user' => $users,
                'title' => $title,
                'min' => $min,
                'max' => $max,

            ]);
        }else{
            return view('stop');
        }
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

        $users = $user->where('role','0');
        $products = $product->all();
        $role = $user->value('role');
        
        if($role == 1){
            return view('ownertop',[
                'users' => $users,
                'products' => $products,
            ]);
        }
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
