@extends('layouts.layout')
@section('content')
<div class="col d-flex justify-content-center mx-3">
    <div class="container">
        ユーザーリスト
        <div class="row">
        @foreach($users as $user)
            <div class="col-6">
                <div class="d-flex flex-column bd-highlight mb-3">
                    <div class="p-2 bd-highlight">
                        <a href="{{ route('user.detail',['user' => $user['id']]) }}">
                            <img src="{{ asset('storage/profile/'.$user['image']) }} " class="rounded-circle img-fluid max-width: 100%;">
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
                            <img src="{{ asset('storage/product/'.$product['product_image']) }}" class="img-fluid max-width: 100%;"></a>
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