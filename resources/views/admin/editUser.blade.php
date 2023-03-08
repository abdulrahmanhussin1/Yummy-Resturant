@extends('admin.layout.app')


@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

    <!-- form start -->
        <!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
    <div class="col-sm-6">
    <h1 class="m-0">Edit User Page</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
        <li class="breadcrumb-item active">Edit User Page</li>
    </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container w-50">
    <form action="{{ url("dashboard/editUser/$user->id") }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Enter name" value="{{ $user->name }}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ $user->email }}" disabled>
        </div>
        {{--<div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password" >
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="Enter password" >
        </div> --}}
        <div class="form-group">
            <label for="exampleInputPhone1">Phone</label>
            <input type="text" name="phone" class="form-control" id="exampleInputPhone1"
                placeholder="Enter your Phone Number" value=" {{ $user->phone }}">
        </div>
        <div class="form-group">
            <label for="exampleInputDescription">Role</label>
            <select class="form-control select2" name="role_id" style="width: 100%;">
                <option value="{{ $user->role->id}}" selected="selected"> {{ $user->role->name }}</option>
                @foreach ($roles as $role )
                {
                    <option value="{{ $role->id}}" > {{ $role->name }}</option>
                }
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputTitle" hidden>User</label>
            <input type="text" name="user_id" class="form-control" id="exampleInputTitle" value="{{ Auth::user()->id}}" hidden>
        </div>

        <div class="form-group">
            <label for="exampleInputFile">User Photo</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">{{ $user->image }}</label>
                    </div>
                </div>
        </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Edit User</button>
      </div>
    </form>
</div>
</div>
@endsection



