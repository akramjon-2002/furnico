@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create user</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('user.index')}}">Users</a></li>
                            <li class="breadcrumb-item active">Create user</li>

                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <form action="{{@route('admin.user.store')}}" method="post" class="col-4">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>

                                <input type="text" class="form-control" name="name" placeholder=" name">
                        </div>
                        @error('name')
                        <div class="text-danger mb-4" >{{$message}}</div>
                        @enderror

                        <div class="form-group">
                            <label>Email</label>

                            <input type="email" class="form-control" name="email" placeholder="email">
                        </div>
                        @error('email')
                        <div class="text-danger mb-4" >{{$message}}</div>
                        @enderror



                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Role</label>
                                <select class="form-control" name="role"  data-placeholder="Select role" >
                                    @foreach($roles as $id => $role)
                                        <option  {{ $id == old('role') ? 'selected' : "" }}  value="{{$id}}">{{$role}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <input type="submit" class="btn btn-primary" value="Save">
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
