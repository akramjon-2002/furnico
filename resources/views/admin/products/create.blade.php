@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Product</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('backend.home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('backend.product.index') }}">Products</a></li>
                            <li class="breadcrumb-item active">Create Product</li>
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
                        <form action="{{ route('backend.product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Product name">
                            </div>
                            @error('name')
                            <div class="text-danger mb-4">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                            <div class="text-danger mb-4">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" name="price" placeholder="Product price">
                            </div>
                            @error('price')
                            <div class="text-danger mb-4">{{ $message }}</div>
                            @enderror

                            {{-- Добавьте остальные поля, аналогично полям в вашей форме для создания поста --}}

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" placeholder="Product description"></textarea>
                            </div>
                            @error('description')
                            <div class="text-danger mb-4">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" class="form-control" name="stock_quantity" placeholder="Product quantity">
                            </div>
                            @error('quantity')
                            <div class="text-danger mb-4">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Status</label>
                                <select name="is_active" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            @error('status')
                            <div class="text-danger mb-4">{{ $message }}</div>
                            @enderror

                            <div class="form-group">
                                <label>Height</label>
                                <input type="number" class="form-control" name="attributes[height]" placeholder="Height">
                            </div>

                            <div class="form-group">
                                <label>Width</label>
                                <input type="number" class="form-control" name="attributes[width]" placeholder="Width">
                            </div>

                            <div class="form-group">
                                <label>Material</label>
                                <input type="text" class="form-control" name="attributes[material]" placeholder="Material">
                            </div>

                            <div class="form-group">
                                <label>Brand</label>
                                <input type="text" class="form-control" name="attributes[brand]" placeholder="Brand">
                            </div>

                            @error('attributes')
                            <div class="text-danger mb-4">{{ $message }}</div>
                            @enderror


                            {{-- Фото --}}
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Add photo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                       name="images[]" multiple >
                                                <label class="custom-file-label" for="exampleInputFile">Choose image</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @error('images')
                                <div class="text-danger mb-4">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- /Фото --}}

                            <div class="col-md-2">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-block" value="Save">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
