

@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Product Details</h1>
                    </div>
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('backend.product.index') }}">Products</a></li>
                            <li class="breadcrumb-item active">Product Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Product name: {{ $product->name }}</h5>
                                <p class="card-text">Category: {{ optional($product->category)->name }}</p>
                                <p class="card-text">Price: {{ $product->price }}</p>
                                <p class="card-text">Description: {{ $product->description }}</p>
                                <p class="card-text">Quantity: {{ $product->stock_quantity }}</p>
                                <p class="card-text">Status: {{ $product->status == 1 ? 'Active' : 'Inactive' }}</p>

                                <h6 class="card-subtitle mt-4 mb-2 text-muted">Attributes:</h6>
                                @if (is_array($product->attributes))
                                    @foreach ($product->attributes as $key => $value)
                                        <p>{{ $key }}: {{ $value }}</p>
                                    @endforeach
                                @else
                                    <p>Invalid attributes format</p>
                                @endif

                                <h6 class="card-subtitle mt-4 mb-2 text-muted">Photos:</h6>
                                @if($product->photos && $product->photos->isNotEmpty())
                                    @foreach($product->photos as $photo)
                                        @php
                                            $imagePaths = json_decode($photo->photo_path, true);
                                        @endphp

                                        @if(is_array($imagePaths))
                                            @foreach($imagePaths as $imagePath)
                                                <img src="{{ asset('storage/' . $imagePath) }}" alt="Product Image" style="max-width: 100px; max-height: 80px;">
                                            @endforeach
                                        @else
                                            <img src="{{ asset('storage/' . $photo->photo_path) }}" alt="Product Image" style="max-width: 100px; max-height: 80px;">
                                        @endif
                                    @endforeach
                                @else
                                    <p>No Image</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
