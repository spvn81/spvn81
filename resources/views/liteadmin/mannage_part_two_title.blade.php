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
            <h1>mannage part two title</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">mannage part two title</li>
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
                <h3 class="card-title">mannage part two title</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data"  id="mannage_part_two_title_form_data">
                @csrf
                <div class="card-body">
                        <div class="row">



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
                            <input type="text" class="form-control" id="main_title" value="{{ $main_title }}" name="main_title"
                            placeholder="Enter title">
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="menu">Background color</label>
                                <input type="color" class="form-control" id="bg_color" value="{{ $bg_color }}" name="bg_color">
                              </div>
                            </div>


                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="menu">Top image</label>
                                    <input type="file" class="form-control" id="part_two_top_image"  name="part_two_top_image">
                                  </div>
                                </div>
                                @if (!empty($part_two_top_image))

                                <img src="{{ url('storage/media/'.$part_two_top_image) }}" width="250px">

                                @endif


                    <input type="hidden" value="{{ $id }}" name="id">

                </div>
                <div class="card-footer">
                    <button type="submit"  id="mannage_part_two_title_btn" class="btn btn-primary">Save</button>
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
