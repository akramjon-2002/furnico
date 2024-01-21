@extends('layouts.main')

@section('content')

    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Blog</h1>
                        <p class="mb-4">Bu yerda siz bizning mutahassislarimizdan foydali maqolalarni o'qishingiz
                            mumkin!</p>
                        <p><a href="{{route('frontend.product.shop')}}" class="btn btn-secondary me-2">Xarid qilish</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="{{asset('/assets/images/couch.png')}}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->



    <!-- Start Blog Section -->
    <div class="blog-section">
        <div class="container mb-5">

            <div class="row">

                @foreach($posts as $post)
                    <div class="col-12 col-sm-6 col-md-4 mb-5">
                        <div class="post-entry">
                            <a href="{{route('frontend.post.show', $post->id)}}" class="post-thumbnail">
                                <img src="{{ asset('/storage/'. $post->photo_path) }}" alt="Image" class="img-fluid">
                            </a>
                            <div class="post-content-entry">
                                <h3><a href="{{route('frontend.post.show', $post->id)}}">{{ $post->title }}</a></h3>

                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- End Blog Section -->


                <div class=" col-12 mt-4 mb-5">
                    <ul class="pagination justify-content-start">
                        {{ $posts->links() }}
                    </ul>

                </div>
            </div>

@endsection
