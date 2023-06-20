<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\user;
use App\Buy;
use App\Like;
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

        if(isset($title)){
            $products = $product->where('title','LIKE',"%{$title}%")->get();
        }

        if(isset($min) && isset($max)){
            $products = $product->whereBetween('price',[$min,$max])->get();
        }

        if(isset($title) && isset($min) && isset($max)){
            $products = $product->where('title','LIKE',"%{$title}%")->whereBetween('price',[$min,$max])->get();
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
        $product = new Product;
        $products = $product->where('user_id',Auth::id())->get();
        $users =$user->where('role','0')->get(); 
        $role = $user->value('role');
        $del_flg = $user->value('del_flg');


        $productall = $product->all();
        $role = $user->where('id',Auth::id())->first();

        if(isset($title)){
            $products = $product->where('title','LIKE',"%{$title}%")->get();
        }

        if(isset($min) && isset($max)){
            $products = $product->whereBetween('price',[$min,$max])->get();
        }

        if(isset($title) && isset($min) && isset($max)){
            $products = $product->where('title','LIKE',"%{$title}%")->whereBetween('price',[$min,$max])->get();
        }

        if($del_flg == 0){
            if($role['role'] == 0){
                return view('main',[
                    'products' =>$products,
                    'user' => $users,
                    'title' => $title,
                    'min' => $min,
                    'max' => $max,
                ]);
            }else{
                return view('ownertop',[
                    'users' => $users,
                    'products' => $productall,
                ]);
            }
        }else{
            return view('stop');
        }
    }

    public function productDetail(Product $product) {
        $like = Like::where('product_id',$product->id)->where('user_id',Auth::id())->first();
        $instance = new Like;
        $user = $product->join('users','products.user_id','users.id')->where('user_id',$product['user_id'])->first();
// dd($user);
        return view('product',[
            'product' => $product,
            'like' => $like,
            'instance' => $instance,
            'user' => $user,
        ]);
    }

    public function buyHistory() {
        $instance = new Product;

        $record = $instance->join('buys','products.id','buys.product_id')->join('users','buys.user_id','users.id')
        // ->select('products.*','users.*','buys.*','buys.user_id as buyuserid')->get();
        ->where('buys.user_id',Auth::id())->get();

        return view('buy_history',[
            'records' => $record,
        ]);
    }

    public function profitHistory() {
        $instance = new Buy;

        $record = $instance->join('products','buys.product_id','products.id')->join('users','buys.user_id','users.id')
        ->where('products.user_id',Auth::id())->get();
        
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

    public function likeHistory() {
        $instance = new Product;
        $record = $instance->join('likes','products.id','likes.product_id')->join('users','likes.user_id','users.id')
        ->where('likes.user_id',Auth::id())->get();

        return view('like_history',[
            'likes' => $record,
        ]);
    }

    public function userProfile(User $user,Product $product) {
        $product = Product::where('user_id',$user['id'])->get();
        // dd($product);
        return view('user_profile',[
            'user' => $user,
            'products' => $product,
        ]);

    }
}
