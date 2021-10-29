@extends('liteadmin.layout')
@section('pagetitle','Home Section one')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Home Section one</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Home Section one</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <section class="content">
    <div class="container-fluid">
    <div class="row">
          <!-- left column -->
    <div class="col-md-12">
    <div id="sucessdata"></div>


            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">



                <h3 class="card-title">Title</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="toppers_title_msg_submit" >
                @csrf
                <div class="card-body">
                        <div class="row">
                            <input type="hidden" name="id" value="{{  $id }}">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="menu">title</label>

                               <textarea name="title_toppers">{{ $title }}</textarea>
                              </div>
                                </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection
