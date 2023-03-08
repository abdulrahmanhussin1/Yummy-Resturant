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
                    <h1 class="m-0">About Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
                        <li class="breadcrumb-item active">About Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- form start -->
    <div class="container w-50">
        <form action="{{ url('dashboard/about') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                @foreach ($abouts as $about)
                    <div class="form-group">
                        <label for="exampleInputTitle">Title</label>
                        <input type="text" name="title" class="form-control" id="exampleInputTitle"
                            value="{{ $about->title }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputDescription">Description</label>
                        <textarea class="form-control" name="desc" id="exampleInputDescription" cols="30" rows="5">{{ $about->desc }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">About Photo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">{{ $about->image }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Background Photo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="background_image" class="custom-file-input"
                                    id="exampleInputFile">
                                <label class="custom-file-label"
                                    for="exampleInputFile">{{ $about->background_image }}</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputVideo">video</label>
                        <input type="text" name="video" class="form-control" id="exampleInputVideo"
                            value="{{ $about->video }}">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputTitle">Contact</label>
                        <input type="text" name="contact" class="form-control" id="exampleInputTitle"
                            value="{{ $about->contact }}">
                    </div>


                    <div class="form-group">
                        <label for="exampleInputTitle">Phone</label>
                        <input type="text" name="phone" class="form-control" id="exampleInputTitle"
                            value="{{ $about->phone }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputTitle" hidden>User</label>
                        <input type="text" name="user_id" class="form-control" id="exampleInputTitle"
                            value="{{ Auth::user()->id }}" hidden>
                    </div>
                @endforeach

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">update</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
    <br><br><br>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bordered Table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>title</th>
                        <th>Description</th>
                        <th>Contact</th>
                        <th>Phone</th>
                        <th>Image</th>
                        <th>Background Image</th>
                        <th>Video</th>
                        <th>Edited by</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($abouts as $about)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $about->title }}</td>
                            <td>{{ $about->desc }}</td>
                            <td>{{ $about->contact }}</td>
                            <td>{{ $about->phone }}</td>
                            <td> <img src="{{ asset("storage/$about->image") }}" width="100px" alt=""></td>
                            <td> <img src="{{ asset("storage/$about->background_image") }}" width="100px" alt="">
                            </td>
                            <td><iframe src="{{ $about->video }}" frameborder="0"></iframe></td>
                            <td>{{ $about->user->name }}</td>
                        </tr>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
