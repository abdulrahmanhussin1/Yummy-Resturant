@extends('admin.layout.app')
@section('content')
    <!-- form start -->
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0">Show Booked Table </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
                    <li class="breadcrumb-item active">Show Booked Table </li>
                </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card" >
    <div class="container w-50"><a href="{{ '/dashboard/addBookTable' }}"><button
        class="btn btn-block btn-outline-primary btn-lg">Add Book Table</button></a>
</div>    <div class="card-body">
        <div class="float-right">{{ $bookTable->links() }}</div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>

                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>No. People</th>
                    <th>Message</th>
                    <th>added or last updated by</th>
                    <th>Confirm</th>
                    <th>Edite</th>
                    <th>Delete</th>
                    <th>Booked at</th>

                </tr>
            </thead>
            <tbody>
                    @foreach ($bookTable as $book )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->email }}</td>
                    <td>{{ $book->phone }}</td>
                    <td>{{ $book->date }}</td>
                    <td>{{ $book->time }}</td>
                    <td>{{ $book->people }}</td>
                    <td>{{ $book->message }}</td>
                    <td>@if($book->user_id){{$book->user_id}}@else{{ 'Guest' }}@endif</td>
                    <td>
                        <form action="{{ url("dashboard/confirmedBookTable/$book->id") }}" method="POST" >
                            @csrf
                        <button type="submit" class="btn btn-sm btn-success">Confirm</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ url("dashboard/editBookedTable/$book->id") }}" class=""><button type="button" class="btn btn-sm btn-primary">Edit</button></a>
                    </td>
                    <td>
                        <form action="{{ url("dashboard/BookedTable/$book->id") }}" method="POST">
                            @csrf
                            @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                    <td>{{ $book->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection



