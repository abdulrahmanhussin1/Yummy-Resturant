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


        <!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
    <div class="col-sm-6">
    <h1 class="m-0">Edit Chefs Page</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
        <li class="breadcrumb-item active">Edit Chefs Page</li>
    </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


    <!-- form start -->

<div class="container w-50">
    <form action="{{ url("dashboard/chefs/edit-chefs/$chefs->id") }}" method="POST" enctype="multipart/form-data" >
        @csrf
        @method('PUT')
<div class="card-body">

    <div class="form-group">
        <label for="exampleInputTitle">Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputTitle"  value="{{ $chefs->name }}">
      </div>
      <div class="form-group">
        <label for="exampleInputTitle">Title</label>
        <input type="text" name="title" class="form-control" id="exampleInputTitle" value="{{ $chefs->title }}">
      </div>
    <div class="form-group">
        <label for="exampleInputDescription">Description</label>
        <textarea  class="form-control" name="desc" id="exampleInputDescription" cols="30" rows="5" >{{ $chefs->desc }}</textarea>
    </div>

    <div class="form-group">
        <label for="exampleInputFile">About Photo</label>
        <div class="input-group">
        <div class="custom-file">
            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">{{ $chefs->image }}</label>
        </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputTitle" hidden>User</label>
        <input type="text" name="user_id" class="form-control" id="exampleInputTitle" value="{{ Auth::user()->id}}" hidden>
    </div>



        <div class="form-group"><img src="{{asset("storage/$chefs->image") }}" width="100px" alt=""></div>
    <div class="card-footer">
    <button type="submit" class="btn btn-success">update</button>
    </div>
</form>

</div>
@endsection
