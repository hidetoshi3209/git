@extends('layouts.layout')
@section('content')
<main class="p-3">
            <a href="{{ url('/product_list') }}" class="nav-link active"><button type="button" class="btn btn-primary btn-lg">出品一覧</button></a>
            <a href="{{ url('/buy_history') }}" class="nav-link"><button type="button" class="btn btn-secondary btn-lg">購入履歴</button></a>
            <a href="{{ url('/profit_history') }}" class="nav-link"><button type="button" class="btn btn-secondary btn-lg">売上履歴</button></a>
            <a href="{{ url('/like/history') }}" class="nav-link"><button type="button" class="btn btn-primary btn-lg">いいね一覧</button></a>
            <a href="{{ url('/follow') }}" class="nav-link"><button type="button" class="btn btn-primary btn-lg">フォロー一覧</button></a>
</main>
@endsection