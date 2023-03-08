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
    <h1 class="m-0">Testimonials Page</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
        <li class="breadcrumb-item active">Testimonials Page</li>
    </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container w-50">
<form action="{{ url("dashboard/testimonials") }}" method="POST" enctype="multipart/form-data" >
@csrf
<div class="card-body">



    <div class="form-group">
        <label for="exampleInputTitle">Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputTitle"  value="{{ old('name') }}">
      </div>
      <div class="form-group">
        <label for="exampleInputTitle">Title</label>
        <input type="text" name="title" class="form-control" id="exampleInputTitle" value="{{ old('title') }}">
      </div>
    <div class="form-group">
        <label for="exampleInputDescription">Description</label>
        <textarea  class="form-control" name="review" id="exampleInputDescription" cols="30" rows="5" >{{ old('reviw') }}</textarea>
    </div>

    <div class="form-group">
        <label for="exampleInputFile">About Photo</label>
        <div class="input-group">
        <div class="custom-file">
            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
            <label class="custom-file-label" for="exampleInputFile">{{ old('image') }}</label>
        </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputTitle" hidden>User</label>
        <input type="text" name="user_id" class="form-control" id="exampleInputTitle" value="{{ Auth::user()->id}}" hidden>
    </div>
<div class="card-footer">
  <button type="submit" class="btn btn-success">Add review</button>
</div>
</div>
</form>
</div>
<!-- /.card -->
<br><br><br>

<div class="card" >
<!-- /.card-header -->
<div class="card-body">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="width: 10px">#</th>
        <th>Name</th>
        <th>Title</th>
        <th>review</th>
        <th>image</th>
        <th>Added or last update by </th>
        <th>Edite</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($testimonials as $testimonial )
      <tr>

        <td>{{ $loop->iteration }}</td>
        <td>{{ $testimonial->name }}</td>
        <td>{{ $testimonial->title }}</td>
        <td>{{ $testimonial->review }}</td>
        <td> <img src="{{asset("storage/$testimonial->image") }}" width="100px" alt=""></td>
        <td>{{ $testimonial->user->name }}</td>
        <td>
            <a href="{{ url("dashboard/testimonials/edit-testimonials/$testimonial->id") }}" class="btn btn-sm btn-primary">Edit</a>
        </td>
        <td>
            <form action="{{ url("dashboard/testimonials/$testimonial->id") }}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection
