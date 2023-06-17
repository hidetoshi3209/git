@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="p-2 bd-highlight"><img src="{{ asset('storage/product/'.$product['image']) }}"></div>
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
@endsection