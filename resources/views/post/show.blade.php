@extends('layouts.main')
@section('content')


    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="col-md-6 mt-5 mb-5">
                    <h5 class="card-title">{{ $post->title }}</h5>
                </div>

                <div class="card">

                    <img src="{{ asset('/storage/' . $post->photo_path) }}" class="card-img-top" alt="Post Image">
                    <div class="card-body">

                        <p class="card-text">{{!! $post->content !!}}</p>
                        <p class="card-text"><small class="text-muted">Created at: {{ $post->created_at->format('y.m.d') }}</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
