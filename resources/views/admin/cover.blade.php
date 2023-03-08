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
                    <h1 class="m-0">Cover Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
                        <li class="breadcrumb-item active">Cover Page</li>
                    </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

              <div class="container w-50">
              <form action="{{ url("dashboard/cover") }}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                @foreach ($covers as $cover )
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputTitle">Title</label>
                    <input type="text" name="title" class="form-control" id="exampleInputTitle" value="{{ $cover->title }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputDescription">Description</label>
                    <textarea  class="form-control" name="description" id="exampleInputDescription" cols="30" rows="5" >{{ $cover->description }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">Cover Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">{{ $cover->image }}</label>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputVideo">video</label>
                    <input type="text" name="video" class="form-control" id="exampleInputVideo" value="{{ $cover->video }}">
                </div>




                <div class="form-group">
                    <label for="exampleInputTitle" hidden>User</label>
                    <input type="text" name="user_id" class="form-control" id="exampleInputTitle" value="{{ Auth::user()->id}}" hidden>
                </div>
            </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
<br><br><br>

            <div class="card" >
                <div class="card-header">
                  <h3 class="card-title">Bordered Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Video</th>
                        <th>updated by</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $cover->title }}</td>
                        <td>{{ $cover->description }}</td>
                        <td> <img src="{{asset("storage/$cover->image") }}" width="100px" alt=""></td>
                        <td><iframe width="420" height="200"
                            src="{{ $cover->video }}">
                            </iframe></td>
                        <td>{{ $cover->user->name }}</td>
                      </tr>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

              @endforeach
  @endsection
