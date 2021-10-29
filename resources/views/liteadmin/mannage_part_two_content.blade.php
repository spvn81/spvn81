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
            <h1>manage part two content</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">manage part two content</li>
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
                <h3 class="card-title">manage part two content</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data"  id="mannage_part_two_content_form_data">
                @csrf
                <div class="card-body">
                        <div class="row">



                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="menu">main title id</label>

                            <select class="form-control" name="main_title_id">
                                <option value="">--Select--</option>
                                @foreach ($main_title_ids as $main_title_id)


                                @php
                                    if( $main_title_id->id == $main_title_id_check){
                                        $selected = "selected";

                                    }else {
                                        $selected = "";
                                }
                                @endphp

                                <option value="{{  $main_title_id->id }}" {{  $selected }}>{{  $main_title_id->main_title }}</option>
                                @endforeach

                            </select>
                          </div>
                    </div>




                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="menu">title</label>
                            <input type="text" class="form-control" id="ref_title" value="{{ $ref_title }}" name="ref_title"
                            placeholder="Enter title">
                          </div>
                        </div>




                          <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                  <label for="exampleInputFile">File input</label>
                                  <div class="input-group">
                                  <div class="custom-file">
                              <input type="file" class="custom-file-input" id="part_two_image" name="part_two_image">
                              <label class="custom-file-label" for="part_two_image">Choose file</label>
                            </div>
                          </div>
                        </div>
                        <div id="banner_image_prew">
                        @if (!empty($part_two_image))

                        <img src="{{url('storage/media/'.$part_two_image)}}" width="150" >
                        <div id="part_two_image"></div>
                        @endif
                    </div>

                      </div>

                      <div class="col-md-6 col-sm-12">
                      </div>
                      <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="menu">Alignment</label>
                            @php
                              $left=  '';
                              $right='';
                                if($alinement=='left'){
                                    $left = 'checked';
                                }
                                if($alinement=='right'){
                                    $right = 'checked';

                                }
                            @endphp
                            Left  : <input type="radio"  {{ $left }} id="alinement" value="left" name="alinement">
                            Right : <input type="radio"  {{  $right }} id="alinement" value="right" name="alinement">

                          </div>
                        </div>




                      <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="menu">description</label>
                         <textarea name="part_two_descreption" id="part_two_descreption">{{ $part_two_descreption }}</textarea>
                          </div>
                        </div>





                    <input type="hidden" value="{{ $id }}" name="id">

                </div>
                <div class="card-footer">
                    <button type="submit"  id="mannage_part_two_content_btn" class="btn btn-primary">Save</button>
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
