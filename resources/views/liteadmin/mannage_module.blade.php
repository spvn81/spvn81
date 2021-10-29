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
              <form enctype="multipart/form-data"  id="mannage_module_form_data">
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
                            <input type="text" class="form-control" id="title" value="{{ $title }}" name="title"
                            placeholder="Enter title">
                          </div>
                        </div>


                   

                        <div class="col-md-4 col-sm-12">
                          <div class="form-group">
                                <label for="exampleInputFile">home image</label>
                                <div class="input-group">
                                <div class="custom-file">
                            <input type="file" class="custom-file-input" id="home_img" name="home_img">
                            <label class="custom-file-label" for="home_img">Choose file</label>
                          </div>
                        </div>
                      </div>
                      <div id="banner_image_prew">
                      @if (!empty($home_img))
                      <img src="{{url('storage/media/'.$home_img)}}" width="150" >
                      <div id="home_img"></div>
                      @endif
                  </div>

                    </div>





                    
                    <div class="col-md-4 col-sm-12">
                      <div class="form-group">
                            <label for="exampleInputFile">main Image</label>
                            <div class="input-group">
                            <div class="custom-file">
                        <input type="file" class="custom-file-input" id="mudule_main_image" name="mudule_main_image">
                        <label class="custom-file-label" for="mudule_main_image">Choose file</label>
                      </div>
                    </div>
                  </div>
                  <div id="banner_image_prew">
                  @if (!empty($mudule_main_image))
                  <img src="{{url('storage/media/'.$mudule_main_image)}}" width="150" >
                  <div id="mudule_main_image"></div>
                  @endif
              </div>

                </div>





                
            <div class="col-md-12 col-sm-12">
              <div class="form-group">
                  <label for="menu">module description</label>
                  <textarea name="module_description"  id="module_description">{!! $module_description !!}</textarea>
                </div>
              </div>





                
              <div class="col-md-12 col-sm-12">
                <div class="form-group">
                    <label for="menu">module small description</label>
                    <textarea name="module_small_description" class="form-control" id="module_small_description">{!! $module_small_description !!}</textarea>
                  </div>
                </div>
  


                <div class="col-md-12 col-sm-12">
                  <div class="form-group">
                      <label for="menu">meta description</label>
                      <textarea name="meta_description" class="form-control" id="meta_description">{!! $meta_description !!}</textarea>
                    </div>
                  </div>


                  <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <label for="menu">meta tags</label>
                        <textarea name="meta_tags" class="form-control" id="meta_tags">{!! $meta_tags !!}</textarea>
                      </div>
                    </div>
      
    
  
                            @php
                            if ($show_in_home_page ==1) {
                                $checked = 'checked';
                            }else {
                              $checked = '';
                            }
                              
                            @endphp        
                    
                    <div class="col-md-4 col-sm-12">
                      <div class="form-group">
                          <label for="menu">show in homepage</label>
                          <input type="checkbox"   {{ $checked  }}  id="show_in_home_page" value="1" name="show_in_home_page">
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
