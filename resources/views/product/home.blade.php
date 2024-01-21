@extends('layouts.main')
@section('content')
    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Furnico Interior <span class="d-block">Mebel Olami</span></h1>
                        <p class="mb-1">Keng assortiment!</p>
                        <p class="mb-1">Qulay narxlar!</p>
                        <p class="mb-4">Ko'nglingizga yoqqanini osongina toping va sotib oling!</p>
                        <p><a href="" class="btn btn-secondary me-2">Sotib olish</a><a
                                href="{{route('frontend.product.shop')}}"></a></p>
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

    <!-- Start Product Section -->
    <div class="product-section">
        <div class="container">
            <div class="row">

                <!-- Start Column 1 -->
                <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                    <h2 class="mb-4 section-title">Sifatli materiallardan tayyorlangan!</h2>
                    <p class="mb-4">Biz doimo mahsulotlarimiz uchun pishiq va yuqori sifatli materiallardan
                        foydalanamiz!</p>
                    <p><a href="{{route('frontend.product.shop')}}" class="btn">Hoziroq sotib olish!</a></p>
                </div>
                <!-- End Column 1 -->

                <!-- Start Column 2 -->
                @foreach($products as $product)
                    <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                        <a class="product-item" href="{{ route('frontend.product.show', $product->id) }}">
                            @if($product->photos && $product->photos->isNotEmpty())
                                @php
                                    $firstPhotoPath = json_decode($product->photos->first()->photo_path, true);
                                @endphp
                                <img src="{{ asset('storage/' . $firstPhotoPath[0]) }}"
                                     class="img-fluid product-thumbnail" alt="Product Image">
                            @else
                                <img src="{{ asset('/assets/images/default-product-image.jpg') }}"
                                     class="img-fluid product-thumbnail" alt="Default Product Image">
                            @endif

                            <h3 class="product-title">{{ $product->name }}</h3>
                            <strong class="product-price">${{ number_format($product->price, 2) }}</strong>

                            <span class="icon-cross">
                    <img src="{{ asset('/assets/images/cross.svg') }}" class="img-fluid" alt="Cross Icon">
                </span>
                        </a>
                    </div>
                @endforeach

                <!-- End Column 2 -->


            </div>
        </div>
    </div>
    <!-- End Product Section -->

    <!-- Start Why Choose Us Section -->
    <div class="why-choose-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <h2 class="section-title">Nima uchun bizni tanlashadi!?</h2>
                    <p>Bizning afzalliklarimiz haqida pastdagi slaydlardan batafsil malumot oling!</p>

                    <div class="row my-5">
                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{asset('/assets/images/truck.svg')}}" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Tez &amp; Bepul Yetkazish</h3>
                                <p>Siz bizning mahsulotimizni sotib olsangiz biz sizga uni tez va asosiysi mutlaqo
                                    tekinga eltib beramiz!</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{asset('/assets/images/bag.svg')}}" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Sotib olish oson!</h3>
                                <p>Siz o'zingizga yoqqan mahsulotni savatchaga qo'shsangiz bizning xodimlarimiz tezda
                                    siz bilan aloqaga chiqishadi va buyurtma rasmiylashtiriladi! </p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{asset('/assets/images/support.svg')}}" alt="Image" class="imf-fluid">
                                </div>
                                <h3>24/7 Qo'llab-quvvatlash</h3>
                                <p>Biz sizning qulayligingiz uchun tunu kun xizmatdamiz!</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{asset('/assets/images/return.svg')}}" alt="Image" class="imf-fluid">
                                </div>
                                <h3>Muammosiz sotib olingan mahsulotni qaytarish!</h3>
                                <p>Malum bir sabablarga ko'ra mahsulotni qaytarmoqchi bo'lsangiz bu sizga muammo
                                    emas!</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="{{asset('/assets/images/why-choose-us-img.jpg')}}" alt="Image" class="img-fluid">
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Why Choose Us Section -->

    <!-- Start We Help Section -->
    <div class="we-help-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="imgs-grid">
                        <div class="grid grid-1"><img src="{{asset('/assets/images/img-grid-1.jpg')}}" alt="Untree.co">
                        </div>
                        <div class="grid grid-2"><img src="{{asset('/assets/images/img-grid-2.jpg')}}" alt="Untree.co">
                        </div>
                        <div class="grid grid-3"><img src="{{asset('/assets/images/img-grid-3.jpg')}}" alt="Untree.co">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 ps-lg-5">
                    <h2 class="section-title mb-4">Biz sizga zamonaviy intererda o'zingizga yoqqan muxitni yaratishda
                        yordam beramiz! </h2>
                    <p>Siz bizga aloqaga chiqish orqali yuqori darajadagi mutahassislarimizdan mutlaqo bepul tavsiyalar
                        olishingiz mumkin!</p>

                    <ul class="list-unstyled custom-list my-4">
                        <li>Agar sizda qanday mahsulot tanlashda muammo bo'lsa!</li>
                        <li>Qanday rang tanlashni bilmay turgan bo'lsangiz!</li>
                    </ul>
                    <p><a herf="{{route('frontend.product.contact')}}" class="btn">Biz bilan aloqaga chiqing!</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End We Help Section -->

    <!-- Start Popular Product -->
    <div class="popular-product">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="product-item-sm d-flex">
                        <div class="thumbnail">
                            <img src="{{asset('/assets/images/product-1.png')}}" alt="Image" class="img-fluid">
                        </div>
                        <div class="pt-3">
                            <h3>Yumshoq mebellar</h3>
                            <p>Bizning sahifamizdan turli yumshoq mebellarni topishingiz mumkin!</p>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="product-item-sm d-flex">
                        <div class="thumbnail">
                            <img src="{{asset('/assets/images/product-2.png')}}" alt="Image" class="img-fluid">
                        </div>
                        <div class="pt-3">
                            <h3>Stol va stullar</h3>
                            <p>Stol va stullarning keng assortimenti!</p>

                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="product-item-sm d-flex">
                        <div class="thumbnail">
                            <img src="{{asset('/assets/images/product-3.png')}}" alt="Image" class="img-fluid">
                        </div>
                        <div class="pt-3">
                            <h3>Oshxona mebellari</h3>
                            <p>O'zingizga yoqadigan oshxona jixozlari!</p>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Popular Product -->





    <!-- Start Testimonial Slider -->
    <div class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <h2 class="section-title">Biz haqimizda fikrlar!</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="testimonial-slider-wrap text-center">

                        <div id="testimonial-nav">
                            <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                            <span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
                        </div>

                        <div class="testimonial-slider">

                            @foreach($reviews as $review)
                                <div class="item">
                                    <div class="row justify-content-center">
                                        <div class="col-lg-8 mx-auto">
                                            <div class="testimonial-block text-center">
                                                <blockquote class="mb-5">
                                                    <p>&ldquo;{{ $review->text }}&rdquo;</p>
                                                </blockquote>

                                                <div class="author-info">
                                                    <div class="author-pic">
                                                        <img src="{{ asset('/assets/images/person-1.png') }}" alt="{{ $review->fullname }}"
                                                             class="img-fluid">
                                                    </div>
                                                    <h3 class="font-weight-bold">{{ $review->fullname }}</h3>
                                                    <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>
    <!-- End Testimonial Slider -->








    <!-- Start Blog Section -->
    <div class="blog-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-6">
                    <h2 class="section-title">Maqolalar</h2>
                </div>
                <div class="col-md-6 text-start text-md-end">
                    <a href="{{route('frontend.post.index')}}" class="more">Hamma maqolalarni ko'rish</a>
                </div>
            </div>

            <div class="row">
                @foreach($posts as $post)
                    <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                        <div class="post-entry">
                            <a href="#" class="post-thumbnail"><img src="{{ asset('/storage/' . $post->photo_path) }}" alt="Image" class="img-fluid"></a>
                            <div class="post-content-entry">
                                <h3><a href="{{route('frontend.post.show', $post->id)}}">{{ $post->title }}</a></h3>
                                <div class="meta">
                                    <span>by <a href="#">{{ $post->author }}</a></span>
                                    <span>on <a href="#">{{ $post->published_date }}</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach




            </div>
        </div>
    </div>
    <!-- End Blog Section -->
@endsection
