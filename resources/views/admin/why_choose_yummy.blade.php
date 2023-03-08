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
                    <h1 class="m-0">Why Choose Yummy Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ '/dashboard' }}">Home</a></li>
                        <li class="breadcrumb-item active">Why Choose Yummy Page</li>
                    </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->


              <form action="{{ url("dashboard/why_choose_yummy") }}" method="POST" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                @foreach ($wcys as $wcy )
                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleInputTitle">Title Card 1</label>
                        <input type="text" name="title1" class="form-control" id="exampleInputTitle" value="{{ $wcy->title1 }}">
                      </div>


                    <div class="form-group">
                        <label for="exampleInputTitle">Description Card 1</label>
                        <textarea  class="form-control" name="desc1" id="exampleInputDescription" cols="30" rows="5" >{{ $wcy->desc1 }}</textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputTitle">Title Card 2</label>
                        <input type="text" name="title2" class="form-control" id="exampleInputTitle" value="{{ $wcy->title2 }}">
                      </div>

                  <div class="form-group">
                    <label for="exampleInputTitle">Description Card 2</label>
                    <textarea  class="form-control" name="desc2" id="exampleInputDescription" cols="30" rows="5" >{{ $wcy->desc2 }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTitle">Title Card 3</label>
                    <input type="text" name="title3" class="form-control" id="exampleInputTitle" value="{{ $wcy->title3 }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTitle">Description Card 3</label>
                    <textarea  class="form-control" name="desc3" id="exampleInputDescription" cols="30" rows="5" >{{ $wcy->desc3  }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTitle">Title Card 4</label>
                    <input type="text" name="title4" class="form-control" id="exampleInputTitle" value="{{ $wcy->title4 }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTitle">Description Card 4</label>
                    <textarea  class="form-control" name="desc4" id="exampleInputDescription" cols="30" rows="5" >{{ $wcy->desc4 }}</textarea>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputTitle" hidden>User</label>
                    <input type="text" name="user_id" class="form-control" id="exampleInputTitle" value="{{ Auth::user()->id}}" hidden>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">update</button>
                </div>
              </form>

            <!-- /.card -->
<br><br><br>

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Title Card1</th>
                    <th>Description Card1</th>
                    <th>Title Car21</th>
                    <th>Description Card2</th>
                    <th>Title Card3</th>
                    <th>Description Card3</th>
                    <th>Title Card4</th>
                    <th>Description Card4</th>
                    <th>Updated by</th>
                  </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $wcy->title1 }}</td>
                <td>{{ $wcy->desc1 }}</td>

                <td>{{ $wcy->title2 }}</td>
                <td>{{ $wcy->desc2 }}</td>

                <td>{{ $wcy->title3 }}</td>
                <td>{{ $wcy->desc3 }}</td>

                <td>{{ $wcy->title4 }}</td>
                <td>{{ $wcy->desc4 }}</td>
                <td>{{ $wcy->user->name }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->

              @endforeach
  @endsection

\
