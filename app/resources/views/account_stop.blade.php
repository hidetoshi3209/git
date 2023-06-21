@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-4">
            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="p-2 bd-highlight"><img src="{{ asset('storage/profile/'.$user['image']) }}"></div>
                <div class="p-2 bd-highlight">{{$user['name']}}</div>
                @if($user['del_flg'] == 0)
                <a href="{{route('delete.accountflg', ['user' => $user['id']] )}}">
                    <button class="btn btn-warning">利用停止</button>
                </a>
                @else
                <a href="{{route('back.accountflg', ['user' => $user['id']] )}}">
                    <button class="btn btn-warning">利用再開</button>
                </a>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection