@extends('layouts.layout')
@section('content')
<div class="container">
                            <div class="row">
                            @foreach($likes as $like)
                                <div class="col-4">
                                    <div class="d-flex flex-column bd-highlight mb-3">
                                        <div class="p-2 bd-highlight">
                                            <img src="{{ asset('storage/product/'.$like['image']) }}"></a>
                                        </div>
                                        <div class="p-2 bd-highlight">￥{{$like['price']}}</div>
                                        <div class="p-2 bd-highlight">{{$like['title']}}</div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        @endsection