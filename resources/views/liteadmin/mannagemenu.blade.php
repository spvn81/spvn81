@extends('liteadmin.layout')
@section('pagetitle','manage menu')



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



                <h3 class="card-title">Manage Menu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data" action="{{ route('mannagemenuorm') }}" id="mannage_menu_form_data">
                @csrf
                <div class="card-body">
                        <div class="row">
                    <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label for="menu">Menu</label>
                    <input type="text" class="form-control" id="menu" value="{{ $menu }}" name="menu" placeholder="Enter menu">
                  </div>


                  <div id="menuerr"></div>

                    </div>
                    <input type="hidden" class="form-control" id="menu_id" value="{{ $id }}" name="menu_id"">


                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="menu">menu slug</label>
                            <input type="text" class="form-control" id="menu_slug" name="menu_slug"
                            value="{{ $menu_slug }}"
                            placeholder="Enter menu slug">
                          </div>
                          <div id="menu_slugerr"></div>


                            </div>



                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="menu Parent">menu Parent</label>
                                        <select name="menu_parent_id" class="form-control">
                                            <option value="">Main menu</option>
                                            @foreach ($menu_parent as $parrent )
                                                @if ($menu_parent_id==$parrent->id)
                                                <option  selected value="{{  $parrent->id }}">{{  $parrent->menu }}</option>
                                                @else
                                                <option value="{{  $parrent->id }}">{{  $parrent->menu }}</option>

                                                @endif
                                            @endforeach




                                        </select>
                                      </div>
                                    </div>

                   <div class="col-md-4 col-sm-12">
                      <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                            <div class="custom-file">
                        <input type="file" class="custom-file-input" id="menu_image" name="menu_image">
                        <label class="custom-file-label" for="menu_image">Choose file</label>
                      </div>
                    </div>
                  </div>
                  @if (!empty($menu_image))

                  <img src="{{url('storage/media/'.$menu_image)}}" width="150px" >
                  <div id="errorval_menu_image"></div>
                  @endif

                </div>


                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="menu">Menu Type</label>
                        @php
                            $menu_type_arr  = array(
                               'Pages'=> 'pages',
                                'Image gallery'=>'image_gallery',
                              'Video gallery' => 'video_gallery',
                              'Contact' => 'contact',
                               'events' => 'events',
                              'product' => 'product',
                              'Modules' => 'modules',
                              'News/Blog' => 'news',
                            'Other'=>'other'
                            );

                        @endphp



                        @if (empty($menu_type))
                        @foreach ($menu_type_arr as $key => $menu_type_inarr )

                        <input  type="radio"  value="{{$menu_type_inarr}}" id="{{$menu_type_inarr}}" name="menu_type" >
                        {{ $key }}
                        @endforeach

                        @else

                        @foreach ($menu_type_arr as $key => $menu_type_inarr )

                        @if ($menu_type==$menu_type_inarr)
                        <input  checked type="radio"  value="{{$menu_type}}" id="{{$menu_type}}" name="menu_type" >
                        {{ $key }}

                        @else
                        <input  type="radio"  value="{{$menu_type_inarr}}" id="{{$menu_type_inarr}}" name="menu_type" >
                        {{ $key }}
                    @endif

                        @endforeach




                        @endif



                            </div>
                            <div id="menutypeerr"></div>

                        </div>


                        @php
                            if($is_home_page ==0){
                                $checked = "";
                            }else{
                                $checked = 'checked';

                            }
                        @endphp

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">

                                <label for="menu">show home page </label>
                                <input type="checkbox"  {{  $checked }} id="is_home_page" value="1"  name="is_home_page">
                              </div>
                                </div>



                                @php
                                if($dont_show_in_nav_bar ==0){
                                    $checked = "";
                                }else{
                                    $checked = 'checked';

                                }
                            @endphp

                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">

                                    <label for="menu">dont show in nav bar </label>
                                    <input type="checkbox"  {{  $checked }} id="dont_show_in_nav_bar" value="1"  name="dont_show_in_nav_bar">
                                  </div>
                                    </div>






                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="mannage_menu" class="btn btn-primary">Save</button>
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
