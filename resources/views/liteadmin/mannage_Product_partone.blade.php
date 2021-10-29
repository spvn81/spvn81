@extends('liteadmin.layout')
@section('pagetitle','Product part one')

<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product part one</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product part one</li>
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



                <h3 class="card-title">Product part one</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="mannage_part_one_data">
                @csrf
                <div class="card-body">
                        <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="menu">part one title</label>
                                <textarea name="part_one_title" id="part_one_title" >{!! $part_one_title !!}</textarea>
                              
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

                                        <label for="image_file">Image</label>
                                        <input type="file"  name="image_file"  class="form-control" >
                                      </div>



                                      <div class="form-group">
                                          @php
                                          $checked  = '';
                                          $lchecked ='';
                                          $rchecked ='';
                                              if($alignment=='left'){
                                                $lchecked = 'checked';
                                                }

                                                if($alignment=='right'){
                                                $rchecked = 'checked';
                                                }

                                          @endphp

                                        <label for="menu">alignment</label>
                                        left:   <input type="radio" value="left" {{$lchecked }}  name="alignment">
                                        right:  <input type="radio" value="right" {{$rchecked }}  name="alignment">

                                      </div>

                                      @if (!empty($product_image))
                                      <div id="image_id_of_home">
                                      <img src="{{ url('storage/media/'.$product_image) }}" width="150">

                                      <a class="btn btn-app bg-danger" onclick="delete_producct_section_image({{ $id }})">
                                        <i class="fas fa-trash"></i> Delete
                                      </a>
                                    </div>
                                      @endif
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                        <label for="menu">part one description</label>
                                        <textarea name="part_one_description" id="part_one_description">{{ $part_one_description }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                          <div class="form-group">
                                      <label for="menu">link display text</label>
                                
                                            <input type="text" name="link_display_text"  class="form-control" id="link_display_text" value="{{ $link_display_text }}" >
                                          </div>
                                      </div>


                                      <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                    <label for="menu">link</label>
                                    <input type="text" name="link"  placeholder="ex:- https://www.google.com" class="form-control" id="link" value="{{ $link }}" >
                                  </div>
                                    </div>





                                          <h2>SEO Part</h2>

                                        <div class="col-md-12 col-sm-12">
                                          <div class="form-group">
                                      <label for="menu">meta title</label>
                                      <textarea name="meta_title"  class="form-control" id="meta_title">{{ $meta_title }}</textarea>
                                          </div>
                                      </div>


                                
                                      <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                    <label for="menu">meta description</label>
                                    <textarea name="meta_description"  class="form-control" id="meta_description">{{ $meta_description }}</textarea>
                                        </div>
                                    </div>



                                    <div class="col-md-12 col-sm-12">
                                      <div class="form-group">
                                  <label for="menu">keywords</label>
                                  <textarea name="keywords"  class="form-control" id="keywords">{{ $keywords }}</textarea>
                                      </div>
                                  </div>


                                  <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                    <label for="menu">meta image</label>
                                      <input type="file" name="meta_image" class="form-control" >
                                      <img src="{{ url('storage/media/'.$meta_image) }}"  width="100px">
                                    </div>
                                </div>







                                        <input type="hidden" value="{{ $id }}" name="id">



                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="part_one_submit" class="btn btn-primary">Save</button>
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
