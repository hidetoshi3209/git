@extends('layouts.layout')
@section('content')
<div class="col-6 d-flex mx-3">
    <div class="container">
        ユーザーリスト
        <div class="row">
        @foreach($users as $user)
            <div class="col-6">
                <div class="d-flex flex-column bd-highlight mb-3">
                    <div class="p-2 bd-highlight">
                        <a href="{{ route('user.detail',['user' => $user['id']]) }}">
                            <img src="{{ asset('storage/profile/'.$user['image']) }}">
                        </a>
                    </div>
                    <div class="p-2 bd-highlight">{{$user['name']}}</div>
                </div>
            </div>
        @endforeach
        </div>
    </div> 
    <div class="container">
        商品リスト
        <div class="row">
        @foreach($products as $product)
            <div class="col-6">
                <div class="d-flex flex-column bd-highlight mb-3">
                    <div class="p-2 bd-highlight">
                        <a href="{{ route('goods.detail',['product' => $product['id']]) }}">
                            <img src="{{ asset('storage/product/'.$product['product_image']) }}"></a>
                        </a>
                    </div>
                    <div class="p-2 bd-highlight">{{$product['title']}}</div>
                </div>
            </div>
        @endforeach
        </div>
    </div> 
</div>
@endsection