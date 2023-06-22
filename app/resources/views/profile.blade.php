@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="p-2 bd-highlight"><img src="{{ asset('storage/profile/'.$profile['image']) }}" class="rounded-circle"></div>
        <form action="{{ route('edit.profile',['user' => $profile['id']] )}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label">ユーザーアイコン</label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">自己紹介</label>
                <textarea class='form-control' name='profile'>{{ $profile->comment }}</textarea>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary">更新する</button>
            </div>
        </form>
    </div>
</div>




@endsection