@extends('liteadmin.layout')
@section('pagetitle', 'manage banner')



@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage banner</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Manage banner</li>
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
                                <h3 class="card-title">Manage banner</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form enctype="multipart/form-data" action="{{ route('mannagebanners') }}"
                                id="mannage_banners_form_data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="exampleInputFile">banner front image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="background_img"
                                                            name="background_img">
                                                        <label class="custom-file-label" for="background_img">Choose
                                                            file</label>

                                                    </div>

                                                </div>

                                            </div>

                                            <div id="background_img_prwe">

                                                @if (!empty($background_img))

                                                    <img src="{{ url('storage/media/' . $background_img) }}" width="150">
                                                    <div id="background_img"></div>
                                                @endif

                                            </div>
                                        </div>



                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="exampleInputFile">banner image</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="banner_image"
                                                            name="banner_image">
                                                        <label class="custom-file-label" for="banner_image">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="banner_image_prew">
                                                @if (!empty($banner_image))

                                                    <img src="{{ url('storage/media/' . $banner_image) }}" width="150">
                                                    <div id="banner_image"></div>
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
                                                            if ($menudata->id == $menu_id) {
                                                                $selected = 'selected';
                                                            } else {
                                                                $selected = '';
                                                            }
                                                        @endphp

                                                        <option value="{{ $menudata->id }}" {{ $selected }}>
                                                            {{ $menudata->menu }}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="menu">Alt Name</label>
                                                <input type="text" class="form-control" id="alt"
                                                    value="{{ $alt }}" name="alt" placeholder="Enter Alt name">
                                            </div>
                                        </div>


                                        <div class="col-md-12 col-sm-12">
                                          <div class="form-group">
                                              <label for="menu">Description</label>
                                              <textarea name="banner_image_description" id="banner_image_description">{!! $banner_image_description !!}</textarea>
                                            
                                          </div>
                                      </div>




                                        <input type="hidden" value="{{ $banner_id }}" name="banner_id">

                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" id="mannage_baenrs" class="btn btn-primary">Save</button>
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
