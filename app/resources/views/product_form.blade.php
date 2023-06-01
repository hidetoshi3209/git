@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form action="{{ route('create.product')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="image" class="form-label">出品画像</label>
                <input type="file" class="form-control" name="image">
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">商品名</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">価格</label>
                <input type="text" class="form-control" name="price">
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">商品説明</label>
                <textarea class='form-control' name='comment'></textarea>
            </div>
            <div class="mb-3">
                <label for="condition" class="form-label">商品の状態</label>
                <select name="condition" class="form-select">
                    <option value="" hidden></option>
                    <option value="2">良い</option>
                    <option value="1">普通</option>
                    <option value="0">悪い</option>
                </select>
            </div>
            <div class="row justify-content-center">
                <button type="submit" class="btn btn-primary">出品する</button>
            </div>
        </form>
    </div>
</div>
@endsection