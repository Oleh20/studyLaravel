@extends('Admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2 class="m-0">  Adding a user:</h2>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
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
                    <form  class="col-12" action="{{route('admin.user.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label >Name</label>
                            <input type="text" class="form-control col-4" name="name" placeholder="Enter name">
                            @error('name')
                            <div class="text-danger">Error, filed is necessary</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label >Email</label>
                            <input type="text" class="form-control col-4" name="email" placeholder="Enter name">
                            @error('email')
                            <div class="text-danger">Error, filed is necessary</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label >Password</label>
                            <input type="text" class="form-control col-4" name="password" placeholder="Enter name">
                            @error('password')
                            <div class="text-danger">Error, filed is necessary</div>
                            @enderror
                        </div>
                        <div class="form-group w-100">
                            <label>Select Role</label>
                            <select name="role"  class="form-control w-100 col-4">
                                @foreach($roles as $id => $role)
                                    <option value="{{$id}}"
                                        {{$id == old('role') ? 'selected' : ''}}>{{$role}}</option>
                                @endforeach
                            </select>
                            @error('role')
                            <div class="text-danger">Error, filed is necessary</div>
                            @enderror
                        </div>
                        <input  type="submit" class="btn btn-primary col-1" value="Add">
                    </form>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
