@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row">
    @if($records->isEmpty())
    <p class="text-center">購入した商品はありません</p>
    @else
    @foreach($records as $record)
        <div class="col-4 mx-5">
            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                    <img src="{{ asset('storage/product/'.$record['product_image']) }}" class="img-fluid max-width: 100%;"></a>
                </div>
                <div class="p-2 bd-highlight">￥{{$record['price']}}</div>
                <div class="p-2 bd-highlight">{{$record['title']}}</div>
                <div class="p-2 bd-highlight">{{$record['created_at']}}</div>
            </div>
        </div>
    @endforeach
    @endif
    </div>
</div>
@endsection