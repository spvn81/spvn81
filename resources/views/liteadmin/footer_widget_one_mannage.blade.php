@extends('liteadmin.layout')
@section('pagetitle', 'footer widget one mannage')

@section('home-link', 'active')

<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>footer widget one mannage</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">footer widget one mannage</li>
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

                                <h3 class="card-title">footer widget one mannage</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="footer_widget_one_mannage_form_data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">


                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">

                                                <label for="menu">bg image</label>
                                                <input type="file" name="bg_image" class="form-control">

                                          

                                                 @if (!empty($bg_image))
                                                 <div id="image_id_of_home">
                                                 <img src="{{ url('storage/media/'.$bg_image) }}" width="150">
           
                                                 <a class="btn btn-app bg-danger" onclick="home_product_link_image({{ $id }})">
                                                   <i class="fas fa-trash"></i> Delete
                                                 </a>
                                               </div>
                                                 @endif



                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-12">

                                            <h1> OR </h1>
                                        </div>



                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">

                                                <label for="menu">bg link</label>
                                                <input type="text" name="bg_link" value="{{ $bg_link }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12">
                                            <div class="form-group">

                                                <label for="menu">bg color</label>
                                                <input type="color" name="bg_color" value="{{ $bg_color }}"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">

                                                <label for="menu">bg gradient color one</label>
                                                <input type="color" name="bg_gradient_color_one"
                                                    value="{{ $bg_gradient_color_one }}" class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">

                                                <label for="menu">bg gradient color two</label>
                                                <input type="color" name="bg_gradient_color_two"
                                                    value="{{ $bg_gradient_color_two }}" class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">

                                                <label for="menu">main title</label>
                                                <textarea name="main_title" class="form-control">{!! $main_title !!}</textarea>
                                            </div>
                                        </div>



                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">

                                                <label for="menu">main description</label>
                                                <textarea name="main_description" class="form-control">{!! $main_description !!}</textarea>
                                            </div>
                                        </div>


                                        <div class="col-md-8 col-sm-12">
                                            <div class="form-group">

                                                <label for="button_link">button link</label>
                                                <input type="text" name="button_link" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">

                                                <label for="button_name">button name</label>
                                                <input type="text" name="button_name" class="form-control">
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="{{ $id }}">


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
