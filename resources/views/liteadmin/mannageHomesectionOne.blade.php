@extends('liteadmin.layout')
@section('pagetitle','Home Section one')

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
              <form id="mannage_home_data_section_one">
                @csrf
                <div class="card-body">
                        <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">

                                <label for="menu">title</label>
                                <input type="text"  name="title_of_home_section"  value="{{ $title }}"  class="form-control" >
                              </div>
                                </div>





                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">

                                        <label for="menu">menu</label>
                                        <select name="menu_id" class="form-control">
                                            <option value="">-select-</option>
                                            @foreach ($menu as $menu_data )

                                            @php
                                                if($menu_id==$menu_data->id){
                                                    $selcted = "selected";
                                                }else {
                                                    $selcted = '';
                                                }
                                            @endphp

                                            <option value="{{ $menu_data->id }}" {{ $selcted }}>{{ $menu_data->menu }}</option>
                                            @endforeach

                                        </select>
                                      </div>
                                        </div>



                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">

                                        <label for="menu">Image</label>
                                        <input type="file"  name="background_img"  class="form-control" >
                                      </div>

                                      @if (!empty($background_img))
                                      <div id="image_id_of_home">
                                      <img src="{{ url('storage/media/'.$background_img) }}" width="150">

                                      <a class="btn btn-app bg-danger" onclick="delete_home_section_image({{ $id }})">
                                        <i class="fas fa-trash"></i> Delete
                                      </a>
                                    </div>
                                      @endif
                                        </div>









                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">

                                                <label for="menu">Alignment</label>

                                                @if ($align=='left')
                                                left:<input type="radio"  name="align" value="left" checked>
                                                right:<input type="radio"  name="align" value="right" >

                                                @elseif ($align=='right')
                                                left:<input type="radio"  name="align" value="left" >
                                                right:<input type="radio"  name="align" value="right" checked >
                                                    @else
                                                    left:<input type="radio"  name="align" value="left" >
                                                    right:<input type="radio"  name="align" value="right"  >

                                                @endif

                                              </div>
                                                </div>

                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">

                                                        <label for="menu">Brand Image</label>
                                                        <input type="file"  name="brand_image"  class="form-control" >
                                                      </div>

                                                      @if (!empty($brand_image))
                                                      <div id="image_id_of_brabd">
                                                      <img src="{{ url('storage/media/'.$brand_image) }}" width="150">

                                                      <a class="btn btn-app bg-danger" onclick="delete_home_section_image_brand({{ $id }})">
                                                        <i class="fas fa-trash"></i> Delete
                                                      </a>
                                                    </div>
                                                      @endif
                                                        </div>



                                                @php
                                                    if($ab==1){
                                                        $checked = "checked";
                                                    }else {
                                                        $checked = "";
                                                    }
                                                @endphp

                                                <div class="col-md-12 col-sm-12">
                                                    <div class="form-group">

                                                        <label for="ab">Add after section one</label>
                                                        <input type="checkbox"  {{$checked}}  name="ab" value="1">
                                                      </div>
                                                        </div>


                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="form-group">

                                                                @php
                                                                if($is_msg_box==1){
                                                                    $checkedmsg = "checked";
                                                                }else {
                                                                    $checkedmsg = "";
                                                                }
                                                            @endphp


                                                                <label for="ab">Add as message</label>
                                                                <input type="checkbox"  {{$checkedmsg}}  name="is_msg_box" value="1">
                                                              </div>
                                                                </div>



                                                                <div class="col-md-12 col-sm-12">
                                                                    <div class="form-group">

                                                                        @php
                                                                        if($is_samll_smg_box==1){
                                                                            $is_samll_smg_box_checked = "checked";
                                                                        }else {
                                                                            $is_samll_smg_box_checked = "";
                                                                        }
                                                                    @endphp


                                                                        <label for="ab">Add in small  message box</label>
                                                                        <input type="checkbox"  {{$is_samll_smg_box_checked}}  name="is_samll_smg_box" value="1">
                                                                      </div>
                                                                        </div>









                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                        <label for="menu">Descreption</label>
                                        <textarea name="homesectionone" id="homesectionone">{{ $content }}</textarea>
                                            </div>
                                        </div>




                                        <input type="hidden" value="{{ $id }}" name="section_one_id">



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
