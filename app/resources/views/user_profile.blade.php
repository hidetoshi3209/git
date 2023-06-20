@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                    <img src="{{ asset('storage/product/'.$user['image']) }}"></a>
                </div>
                <div class="p-2 bd-highlight">{{$user['name']}}</div>
                <div class="p-2 bd-highlight">{{$user['profile']}}</div>
            </div>
        </div>
    </div>
    <div class="row">
    @foreach($products as $product)
        @if($product['del_flg'] == 0)
            <div class="col-4">
                <div class="d-flex flex-column bd-highlight mb-3">
                    <div class="p-2 bd-highlight">
                        <a href="{{ route('product.detail', ['product' => $product['id']]) }}"><img src="{{ asset('storage/product/'.$product['image']) }}"></a>
                    </div>
                    <div class="p-2 bd-highlight">￥{{$product['price']}}</div>
                    <div class="p-2 bd-highlight">{{$product['title']}}</div>
                </div>
            </div>
        @else
    @endif
    @endforeach
    </div>
</div>
@endsection