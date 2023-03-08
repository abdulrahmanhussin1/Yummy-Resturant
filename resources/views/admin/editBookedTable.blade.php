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
    <h1 class="m-0">Edit Book Table Page</h1>
    </div><!-- /.col -->
    <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
        <li class="breadcrumb-item active">Edit Book Table Page</li>
    </ol>
    </div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container w-50">
    <form action="{{ url("/dashboard/editBookedTable/$bookTable->id") }}" method="POST">
    @csrf
    @method('PUT')

    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="name" name="name" class="form-control" id="exampleInputName1" placeholder="Enter name" value="{{ $bookTable->name }}">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ $bookTable->email }}">
        </div>
        <div class="form-group">
            <label for="exampleInputPhone1">Phone</label>
            <input type="phone" name="phone" class="form-control" id="exampleInputPhone1" placeholder="Enter phone" value="{{ $bookTable->phone }}">
        </div>
        <div class="form-group">
            <label for="exampleInputDate1">Date</label>
            <input type="date" name="date" class="form-control" id="exampleInputDate1" min="{{date('Y-m-d')}}" value="{{ $bookTable->date }}">
        </div>
        <div class="form-group">
            <label for="exampleInputTime1">Time</label>
            <input type="time" name="time" class="form-control" id="exampleInputTime1" min="{{ now() }}" value="{{ $bookTable->time }}">
        </div>
        <div class="form-group">
            <label for="exampleInputNumber1">Number of People</label>
            <input type="number" name="people" class="form-control" id="exampleInputNumber1" min="1" max="50" placeholder="Enter number of people" value="{{ $bookTable->people }}">
        </div>
        <div class="form-group">
            <label for="exampleInputMessage1">Message</label>
            <textarea name="message" class="form-control" id="exampleInputMessage1" cols="30" rows="4" placeholder="Enter your message"> {{ $bookTable->message }}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputTitle" hidden>User</label>
            <input type="text" name="user_id" class="form-control" id="exampleInputTitle" value="{{ Auth::user()->id}}" hidden>
        </div>

      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-success">Edit Book Table</button>

    </form>
</div>
@endsection



