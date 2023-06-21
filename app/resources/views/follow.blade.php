@extends('layouts.layout')
@section('content')
<div class="container">
                            <div class="row">
                            @foreach($follows as $follow)
                                <div class="col-4">
                                    <div class="d-flex flex-column bd-highlight mb-3">
                                        <div class="p-2 bd-highlight">
                                            <img src="{{ asset('storage/profile/'.$follow['image']) }}"></a>
                                        </div>
                                        <div class="p-2 bd-highlight">{{$follow['name']}}</div>
                                    </div>
                                </div>
                            @endforeach
                            </div>
                        </div>
                        @endsection