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
              <form enctype="multipart/form-data"  id="mannage_features_form_data">
                @csrf
                <div class="card-body">
                        <div class="row">


                    <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label for="menu">part three kay title</label>

                    <select class="form-control" name="title_id">
                        <option value="">--Select--</option>
                        @foreach ($part_three_kay_titles as $part_three_kay_title)


                        @php
                            if( $part_three_kay_title->id == $title_id){
                                $selected = "selected";

                            }else {
                                $selected = "";
                        }
                        @endphp

                        <option value="{{  $part_three_kay_title->id }}" {{  $selected }}>{{  $part_three_kay_title->title }}</option>
                        @endforeach

                    </select>
                  </div>
            </div>
            <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="menu">kay feature</label>
                            <input type="text" class="form-control" id="kay_feature" value="{{ $kay_feature }}" name="kay_feature"
                            placeholder="Enter kay feature">
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="menu">Alignment</label>
                                @php
                                   $left ='';
                                        $right ='';
                                    if($alignment=='left'){
                                        $left = 'checked';
                                    }elseif ($alignment=='right') {
                                        $right = 'checked';
                                    }else{
                                        $left ='';
                                        $right ='';
                                    }
                                @endphp
                              Left:  <input type="radio"  id="alignment" value="left" {{$left}} name="alignment">
                              Right:  <input type="radio"  id="alignment" value="right" {{$right}} name="alignment">

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
