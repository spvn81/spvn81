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
            <h1>manage featured image and title</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">manage featured image and title</li>
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
                <h3 class="card-title">manage featured image and title</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data"  id="mannage_features_image_n_title_form_data">
                @csrf
                <div class="card-body">
                        <div class="row">

                          <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                  <label for="exampleInputFile">File input</label>
                                  <div class="input-group">
                                  <div class="custom-file">
                              <input type="file" class="custom-file-input" id="center_image" name="center_image">
                              <label class="custom-file-label" for="product_bg">Choose file</label>
                            </div>
                          </div>
                        </div>
                        <div id="banner_image_prew">
                        @if (!empty($center_image))
                        <img src="{{url('storage/media/'.$center_image)}}" width="150" >
                        <div id="center_image"></div>
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
                                <label for="menu">button name</label>
                                <input type="text" class="form-control" id="button_name" value="{{ $button_name }}" name="button_name"
                                placeholder="Enter button name">
                              </div>
                            </div>


                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="menu">link</label>
                                    <input type="text" class="form-control" id="link" value="{{ $link }}" name="link"
                                    placeholder="Enter link">
                                  </div>
                                </div>

                                <div class="col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <label for="menu">background color</label>
                                        <input type="color" class="form-control" id="bg_color" value="{{ $bg_color }}" name="bg_color">
                                      </div>
                                    </div>

                                    <div class="col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <label for="menu">background image</label>
                                            <input type="file" class="form-control" id="light_blue_image"  name="light_blue_image">
                                          </div>
                                        </div>


                                        <div id="light_blue_image">
                                            @if (!empty($light_blue_image))
                                            <img src="{{url('storage/media/'.$light_blue_image)}}" width="150" >
                                            <div id="center_image"></div>
                                            @endif
                                        </div>











                    <input type="hidden" value="{{ $id }}" name="id">

                </div>
                <div class="card-footer">
                    <button type="submit"  id="mannage_features_image_n_title_btn" class="btn btn-primary">Save</button>
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
