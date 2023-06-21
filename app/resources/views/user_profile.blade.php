@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                    <img src="{{ asset('storage/profile/'.$user['image']) }}"></a>
                </div>
                <div class="p-2 bd-highlight">{{$user['name']}}</div>
                <div class="p-2 bd-highlight">{{$user['profile']}}</div>
                @if(empty($follow))
                <form action="{{route('follow.update',['follow' => $user['id']])}}" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="follow_id" value="{{$user['id']}}">
                    <button type="submit" class="btn btn-success">フォロー</button>
                </form>
                @else
                <form action="{{route('follow.destroy',['follow' => $user['id']])}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="follow_id" value="{{$user['id']}}">
                    <button type="submit" class="btn btn-success">フォロー解除</button>
                </form>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
    @foreach($products as $product)
        @if($product['del_flg'] == 0)
            <div class="col-4">
                <div class="d-flex flex-column bd-highlight mb-3">
                    <div class="p-2 bd-highlight">
                        <a href="{{ route('product.detail', ['product' => $product['id']]) }}"><img src="{{ asset('storage/product/'.$product['product_image']) }}"></a>
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