<!-- resources/views/admin/products/edit.blade.php -->

@extends('admin.layouts.main')
@section('content')





    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('backend.product.index') }}">Products</a></li>
                            <li class="breadcrumb-item active">Edit Product</li>
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
                    <div class="col-md-6">
                        <form action="{{ route('backend.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Product name" value="{{ old('name', $product->name) }}">
                            </div>
                            @error('name')
                            <div class="text-danger mb-4">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                            <div class="text-danger mb-4">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Product price" value="{{ old('price', $product->price) }}">
                            </div>
                            @error('price')
                            <div class="text-danger mb-4">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" placeholder="Product description">{{ old('description', $product->description) }}</textarea>
                            </div>
                            @error('description')
                            <div class="text-danger mb-4">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" class="form-control" name="stock_quantity" placeholder="Product quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}">
                            </div>
                            @error('stock_quantity')
                            <div class="text-danger mb-4">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Status</label>
                                <select name="is_active" class="form-control">
                                    <option value="1" {{ old('is_active', $product->is_active) == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('is_active', $product->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            @error('is_active')
                            <div class="text-danger mb-4">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Height</label>
                                <input type="number" class="form-control" name="attributes[height]" placeholder="Height" value="{{ old('attributes.height', optional($product->attributes)['height']) }}">
                            </div>
                            @error('attributes[height]')
                            <div class="text-danger mb-4">{{ $message }}</div>
                            @enderror


                            <div class="form-group">
                                <label>Width</label>
                                <input type="number" class="form-control" name="attributes[width]" placeholder="Width" value="{{ old('attributes.width', optional($product->attributes)['width']) }}">
                            </div>
                            @error('attributes[width]')
                            <div class="text-danger mb-4">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Material</label>
                                <input type="text" class="form-control" name="attributes[material]" placeholder="Material" value="{{ old('attributes.material', optional($product->attributes)['material']) }}">
                            </div>
                            @error('attributes[material]')
                            <div class="text-danger mb-4">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Brand</label>
                                <input type="text" class="form-control" name="attributes[brand]" placeholder="Brand" value="{{ old('attributes.brand', optional($product->attributes)['brand']) }}">
                            </div>
                            @error('attributes[brand]')
                            <div class="text-danger mb-4">{{ $message }}</div>
                            @enderror


                            {{-- Фото --}}

                            @if($product->photos && $product->photos->isNotEmpty())
                                <div class="col-md-6">
                                    <label>Current photos:</label>
                                    <div class="mb-2">
                                        @foreach($product->photos as $photo)
                                            @php
                                                $imagePaths = json_decode($photo->photo_path, true);
                                            @endphp

                                            @if(is_array($imagePaths))
                                                @foreach($imagePaths as $imagePath)
                                                    <img src="{{ asset('storage/' . $imagePath) }}" alt="Current Product Image" style="max-width: 100px; max-height: 80px; margin-right: 5px;">
                                                @endforeach
                                            @else
                                                <img src="{{ asset('storage/' . $photo->photo_path) }}" alt="Current Product Image" style="max-width: 100px; max-height: 80px;">
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            @endif



                            @error('images')
                            <div class="text-danger mb-4">{{ $message }}</div>
                            @enderror
                            {{-- Фото --}}
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Update photo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="images[]" multiple>
                                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Отображение текущих фото --}}

                            </div>
                            {{-- /Фото --}}


                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-block" value="Update">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
