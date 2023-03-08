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
                    <h1 class="m-0">Contact Details Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
                        <li class="breadcrumb-item active">Contact Details Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- form start -->
    <div class="container w-50">
        <form action="{{ url('dashboard/contact') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @foreach ($contacts as $contact)
                <div class="card-body">


                    <div class="form-group">
                        <label for="exampleInputMap1">Map</label>
                        <input type="text" name="map" class="form-control" id="exampleInputMap1"
                            value="{{ $contact->map }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAddress1">Address</label>
                        <input type="text" name="address" class="form-control" id="exampleInputAddress1"
                            value="{{ $contact->address }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            value="{{ $contact->email }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhone1">Phone</label>
                        <input type="text" name="phone" class="form-control" id="exampleInputPhone1"
                            value="{{ $contact->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPhone1">Hours</label>
                        <input type="text" name="hours" class="form-control" id="exampleInputPhone1"
                            value="{{ $contact->hours }}">
                    </div>
            @endforeach
            <div class="form-group">
                <label for="exampleInputTitle" hidden>User</label>
                <input type="text" name="user_id" class="form-control" id="exampleInputTitle"
                    value="{{ Auth::user()->id }}" hidden>
            </div>
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
                        <th>Map</th>
                        <th>address</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>hours</th>
                        <th>updated by</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><iframe style="border:0; width: 100%; height: 350px;" src="{{ $contact->map }}"
                                    width="100px" frameborder="0" allowfullscreen></iframe></td>
                            <td>{{ $contact->address }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->hours }}</td>
                            <td>{{ $contact->user->name }}</td>
                        </tr>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
