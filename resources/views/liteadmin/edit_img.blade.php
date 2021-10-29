@extends('liteadmin.layout')
@section('pagetitle','manage menu')
<meta name="csrf-token" content="{{ csrf_token() }}" />



@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Menu</li>
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
            <h3 class="card-title">Edit Image</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data"  >
                @csrf
                <div class="card-body">
                        <div class="row">

                   <div class="col-md-6 col-sm-12">

                  <div class="dropzone dropzone-previews" id="my-awesome-dropzoneimg"></div>

                </div>
                <input type="hidden"


                <div class="col-md-6 col-sm-12">
                    <div class="form-group">

                            <img src="{{url('storage/media/'.$editimg[0]->file_name) }}" width="100" id="{{ $editimg[0]->id }}">


                </div>
              </div>




                    </div>
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
