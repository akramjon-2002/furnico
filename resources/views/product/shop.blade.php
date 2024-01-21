@extends('layouts.main')

@section('content')

    <!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Shop</h1>
                    </div>
                </div>
                <div class="col-lg-7">

                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->



    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">

                <div class="row">
                    @foreach($products as $product)
                        <div class="col-12 col-md-4 col-lg-3 mb-5">
                            <a class="product-item" href="{{ route('frontend.product.show', $product->id) }}">
                                @if($product->photos && $product->photos->isNotEmpty())
                                    @foreach($product->photos as $photo)
                                        @php
                                            $imagePaths = json_decode($photo->photo_path, true);
                                        @endphp
                                        <div class="product-image-container">
                                            @if(is_array($imagePaths))
                                                @foreach($imagePaths as $imagePath)
                                                    <img src="{{ asset('storage/' . $imagePath) }}" alt="Product Image"
                                                         class="img-fluid product-thumbnail">
                                                @endforeach
                                            @else
                                                <img src="{{ asset('storage/' . $photo->photo_path) }}"
                                                     alt="Default Product Image" class="img-fluid product-thumbnail">
                                            @endif
                                        </div>
                                    @endforeach
                                @else
                                    <img src="{{ asset('/assets/images/default-product-image.jpg') }}"
                                         alt="Default Product Image" class="img-fluid product-thumbnail">
                                @endif

                                <h3 class="product-title">{{ $product->name }}</h3>
                                <strong class="product-price">${{ number_format($product->price, 2) }}</strong>

                                <span class="icon-cross">
                                <img src="{{ asset('/assets/images/cross.svg') }}" class="img-fluid" alt="Cross Icon">
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    <ul class="pagination justify-content-start">
                        {{ $products->links() }}
                    </ul>
                </div>



            </div>
        </div>
    </div>

@endsection

