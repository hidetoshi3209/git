@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">管理者名</label>
                <input type="text" class="form-control" name="name" value="{{$account['name']}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">メールアドレス</label>
                <input type="text" class="form-control" name="email" value="{{$account['email']}}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">パスワード</label>
                <input type="text" class="form-control" name="password" value="{{$account['password']}}">
            </div>
            <div class='d-flex justify-content-around mt-3'>
                    <button class="btn btn-danger">更新</button>
            </div>
        </form>
    </div>
</div>
@endsection