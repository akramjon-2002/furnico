@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Products</h1>
                    </div>
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('backend.home')}}">Home</a></li>
                            <li class="breadcrumb-item active">posts</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-1 mb-3"><a href="{{route('backend.product.create')}}"
                                               class="btn btn-block btn-primary">Create</a>
                    </div>
                    <div class="col-12">

                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Attributes</th>
                                        <th>Photos</th>
                                        <th>Date</th>
                                        <th colspan="3" class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{ optional($product->category)->name }}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->description}}</td>
                                            <td>{{$product->stock_quantity}}</td>
                                            <td>
                                                @if($product->status == 1)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>

                                            <td>

                                                @if (is_array($product->attributes))
                                                    @foreach ($product->attributes as $key => $value)
                                                        <p>{{ $key }}: {{ $value }}</p>
                                                    @endforeach
                                                @else
                                                    <p>Invalid attributes format</p>
                                                @endif
                                            </td>


                                            <td>
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
                                                    No Image
                                                @endif
                                            </td>



                                            <td>{{$product->created_at}}</td>
                                            <td><a href="{{ route('backend.product.show', $product->id) }}"><i
                                                        class="nav-icon fa-regular fa-eye"></i></a>
                                            <td><a href="{{ route('backend.product.edit', $product->id) }}"><i
                                                        class="nav-icon fa-solid fa-pen-fancy"></i></a>
                                            <td>
                                                <form action="{{ route('backend.product.delete', $product->id) }}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        <i class="text-danger fa-solid fa-trash-can" role="button"></i>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>


            </div>
        </section>
    </div>
@endsection
