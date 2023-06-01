@extends('layouts.layout')
@section('content')
    <main>
    <div class="row justify-content-center">
                <div class="col-6 mb-4">
                    <div>
                        <form>
                        @csrf
                            <div class="bd-highlight my-3 mx-3">
                                <div class="my-3">
                                    <input class="form-control me-2" type="search" placeholder="何をおさがしですか？" aria-label="Search">
                                </div>
                                <div class="d-flex justify-content-center flex-row bd-highlight">
                                    <select>
                                        <option value="100">100円以上</option>
                                        <option value="500">500円以上</option>
                                        <option value="1000">1000円以上</option>
                                        <option value="3000">3000円以上</option>
                                        <option value="5000">5000円以上</option>
                                        <option value="10000">10000円以上</option>
                                    </select>
                                    <span>~</span>
                                    <select>
                                        <option value="100">100円以下</option>
                                        <option value="500">500円以下</option>
                                        <option value="1000">1000円以下</option>
                                        <option value="3000">3000円以下</option>
                                        <option value="5000">5000円以下</option>
                                        <option value="10000">10000円以下</option>
                                    </select>
                                </div>
                                <div class="d-flex justify-content-center">   
                                    <button type="submit" class="btn btn-info text-white mt-3">検索</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        
                        <div class="container">
                            <div class="row">
                            @foreach($products as $product)
                                <div class="col-4">
                                    <div class="d-flex flex-column bd-highlight mb-3">
                                        <div class="p-2 bd-highlight">
                                            <a href="{{ route('product.detail', ['id' => $product['id']]) }}">{{$product['image']}}</a>
                                        </div>
                                        <div class="p-2 bd-highlight">￥{{$product['price']}}</div>
                                        <div class="p-2 bd-highlight">{{$product['title']}}</div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>               
                    </div>
                </div>
            </div>
    </main>
@endsection