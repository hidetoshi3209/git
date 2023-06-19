@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="p-2 bd-highlight"><img src="{{ asset('storage/product/'.$product['image']) }}"></div>
                @if($instance->asr(Auth::user()->id,$product->id))
                <p class="favorite-marke">
                    <button class="like-toggle loved" href="" data-productid="{{ $product->id }}"><i class="fas fa-heart"></i></button>
                    
                </p>
                @else
                <p class="favorite-marke">
                    <button class="like-toggle" href="" data-productid="{{ $product->id }}"><i class="fas fa-heart"></i></button>
                    
                </p>
                @endif

                <div class="p-2 bd-highlight"><h3>{{$product['title']}}</h3></div>
                <div class="p-2 bd-highlight">￥{{$product['price']}}</div>
                <div class="p-2 bd-highlight">{{$product['comment']}}</div>
                <div class="p-2 bd-highlight">{{$product['condition']}}</div>
                
                <a href="{{ route('buy.product' , ['product' => $product['id']]) }}">
                    <button class="btn btn-danger">購入手続きへ</button>
                </a>
            </div>
        </div>
    </div>
</div>
<script>
    
$(function () {
    let like = $('.like-toggle'); //like-toggleのついたiタグを取得し代入。
    console.log(1);
    let likeReviewId; //変数を宣言（なんでここで？）
    like.on('click', function () { //onはイベントハンドラー
        let $this = $(this); //this=イベントの発火した要素＝iタグを代入
        likeReviewId = $this.data('productid'); //iタグに仕込んだdata-review-idの値を取得
        console.log(likeReviewId);
      //ajax処理スタート
      $.ajax({
        headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
          'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        },  //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
        url: '/like', //通信先アドレスで、このURLをあとでルートで設定します
        method: 'POST', //HTTPメソッドの種別を指定します。1.9.0以前の場合はtype:を使用。
        data: { //サーバーに送信するデータ
          'product': likeReviewId //いいねされた投稿のidを送る
        },
      })
      //通信成功した時の処理
      .done(function (data) {
        $this.toggleClass('loved'); //likedクラスのON/OFF切り替え。
        $this.next('.like-counter').html(data.review_likes_count);
      })
      //通信失敗した時の処理
      .fail(function () {
        console.log('fail'); 
      });
    });
    });
  
</script>
<style>
    .loved i {
        color: red !important;
    }
</style>
@endsection