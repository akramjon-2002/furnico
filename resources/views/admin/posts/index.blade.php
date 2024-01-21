@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Posts</h1>
                    </div>
                    <div class="col-sm-6">
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
                    <div class="col-1 mb-3"><a href="{{route('backend.post.create')}}" class="btn btn-block btn-primary">Create</a>
                    </div>
                    <div class="col-12">

                    </div>
                </div>


                <div class="row">
                    <div class="col-8">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Photo</th>
                                        <th>Date</th>
                                        <th colspan="3" class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{$post->id}}</td>
                                            <td>{{$post->title}}</td>
                                            <td>{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 10) }}</td>

                                            <td>
                                                @if($post->photo_path)
                                                    <img src="{{ asset('storage/' . $post->photo_path) }}" alt="Post Image" style="max-width: 100px; max-height: 80px;">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{$post->created_at}}</td>
                                            <td><a href="{{ route('backend.post.show', $post->id) }}"><i
                                                        class="nav-icon fa-regular fa-eye"></i></a>
                                            <td><a href="{{ route('backend.post.edit', $post->id) }}"><i
                                                        class="nav-icon fa-solid fa-pen-fancy"></i></a>
                                            <td>
                                                <form action="{{ route('backend.post.delete', $post->id) }}"
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
