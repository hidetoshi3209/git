@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="p-2 bd-highlight"><img src="{{ asset('storage/product/'.$goods['image']) }}"></div>
                <div class="p-2 bd-highlight">{{$goods['title']}}</div>
                <a href="{{route('delete.goodsflg', ['id' => $goods['id']] )}}">
                    <button class="btn btn-warning">非表示</button>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection