@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div id="productImageContainer">
                    @foreach($product->photos as $index => $photo)
                        @php
                            $imagePaths = json_decode($photo->photo_path, true);
                        @endphp
                        <img src="{{ asset('storage/' . $imagePaths[0]) }}" class="product-image" alt="Furniture Image" style="{{ $index > 0 ? 'display: none;' : '' }}">
                    @endforeach
                </div>
                <div class="mt-2">
                    <button onclick="changeImage(-1)" class="btn btn-secondary" id="prevBtn" style="display: none;">Previous</button>
                    <button onclick="changeImage(1)" class="btn btn-secondary" id="nextBtn" style="display: none;">Next</button>
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="mb-3">{{ $product->name }}</h2>
                <p class="lead">{{ $product->description }}</p>
                <ul>
                    @foreach($product->attributes as $key => $value)
                        <li><strong>{{ $key }}:</strong> {{ $value }}</li>
                    @endforeach
                </ul>
                <p class="mt-3">
                    <button class="btn btn-primary">Add to Cart</button>
                </p>
            </div>
        </div>
    </div>

    <script>
        let currentImageIndex = 0;
        const totalImages = {{ count($product->photos) }};
        const productImageContainer = document.getElementById('productImageContainer');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        function changeImage(step) {
            currentImageIndex += step;

            if (currentImageIndex < 0) {
                currentImageIndex = totalImages - 1;
            } else if (currentImageIndex >= totalImages) {
                currentImageIndex = 0;
            }

            updateImageDisplay();
        }

        function updateImageDisplay() {
            const productImages = document.getElementsByClassName('product-image');
            for (let i = 0; i < productImages.length; i++) {
                productImages[i].style.display = i === currentImageIndex ? 'block' : 'none';
            }

            prevBtn.style.display = totalImages > 1 ? 'block' : 'none';
            nextBtn.style.display = totalImages > 1 ? 'block' : 'none';
        }
    </script>
@endsection
