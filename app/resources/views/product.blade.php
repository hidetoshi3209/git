@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                    <!-- <a href="">{{$product['image']}}</a> -->
                </div>
                <div class="p-2 bd-highlight">{{$product['title']}}</div>
                <div class="p-2 bd-highlight">￥{{$product['price']}}</div>
                <div class="p-2 bd-highlight">￥{{$product['comment']}}</div>
                <div class="p-2 bd-highlight">￥{{$product['condition']}}</div>
            </div>
        </div>
    </div>
</div>
@endsection