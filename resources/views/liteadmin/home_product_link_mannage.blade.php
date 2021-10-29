@extends('liteadmin.layout')
@section('pagetitle','Home Section one')

@section('home-link','active')

<meta name="csrf-token" content="{{ csrf_token() }}" />


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



                <h3 class="card-title">Home Section one</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="home_product_link_mannage_form_data">
                @csrf
                <div class="card-body">
                        <div class="row">


                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">

                                <label for="menu">title</label>
                                <input type="text"  name="title"  value="{{ $title }}"  class="form-control" >
                              </div>
                                </div>


                                
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">

                                <label for="menu">external link</label>
                                <input type="text"  name="external_link"  placeholder="ex:-https://www.google.com" value="{{ $external_link }}"  class="form-control" >
                              </div>
                                </div>


                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">

                                        <label for="menu">Image</label>
                                        <input type="file"  name="product_iamge"  class="form-control" >
                                      </div>

                                      @if (!empty($product_iamge))
                                      <div id="image_id_of_home">
                                      <img src="{{ url('storage/media/'.$product_iamge) }}" width="150">

                                      <a class="btn btn-app bg-danger" onclick="home_product_link_image({{ $id }})">
                                        <i class="fas fa-trash"></i> Delete
                                      </a>
                                    </div>
                                      @endif
                                        </div>

                                        






                                   


                                        <input type="hidden" value="{{ $id }}" name="id">



                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="homesectionone_submit" class="btn btn-primary">Save</button>
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
