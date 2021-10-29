@extends('liteadmin.layout')
@section('pagetitle','manage banner')



@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage product banner</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage product banner</li>
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
                <h3 class="card-title">Manage product banner</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data"  id="mannage_product_banners_form_data">
                @csrf
                <div class="card-body">
                        <div class="row">




                          <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                  <label for="exampleInputFile">File input</label>
                                  <div class="input-group">
                                  <div class="custom-file">
                              <input type="file" class="custom-file-input" id="product_bg" name="product_bg">
                              <label class="custom-file-label" for="product_bg">Choose file</label>
                            </div>
                          </div>
                        </div>
                        <div id="banner_image_prew">
                        @if (!empty($product_bg))

                        <img src="{{url('storage/media/'.$product_bg)}}" width="150" >
                        <div id="product_bg"></div>
                        @endif
                    </div>

                      </div>



                    <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label for="menu">Menu</label>

                    <select class="form-control" name="menu_id">
                        <option value="">--Select--</option>
                        @foreach ($menu as $menudata)


                        @php
                            if( $menudata->id == $menu_id){
                                $selected = "selected";

                            }else {
                                $selected = "";
                        }
                        @endphp

                        <option value="{{  $menudata->id }}" {{  $selected }}>{{  $menudata->menu }}</option>
                        @endforeach

                    </select>
                  </div>
            </div>

            <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="menu">title</label>
                            <input type="text" class="form-control" id="title" value="{{ $title }}" name="title"
                            placeholder="Enter title">
                          </div>
                        </div>



                        <div class="col-md-4 col-sm-12">
                          <div class="form-group">
                              <label for="menu">title</label>
                              <input type="color" class="form-control" id="product_bg_color" value="{{ $product_bg_color }}" name="product_bg_color"
                              >
                            </div>
                          </div>



                    <input type="hidden" value="{{ $id }}" name="id">

                </div>
                <div class="card-footer">
                    <button type="submit"  id="mannage_product_banners_form_data_btn" class="btn btn-primary">Save</button>
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
