@extends('liteadmin.layout')
@section('pagetitle', 'theme Section')
@section('theme-link', 'active')


<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('content')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Theme Section </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Theme Section </li>
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



                                <h3 class="card-title">Theme Section </h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="mannage_theme_section">
                                @csrf
                                <div class="card-body">

                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="menu">navbar background color</label>
                                                <input type="color" name="nav_background_color" value="{{ $nav_background_color }}"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="menu">navbar font color</label>
                                                <input type="color" name="font_color" value="{{ $font_color }}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group">
                                                <label for="menu">navbar mouse hover</label>
                                                <input type="color" name="navbar_on_mouser_hover" value="{{ $navbar_on_mouser_hover }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                    </div>




                                    <div class="row">

                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="menu">footer part one</label>
                                                <input type="color" name="footer_part_one" value="{{ $footer_part_one }}" class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="menu">footer part one font</label>
                                                <input type="color" name="footer_part_one_font" value="{{ $footer_part_one_font }}"
                                                    class="form-control">
                                            </div>
                                        </div>









                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="menu">footer part two</label>
                                                <input type="color" name="footer_part_two" value="{{ $footer_part_two }}" class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="menu">footer part two font</label>
                                                <input type="color" name="footer_part_two_fount" value="{{ $footer_part_two_fount }}"
                                                    class="form-control">
                                            </div>
                                        </div>






                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="menu">footer part three</label>
                                                <input type="color" name="footer_part_three" value="{{ $footer_part_three }}"
                                                    class="form-control">
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="menu">footer part three font</label>
                                                <input type="color" name="footer_part_three_fount" value="{{ $footer_part_three_fount }}"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="{{ $id }}" >



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
