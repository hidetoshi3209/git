@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="p-2 bd-highlight"><img src="{{ asset('storage/product/'.$goods['product_image']) }}"></div>
                <div class="p-2 bd-highlight">{{$goods['title']}}</div>
                @if($goods['del_flg'] == 0)
                <a href="{{route('delete.goodsflg', ['product' => $goods['id']] )}}">
                    <button class="btn btn-warning">非表示</button>
                </a>
                @else
                <a href="{{route('back.goodsflg', ['product' => $goods['id']] )}}">
                    <button class="btn btn-warning">表示</button>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection