@extends('admin.layout.app')
@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Home Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
                            <li class="breadcrumb-item active">Home Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Default box -->

        <div class="card card-solid">
            <div class="card-body pb-0">
                <h3>New Book Table Orders</h3>
                <div class="row">
                    @foreach ($bookTables as $bookTable)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    <h4>{{ $bookTable->name }}</h4>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <p class="small"><span> <i class="fas fa-users"></i></span> Count of Guests
                                                :<b> {{ $bookTable->people }}</b></p>
                                            <p class="text-muted text-sm"><span class=><i class="fas fa-clock"></i></span>
                                                Date & time : <b>{{ $bookTable->date }} - {{ $bookTable->time }}</b></p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li ><span class="fa-li"><i
                                                            class="fas fa-comment"></i></span><b>Message:</b>{{ $bookTable->message }}
                                                </li>
                                                <li ><span class="fa-li"><i
                                                            class="fas fa-lg fa-phone"></i></span> Phone:
                                                    {{ $bookTable->phone }}
                                                </li>
                                                <br>
                                                <li class="small">
                                                    Created at :{{ $bookTable->created_at }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <form action="{{ url("dashboard/$bookTable->id") }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-success">Confirm</button>
                                            <a href="{{ '/dashboard/bookedTable' }}"
                                                class="btn btn-sm btn-primary">Details</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="float-right">{{ $bookTables->links() }}</div>

            </div>
        </div>


        <div class="col-md-6">
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-bullhorn"></i>
                  Messages
                </h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                @foreach ($messages as $message )
                <div class="callout callout-danger">
                  <h5>{{ $message->name }}</h5>
                  <h6>{{ $message->email }}</h6>
                  <p>{{ $message->subject}}</p>
                  <p>{{ $message->created_at}}</p>
                  <a class="text-right" href="{{ "/dashboard/messageDetails/$message->id"}}">see more</a>

                </div>
                @endforeach
                {{ $messages->links() }}
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
