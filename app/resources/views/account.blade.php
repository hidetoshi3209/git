@extends('layouts.layout')
@section('content')
<div class="container">
    @if($errors->any())
    <div class="alert alert-danger">
        @foreach($errors->all() as $message)
            <p>{{ $message }}</p>
        @endforeach
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="p-2 bd-highlight"><img src="{{ asset('storage/profile/'.$account['image']) }}"></div>
        <a href="{{route('edit.profile',['user' => $account['id']] )}}">
            <button class="btn btn-secondary">プロフィール変更</button>
        </a>
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">氏名</label>
                <input type="text" class="form-control" name="name" value="{{$account['name']}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">メールアドレス</label>
                <input type="text" class="form-control" name="email" value="{{$account['email']}}">
            </div>
            <div class="mb-3">
                <label for="tel" class="form-label">電話番号</label>
                <input type="text" class="form-control" name="tel" value="{{$account['tel']}}">
            </div>
            <div class="mb-3">
                <label for="postcode" class="form-label">郵便番号</label>
                <input type="text" class="form-control" name="postcode" value="{{$account['postcode']}}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">住所</label>
                <input type="text" class='form-control' name='address' value="{{$account['address']}}">
            </div>
            <div class='d-flex justify-content-around mt-3'>
                <button class="btn btn-danger">更新</button>
            </div>
            </form>
                <a href="{{route('delete.account',['user' => $account['id']] )}}">
                    <button class="btn btn-secondary">アカウント削除</button>
                </a>
    </div>
</div>
@endsection