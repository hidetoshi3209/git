<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterProduct;
use App\Http\Requests\EditAccount;
use App\Http\Requests\BuyProduct;
use App\Product;
use App\User;
use App\Buy;
use App\Like;
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

    public function buyProductForm(Product $product) {
        
        $users = Auth::user();
        
        return view('buy_form',[
            'product' => $product,
            'user' => $users,
        ]);
        
    }

    public function buyProduct(BuyProduct $request,$productId) {
        $user = Auth::user();
        
        $user->name = $request->name;
        $user->tel = $request->tel;
        $user->postcode = $request->postcode;
        $user->address = $request->address;

        $user->save();

        $buy = new Buy;

        $buy->user_id = Auth::id();
        $buy->product_id = $productId;

        $buy->save();
        // Auth::user()->buys()->save($buy);

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

    public function deleteAccountForm(User $user) {

        $user->delete();
        return redirect('/');
    }

    public function editProfileForm(User $user) {

        return view('profile',[
            'profile' => $user,
        ]);
    }

    public function editProfile(Request $request,User $user) {

        $dir = 'profile';

        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('image')->storeAs('public/' . $dir, $file_name);

        $user->image = $file_name;
        $user->profile = $request->profile;

        $user->save();

        return redirect('/mypage');
    }

    public function deleteAccountflgForm(User $user){
        
        $user->del_flg = 1;
        $user->save();

        return redirect('/mypage');
    }

    public function backAccountflgForm(User $user){
        
        $user->del_flg = 0;
        $user->save();

        return redirect('/mypage');
    }

    public function deleteGoodsflgForm(Product $product){

        $product->del_flg = 1;
        $product->save();

        return redirect('/mypage');
    }
    

    public function backGoodsflgForm(Product $product){

        $product->del_flg = 0;
        $product->save();

        return redirect('/mypage');
    }

    public function ownerAccountForm(User $user) {

        return view('owner_account',[
            'account' => $user,
        ]);
    }

    public function ownerAccount(Request $request,User $user) {

        $columns = ['name','email','password'];

        foreach($columns as $column) {
            $user->$column = $request->$column;
        }
        $user->save();

        return redirect('/owner');
    }

    public function like(Request $request) {
//         $user_id = Auth::id();
//         // $product_id = $request->product_id;
//         $already_liked = Like::where('user_id',Auth::id())->where('product_id',$product_id)->first();
// // dd($already_liked);
//         if(!$already_liked) {
//             Like::where('product_id',$product_id)->where('user_id',Auth::id())->delete();
//         } else {
            
//             $like = new Like;
//             $like->product_id = $product_id;
//             $like->user_id = $user_id;
//             $like->save();
//         }

//         $product_like_count = Product::withCount('like')->findOrFail($product_id)->like_count;
//         $param = [
//             'product_like_count' => $product_like_count,
//         ];
//         return response()->json($param);

$id = Auth::user()->id;
$product_id = $request->product;
$like = new Like;
$product = Product::findOrFail($product_id);

// 空でない（既にいいねしている）なら
if ($like->asr($id, $product_id)) {
    //likesテーブルのレコードを削除
    $like = Like::where('product_id', $product_id)->where('user_id', $id)->delete();
} else {
    //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
    $like = new Like;
    $like->product_id = $product_id;
    $like->user_id = Auth::user()->id;
    $like->save();
}

//loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
$productLikesCount = $product->loadCount('like')->likes_count;

//一つの変数にajaxに渡す値をまとめる
//今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
$json = [
    'productLikesCount' => $productLikesCount,
];
//下記の記述でajaxに引数の値を返す
return response()->json($json);
}


}
