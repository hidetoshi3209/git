@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                    <img src="{{ asset('storage/product/'.$product['image']) }}">
                </div>
                <div class="p-2 bd-highlight">￥{{$product['price']}}</div>
                <div class="p-2 bd-highlight">{{$product['title']}}</div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <form action="{{ route('buy.product',['id' => $product['id']]) }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">氏名</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="tel" class="form-label">電話番号</label>
                <input type="text" class="form-control" name="tel">
            </div>
            <div class="mb-3">
                <label for="postcode" class="form-label">郵便番号</label>
                <input type="text" class="form-control" name="postcode">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">住所</label>
                <input type="text" class='form-control' name='address'>
            </div>
            <div class='d-flex justify-content-around mt-3'>
                <a href="{{route('product.detail', ['id' => $product['id']] )}}">
                    <button class="btn btn-danger">戻る</button>
                </a>
                    <button class="btn btn-secondary">購入</button>
            </div>
        </form>
    </div>
</div>
@endsection