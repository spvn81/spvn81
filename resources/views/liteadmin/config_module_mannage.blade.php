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
              <form enctype="multipart/form-data"  id="config_module_mannage_form_data">
                @csrf
                <div class="card-body">
                        <div class="row">





                    <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label for="menu">Menu</label>

                    <select class="form-control" name="module_id">
                        <option value="">--Select--</option>
                        @foreach ($modules as $modules_data)


                        @php
                            if( $modules_data->id == $module_id){
                                $selected = "selected";

                            }else {
                                $selected = "";
                        }
                        @endphp

                        <option value="{{  $modules_data->id }}" {{  $selected }}>{{  $modules_data->title }}</option>
                        @endforeach

                    </select>
                  </div>
            </div>





                   


                
            <div class="col-md-12 col-sm-12">
              <div class="form-group">
                  <label for="menu">Module Feature</label>
           
                  <input  class="form-control" type="text" value="{!! $feature !!}" id="feature" name="feature">
                </div>
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
