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
    <h1 class="m-0">Gallery Page</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
        <li class="breadcrumb-item active">Gallery Page</li>
    </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<div class="container w-50">
    <form action="{{ url("dashboard/gallery") }}" method="POST" enctype="multipart/form-data" >
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputFile">Photo</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile"></label>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputTitle" hidden>User</label>
        <input type="text" name="user_id" class="form-control" id="exampleInputTitle" value="{{ Auth::user()->id}}" hidden>
    </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-success">Upload</button>
      </div>
    </form>
  </div>




<div class="col-12">
    <div class="card card-primary">
      <div class="card-header">
        <h4 class="card-title">Gallery</h4>
      </div>
      <div class="card-body">
        <div class="row">

            @foreach ($galleries as $gallery )
          <div class="col-sm-2" >
            <a href="{{ asset("storage/$gallery->image") }}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
              <img src="{{ asset("storage/$gallery->image") }}" class="img-fluid mb-2" alt="white sample "/>
              <p><strong>Added by:</strong>{{ $gallery->user->name }}</p>
            </a>
            <form action="{{ url("dashboard/gallery/$gallery->id") }}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('delete')
            <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </div>
          @endforeach

          </div>
        </div>
      </div>
    </div>


@endsection
