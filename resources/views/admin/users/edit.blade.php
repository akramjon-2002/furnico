@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit user</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('backend.home')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{route('backend.user.index')}}">Users</a></li>
                            <li class="breadcrumb-item active">Edit user</li>

                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <form action="{{ route('backend.user.update', $user->id) }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" name="role" id="role">
                                @foreach($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>


                </div>
            </div>
        </section>
    </div>
@endsection
