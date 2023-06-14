@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row">
    @foreach($records as $record)
        <div class="col-4">
            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                    <img src="{{ asset('storage/product/'.$record['image']) }}"></a>
                </div>
                <div class="p-2 bd-highlight">￥{{$record['price']}}</div>
                <div class="p-2 bd-highlight">{{$record['title']}}</div>
                <div class="p-2 bd-highlight">{{$record['created_at']}}</div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection