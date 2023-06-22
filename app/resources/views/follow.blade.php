@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row">
    @if($follows->isEmpty())
    <p class="text-center">フォローしているユーザーはいません</p>
    @else
    <h3>フォローリスト</h3>
    @foreach($follows as $follow)
        <div class="col-4">
            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                    <img src="{{ asset('storage/profile/'.$follow['image']) }}" class="rounded-circle"></a>
                </div>
                <div class="p-2 bd-highlight">{{$follow['name']}}</div>
            </div>
        </div>
    @endforeach
    @endif
    </div>
</div>
@endsection