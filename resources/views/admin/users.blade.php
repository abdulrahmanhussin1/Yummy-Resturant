@extends('admin.layout.app')
@section('content')
    <!-- form start -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Show Users Table </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
                        <li class="breadcrumb-item active">Show USers Table </li>
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
    <div class="container w-25"><a href="{{ url('dashboard/addUser') }}"><button
        class="btn btn-block btn-outline-primary btn-md">Add User</button></a>
</div>
    <div class="card">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body pb-0">
                    <div class="row">
                        @foreach ($users as $user)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    Role : {{ $user->role->name }}
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b>{{ $user->name }}</b></h2>
                                            <p class="text-muted text-sm"><b>User ID: </b>{{$user-> id}}</p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-envelope"></i></span>Email : {{ $user->email }}</li>
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-phone"></i></span> Phone #: {{ $user->phone }} </li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="{{ asset("storage/$user->image") }}"
                                                class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">


                                        <form action="{{ url("dashboard/users/$user->id") }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ url("dashboard/editUser/$user->id") }}"
                                                class="btn btn-sm btn-primary">Edit</a>
                                            {{-- <a href="#" class="btn btn-sm btn-primary">
                                                <i class="fas fa-user"></i> View Profile
                                            </a> --}}
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>

                                        </form>


                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        {{ $users->links() }}
    </div>
    <!-- /.card-footer -->
    </div>
    <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
