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
                    <h1 class="m-0">Book Table Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
                        <li class="breadcrumb-item active">Book Table Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container w-50">
        <form action="{{ url('dashboard/bookTable') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="name" name="name" class="form-control" id="exampleInputName1"
                        placeholder="Enter name"{{ old('name') }}>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        placeholder="Enter email"{{ old('email') }}>
                </div>
                <div class="form-group">
                    <label for="exampleInputPhone1">Phone</label>
                    <input type="phone" name="phone" class="form-control" id="exampleInputPhone1"
                        placeholder="Enter phone"{{ old('phone') }}>
                </div>
                <div class="form-group">
                    <label for="exampleInputDate1">Date</label>
                    <input type="date" name="date" class="form-control" id="exampleInputDate1"
                        min="{{ date('Y-m-d') }}"{{ old('date') }}>
                </div>
                <div class="form-group">
                    <label for="exampleInputTime1">Time</label>
                    <input type="time" name="time" class="form-control" id="exampleInputTime1"
                        min="{{ now() }}"{{ old('time') }}>
                </div>
                <div class="form-group">
                    <label for="exampleInputNumber1">Number of People</label>
                    <input type="number" name="people" class="form-control" id="exampleInputNumber1" min="1"
                        max="50" placeholder="Enter number of people"{{ old('people') }}>
                </div>
                <div class="form-group">
                    <label for="exampleInputMessage1">Message</label>
                    <textarea name="message" class="form-control" id="exampleInputMessage1" cols="30" rows="4"
                        placeholder="Enter your message">{{ old('message') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputTitle" hidden>User</label>
                    <input type="text" name="user_id" class="form-control" id="exampleInputTitle" value="{{ Auth::user()->id }}" hidden>
                </div>


                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Book Table</button>

        </form>
    </div>
@endsection
