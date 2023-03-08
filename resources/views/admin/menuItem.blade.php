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
                    <h1 class="m-0">Menu Items Page</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
                        <li class="breadcrumb-item active">Menu Items Page</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <div class="card">
        <div class="container w-50"><a href="{{ '/dashboard/addMenuItem' }}"><button
                    class="btn btn-block btn-outline-primary btn-lg">Add Item</button></a>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="float-right"> {{ $menuItems->links() }}</div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 10px">#</th>

                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>image</th>
                            <th>Added or last update by</th>
                            <th>Edite</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menuItems as $menuItem)
                            <tr class="text-center">

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $menuItem->name }}</td>
                                <td>{{ $menuItem->desc }}</td>
                                <td>{{ $menuItem->menu_categories->name }}</td>
                                <td>{{ $menuItem->price }}</td>
                                <td> <img src="{{ asset("storage/$menuItem->image") }}" width="100px" alt=""></td>
                                <td>{{ $menuItem->user->name }}</td>
                                <td>
                                    <a href="{{ url("dashboard/menuItem/edit-menuItem/$menuItem->id") }}"
                                        class="btn btn-block btn-outline-primary">Edit</a>
                                </td>
                                <td>
                                    <form action="{{ url("dashboard/menuItem/$menuItem->id") }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-block btn-outline-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection
