@php
$getsiteinformetion = getsiteinformetion();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('pagetitle') | {{ $getsiteinformetion[0]->title }} </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('admin_asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/dropzone/min/dropzone.min.css') }}">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/ekko-lightbox/ekko-lightbox.css') }}">


    <link rel="stylesheet" type="text/css" href="{{ asset('admin_asset/DataTables/datatables.min.css') }}" />

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <div class="overlay-wrapper">
                <div class="overlay">
                    <i class="fas fa-3x fa-sync-alt fa-spin"></i>
                    <div class="text-bold pt-2">Loading...</div>
                </div>
            </div>
        </div>



        <div class="pagloader"></div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>




                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('myadm/dashboard') }}" class="brand-link">
                <span class="brand-text font-weight-light">{{ $getsiteinformetion[0]->title }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('admin_asset/dist/img/admin.png') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ session()->get('USER_NAME') }}</a>
                    </div>
                </div>



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column text-uppercase" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="{{ url('myadm/dashboard') }}" class="nav-link @yield('dashboard-link')">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>

                        </li>




                        <li class="nav-item">
                            <a href="" class="nav-link @yield('home-link')">
                                <i class="fas fa-home"></i>
                                <p>
                                    Home
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item ">
                                    <a href="{{ url('myadm/school-management-Section') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>school management</p>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a href="{{ url('myadm/Section-one') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Section one</p>
                                    </a>
                                </li>


                                <li class="nav-item ">
                                    <a href="{{ url('myadm/home-product-link') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Home product link</p>
                                    </a>
                                </li>


                                <li class="nav-item ">
                                    <a href="{{ url('myadm/toppers-section') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>toppers section</p>
                                    </a>
                                </li>



                                <li class="nav-item">
                                    <a href="{{ url('myadm/Footer-controller') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                        <p>Footer controller</p>
                                    </a>
                                </li>




                                <li class="nav-item ">
                                    <a href="{{ url('myadm/footer-widget-one') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>footer widget one</p>
                                    </a>
                                </li>




                                <li class="nav-item ">
                                    <a href="{{ url('myadm/Model-Box') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Model Box</p>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a href="{{ url('myadm/modules') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Modules</p>
                                    </a>
                                </li>



                                <li class="nav-item ">
                                    <a href="{{ url('myadm/footer-address') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Footer Address</p>
                                    </a>
                                </li>


                            </ul>
                        </li>


                        <li class="nav-item menu-open">
                            <a href="{{ url('myadm/pages') }}" class="nav-link @yield('pages-link')">
                                <i class="far fa-file-alt"></i>
                                <p>
                                    Pages
                                </p>
                            </a>

                        </li>





                        <li class="nav-item">
                            <a href="" class="nav-link @yield('menu-link')">
                                <i class="fas fa-chevron-circle-down"></i>
                                <p>
                                    MENU
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>


                            <ul class="nav nav-treeview">

                                <li class="nav-item ">
                                    <a href="{{ url('myadm/addmenu') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Create Menu</p>
                                    </a>
                                </li>


                                <li class="nav-item ">
                                    <a href="{{ url('myadm/arrange-menus') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>arrange menus</p>
                                    </a>
                                </li>


                            </ul>
                        </li>



                        <li class="nav-item">
                            <a href="" class="nav-link @yield('Product-link')">
                                <i class="fas fa-book-reader"></i>
                                <p>
                                    Product
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>


                            <ul class="nav nav-treeview">

                                <li class="nav-item ">
                                    <a href="{{ url('myadm/product/banner_section') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>banner section</p>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a href="{{ url('myadm/part_one') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>part one</p>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a href="{{ url('myadm/part_two') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>part two</p>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a href="{{ url('myadm/part_three') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>part three</p>
                                    </a>
                                </li>




                            </ul>
                        </li>



                        <li class="nav-item menu-open">
                            <a href="{{ url('myadm/cms') }}" class="nav-link @yield('cms-link')">
                                <i class="fas fa-sliders-h"></i>
                                <p>
                                    CMS
                                </p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="" class="nav-link @yield('Gallery-link')">
                                <i class="fas fa-images"></i>
                                <p>
                                    Gallery
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>


                            <ul class="nav nav-treeview">
                                <li class="nav-item ">
                                    <a href="{{ url('myadm/Image') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Image</p>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a href="{{ url('myadm/video') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>video</p>
                                    </a>
                                </li>

                            </ul>
                        </li>


                        <li class="nav-item menu-open">
                            <a href="{{ url('myadm/Banners') }}" class="nav-link @yield('Banner-link')">
                                <i class="fas fa-chalkboard"></i>
                                <p>
                                    Banners
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link @yield('news-link')">
                                <i class="fas fa-rss"></i>
                                <p>
                                    News/Blog
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>


                            <ul class="nav nav-treeview">
                                <li class="nav-item ">
                                    <a href="{{ url('myadm/addnews') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>add news</p>
                                    </a>
                                </li>

                                <li class="nav-item ">
                                    <a href="{{ url('myadm/managenews') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manage news</p>
                                    </a>
                                </li>
                            </ul>
                        </li>



                        <li class="nav-item">
                            <a href="" class="nav-link @yield('events-link')">
                                <i class="fas fa-calendar-alt"></i>
                                <p>
                                    Events
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>


                            <ul class="nav nav-treeview">


                                <li class="nav-item ">
                                    <a href="{{ url('myadm/addevents') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Manage Events</p>
                                    </a>
                                </li>
                            </ul>
                        </li>





                        <li class="nav-item menu-open">
                            <a href="{{ url('myadm/ContactUs') }}" class="nav-link @yield('ContactUs-link')">
                                <i class="fas fa-id-card-alt"></i>
                                <p>
                                    Contact Us
                                </p>
                            </a>
                        </li>



                        <li class="nav-item menu-open">
                            <a href="{{ url('myadm/theme') }}" class="nav-link @yield('theme-link')">
                                <i class="fas fa-palette"></i>
                                <p>
                                    Theme
                                </p>
                            </a>

                        </li>


                        <li class="nav-item menu-open">
                            <a href="{{ url('myadm/sitedetails') }}" class="nav-link @yield('sitedetails-link')">
                                <i class="fas fa-info-circle"></i>
                                <p>
                                    Site Information
                                </p>
                            </a>
                        </li>



                        <li class="nav-item menu-open">
                            <a href="/Logout" class="nav-link  @yield('logout')">
                                <i class="fas fa-sign-out-alt"></i>
                                <p>
                                    Logout
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        <!-- Content Wrapper. Contains page content -->

        @section('content')


        @show


        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }} <a href="https://googolplexacademy.in/"
                    target="_blank">Googolplex academy</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->



    <!-- jQuery -->
    <script src="{{ asset('admin_asset/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('admin_asset/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('admin_asset/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('admin_asset/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('admin_asset/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('admin_asset/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('admin_asset/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('admin_asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('admin_asset/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('admin_asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin_asset/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('admin_asset/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('admin_asset/dist/js/pages/dashboard.js') }}"></script>

    <!-- CodeMirror -->
    <script src="{{ asset('admin_asset/plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/codemirror/mode/css/css.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/codemirror/mode/xml/xml.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
    <!-- dropzonejs -->
    <script src="{{ asset('admin_asset/plugins/dropzone/min/dropzone.min.js') }}"></script>

    <!-- Ekko Lightbox -->
    <script src="{{ asset('admin_asset/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

    <script src="{{ asset('admin_asset/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin_asset/DataTables/datatables.min.js') }}"></script>



    <script src="{{ asset('admin_asset/custime.js') }}"></script>


</body>

</html>

<script>
    function custome_cms(id_of_txt_ariya) {

        CKEDITOR.replace(id_of_txt_ariya, {
            toolbar: [{
                    name: 'document',
                    groups: ['mode', 'document', 'doctools'],
                    items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates']
                },
                {
                    name: 'clipboard',
                    groups: ['clipboard', 'undo'],
                    items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo']
                },
                {
                    name: 'editing',
                    groups: ['find', 'selection', 'spellchecker'],
                    items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt']
                },
                {
                    name: 'basicstyles',
                    groups: ['basicstyles', 'cleanup'],
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-',
                        'RemoveFormat'
                    ]
                },
                {
                    name: 'paragraph',
                    groups: ['list', 'indent', 'blocks', 'align', 'bidi'],
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote',
                        'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight',
                        'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language'
                    ]
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink', 'Anchor']
                },
                {
                    name: 'styles',
                    items: ['Styles', 'Format', 'Font', 'FontSize']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                },
                {
                    name: 'tools',
                    items: ['Maximize', 'ShowBlocks']
                },

            ]
        });

    }





    $("#mannage_menu_form_data").submit(function(e) {
        e.preventDefault();

        var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
        $(".pagloader").html(pageloader)

        var mannage_menu_form_data = new FormData($(this)[0])
        $.ajax({
            type: "post",
            Headers: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            url: '/myadm/addmenu/mannagemenuorm',
            data: mannage_menu_form_data,
            success: function(data) {
                $(".pagloader").html(' ')
                if (data.errors) {
                    $.each(data, function(errorkay, errorval) {
                        var menu_slug = errorval.menu_slug
                        var menu = errorval.menu
                        if (errorval.menu) {
                            var menuerr = `<div class="alert alert-danger alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                 <h5></h5>` + menu + `</div>`;
                            $("#menuerr").html(menuerr)
                        } else {
                            $("#menuerr").html('')
                        }



                        if (errorval.menu_type) {
                            var menu_types = `<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5></h5>` + errorval.menu_type + `</div>`;
                            $("#menutypeerr").html(menu_types)
                        } else {
                            $("#menutypeerr").html('')
                        }


                        if (errorval.menu_slug) {
                            var menu_slugerr = `<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5></h5>` + menu_slug + `</div>`;
                            $("#menu_slugerr").html(menu_slugerr)
                        } else {
                            $("#menu_slugerr").html('')
                        }

                        if (errorval.menu_image) {
                            var menu_imageerr = `<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5></h5>` + errorval.menu_image + `</div>`;
                            $("#errorval_menu_image").html(menu_imageerr)
                        } else {
                            $("#errorval_menu_image").html('')
                        }
                    })
                } else {
                    $("#menu_slugerr").html('')
                    $("#menuerr").html('')
                    $("#errorval_menu_image").html('')
                    $("#menutypeerr").html('')
                    var sucess = data.sucess;
                    var htmlss = `<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h5><i class="icon fas fa-check"></i> Done!</h5>` + sucess + `</div>`;
                    $("#sucessdata").html(htmlss)
                    setTimeout(function() {
                        location.href = '/myadm/addmenu'
                    }, 1000);

                }
            },
            contentType: false,
            processData: false,
            cache: false,

        });

    })





    function menudelete(id) {
        var con = confirm("Are you sure want to delete ?");
        if (con == true) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/myadm/addmenu/Delete',
                data: 'id=' + id,
                success: function(data) {
                    if (data.sucess == 'deleted') {
                        $('table#menutable tr#' + id).remove();


                    }
                }

            })



        }

    }







    function menuchangefunction(id) {

        var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
        $(".pagloader").html(pageloader)



        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/myadm/mannagecontent/menudata_get',
            data: 'menu_id=' + id,
            success: function(data) {
                $(".pagloader").html(' ')

                $.each(data, function(datakay, datavalue) {
                    $("#menu_type").html('<b>Menu Type : ' + datavalue[datakay][0].menu_type +
                        '</b>')
                    $("#menu").html('<b>' + datavalue[datakay][0].menu + '</b>')


                    if (datavalue[datakay][0].menu_type == 'video_gallery') {
                        $(".data_of_manues").html('')
                        $(".gallerplace").html('')


                        var menu_id = datavalue[datakay][0].id;
                        var menu = datavalue[datakay][0].menu_slug;
                        $(".data_of_manues").html('')
                        var images_html =
                            `<div class="dropzone dropzone-previews" id="my-awesome-dropzone"></div>`;
                        $(".gallerplace").html(images_html)


                        Dropzone.autoDiscover = false
                        $(document).ready(function() {
                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                            $("div#my-awesome-dropzone").dropzone({
                                url: "/myadm/cms/videoupload/" + menu_id + '/' +
                                    menu, // Set the url
                                headers: {
                                    'x-csrf-token': CSRF_TOKEN,
                                },
                                acceptedFiles: 'video/*',


                            });

                        });



                    } else if (datavalue[datakay][0].menu_type == 'image_gallery') {
                        var menu_id = datavalue[datakay][0].id;
                        var menu = datavalue[datakay][0].menu_slug;
                        $(".data_of_manues").html('')
                        var images_html =
                            `<div class="dropzone dropzone-previews" id="my-awesome-dropzone"></div>`;
                        $(".gallerplace").html(images_html)


                        Dropzone.autoDiscover = false
                        $(document).ready(function() {
                            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                            $("div#my-awesome-dropzone").dropzone({
                                url: "/myadm/cms/imageupload/" + menu_id + '/' +
                                    menu, // Set the url
                                headers: {
                                    'x-csrf-token': CSRF_TOKEN,
                                },
                                acceptedFiles: 'image/*',


                            });

                        });

                    } else if (datavalue[datakay][0].menu_type == 'contact' || datavalue[datakay][0]
                        .menu_type == 'other') {
                        $(".data_of_manues").html('')
                        $(".gallerplace").html('')
                        if (datavalue[1][0]) {
                            $(".gallerplace").html('')
                            $(".data_of_manues").html('');
                            var val = datavalue[1][0].content
                            var conentofid = datavalue[1][0].id
                            var title = datavalue[1][0].title

                            var dataofcrm = `<div class="input-group mb-3">
                                  <div class="col-md-12">
                                    <input class="form-control" placeholder="Enter title" type="text" value="` +
                                title + `" name="title"></div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                <div class="col-md-12">
                                <textarea name="description" class="description">` + val + `</textarea>
                                </div>

                            </div>
                                <div class="input-group mb-3">
                                    <div class="col-md-12">
                                    <input type="hidden" name="is_data"  value="1">
                                <button type="submit" id="cmsdata" class="btn btn-block bg-gradient-success btn-lg">Save</button>
                                        </div>
                                </div>`;
                            $("#content_id").html('<input type="hidden" value="' + conentofid +
                                '" name="conentofid">')
                            $(".data_of_manues").html(dataofcrm);
                        } else {
                            $(".gallerplace").html('')
                            $("#content_id").html(
                                '<input type="hidden" value="" name="conentofid">')
                            $(".data_of_manues").html('');

                            var dataofcrm1 = `<div class="input-group mb-3">
                                  <div class="col-md-12">
                                    <input class="form-control" placeholder="Enter title" type="text" value="" name="title"></div>
                                    </div>
                                </div>

                                    <div class="input-group mb-3">
                                <div class="col-md-12">
                                <textarea name="description" class="description"></textarea>
                                </div>

                            </div>
                                <div class="input-group mb-3">
                                    <div class="col-md-12">
                                      <input type="hidden" name="is_data"  value="1">

                                <button type="submit" id="cmsdata" class="btn btn-block bg-gradient-success btn-lg">Save</button>
                                </div>
                                </div>`;
                            $(".data_of_manues").html(dataofcrm1);
                        }



                        $(document).ready(function() {
                            CKEDITOR.replace('description', {
                                filebrowserUploadUrl: "{{ route('uploadckeditorimage', ['_token' => csrf_token()]) }}",
                                filebrowserUploadMethod: 'form'
                            });
                        });

                    } else {
                        if (datavalue[1][0]) {
                            $(".gallerplace").html('')
                            $(".data_of_manues").html('');
                            var val = datavalue[1][0].content
                            var conentofid = datavalue[1][0].id
                            var title = datavalue[1][0].title

                            var dataofcrm = `<div class="input-group mb-3">
                                  <div class="col-md-12">
                                    <input class="form-control" placeholder="Enter title" type="text" value="` +
                                title + `" name="title"></div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                <div class="col-md-12">
                                <textarea name="description" class="description">` + val + `</textarea>
                                </div>

                            </div>
                                <div class="input-group mb-3">
                                    <div class="col-md-12">
                                      <input type="hidden" name="is_data"  value="1">

                                <button type="submit" id="cmsdata" class="btn btn-block bg-gradient-success btn-lg">Save</button>
                                        </div>
                                </div>`;
                            $("#content_id").html('<input type="hidden" value="' + conentofid +
                                '" name="conentofid">')
                            $(".data_of_manues").html(dataofcrm);
                        } else {
                            $(".gallerplace").html('')
                            $("#content_id").html(
                                '<input type="hidden" value="" name="conentofid">')
                            $(".data_of_manues").html('');

                            var dataofcrm1 = `<div class="input-group mb-3">
                                  <div class="col-md-12">
                                    <input class="form-control" placeholder="Enter title" type="text" value="" name="title"></div>
                                    </div>
                                </div>

                                    <div class="input-group mb-3">
                                <div class="col-md-12">
                                <textarea name="description" class="description"></textarea>
                                </div>

                            </div>
                                <div class="input-group mb-3">
                                    <div class="col-md-12">
                                      <input type="hidden" name="is_data"  value="1">

                                <button type="submit" id="cmsdata" class="btn btn-block bg-gradient-success btn-lg">Save</button>
                                </div>
                                </div>`;
                            $(".data_of_manues").html(dataofcrm1);
                        }


                        $(document).ready(function() {
                            CKEDITOR.replace('description', {
                                filebrowserUploadUrl: "{{ route('uploadckeditorimage', ['_token' => csrf_token()]) }}",
                                filebrowserUploadMethod: 'form'
                            });
                        });




                    }


                })

            }

        })

    }


    $("#cms_data").submit(function(e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }

        var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
        <div class="overlay-wrapper">
          <div class="overlay">
              <i class="fas fa-3x fa-sync-alt fa-spin"></i>
              <div class="text-bold pt-2">Loading...</div></div>
        </div>
      </div>`;
        $(".pagloader").html(pageloader)

        var cms_data = new FormData($(this)[0])
        $.ajax({
            type: "post",
            Headers: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            url: '/myadm/mannage/cmsdata',
            data: cms_data,
            success: function(data) {
                $(".pagloader").html(' ')

                if (data.sucess) {



                    $('#menuid').val('');


                    $(document).Toasts('create', {
                        class: 'bg-success',
                        title: 'Menu data',
                        body: data.sucess + ' successful'
                    })
                } else {

                    if (data.errors) {
                        $.each(data, function(errorkay, errorval) {
                            $.each(errorval, function(k, v) {

                                $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'Menu data',
                                    body: v
                                })


                            })

                        })
                    }
                }

            },
            contentType: false,
            processData: false,
            cache: false,

        });

    })





    // site details

    $("#site_details").submit(function(e) {
        e.preventDefault();
        var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
        <div class="overlay-wrapper">
          <div class="overlay">
              <i class="fas fa-3x fa-sync-alt fa-spin"></i>
              <div class="text-bold pt-2">Loading...</div></div>
        </div>
      </div>`;
        $(".pagloader").html(pageloader)

        var sitedetails = new FormData($(this)[0])
        $.ajax({
            type: "post",
            Headers: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            url: '/myadm/sitedetails/save',
            data: sitedetails,
            success: function(data) {
                $(".pagloader").html(' ')
                console.log(data)
                if (data.sucess) {
                    $(document).Toasts('create', {
                        class: 'bg-success',
                        title: 'site details',
                        body: data.sucess + ' successful'
                    })
                    location.reload();

                } else {
                    if (data.errors) {
                        $.each(data, function(errorkay, errorval) {
                            $.each(errorval, function(k, v) {

                                $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'Menu data',
                                    body: v
                                })


                            })

                        })
                    }
                }

            },
            contentType: false,
            processData: false,
            cache: false,

        });

    })





    function imagecategorydelete(id) {
        var delconform = confirm('Are you sure want to delete ?. complete group will delete .')
        if (delconform == true) {

            var _token = "{{ csrf_token() }}";

            $.ajax({
                type: "post",
                url: '/myadm/Image/delete',
                data: 'gmenu_id=' + id + '&_token=' + _token,
                success: function(data) {
                    $(".pagloader").html(' ')
                    if (data.sucess) {
                        $("#" + id).remove();

                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'Image gallery data',
                            body: data.sucess + ' successful'
                        })
                    } else {
                        if (data.errors) {
                            $.each(data, function(errorkay, errorval) {
                                $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'Image gallery data',
                                    body: errorval
                                })



                            })
                        }
                    }

                }

            })



        }

    }


    function deletlesingleimage(id) {
        var delconform = confirm('Are you sure want to delete ?.')
        if (delconform == true) {

            var _token = "{{ csrf_token() }}";

            $.ajax({
                type: "post",
                url: '/myadm/Image/deletesingle',
                data: 'iamge_id=' + id + '&_token=' + _token,
                success: function(data) {
                    $(".pagloader").html(' ')
                    if (data.sucess) {
                        $("#" + id).remove();
                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'Image gallery data',
                            body: data.sucess + ' successful'
                        })
                    } else {
                        if (data.errors) {
                            $.each(data, function(errorkay, errorval) {
                                $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'Image gallery data',
                                    body: errorval
                                })
                            })
                        }
                    }

                }

            })



        }

    }


    //edit image


    Dropzone.autoDiscover = false
    var urls = "{{ url()->current() }}"
    var trainindIdArray = urls.split('/');
    var urlid = trainindIdArray.slice(-1)[0]



    $(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $("div#my-awesome-dropzoneimg").dropzone({
            url: "/myadm/addmenu/edit_img/save/" + urlid, // Set the url
            headers: {
                'x-csrf-token': CSRF_TOKEN,
            },
            acceptedFiles: 'image/*',
            success: function(data) {
                if (data.status == 'success') {
                    location.reload();
                } else {
                    $(document).Toasts('create', {
                        class: 'bg-danger',
                        title: 'Image gallery data',
                        body: 'can not upload image retry'
                    })

                }
            }


        });

    });




    //edit video


    Dropzone.autoDiscover = false
    var urls = "{{ url()->current() }}"
    var trainindIdArray = urls.split('/');
    var urlid = trainindIdArray.slice(-1)[0]



    $(document).ready(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $("div#my-awesome-dropzone1").dropzone({
            url: "/myadm/addmenu/edit_vod/save/" + urlid, // Set the url
            headers: {
                'x-csrf-token': CSRF_TOKEN,
            },
            acceptedFiles: 'video/*',
            success: function(data) {
                if (data.status == 'success') {
                    location.reload();
                } else {
                    $(document).Toasts('create', {
                        class: 'bg-danger',
                        title: 'video gallery data',
                        body: 'can not upload video retry'
                    })

                }
            }


        });

    });







    function deletlesinglevideo(id) {
        var delconform = confirm('Are you sure want to delete ?.')
        if (delconform == true) {

            var _token = "{{ csrf_token() }}";

            $.ajax({
                type: "post",
                url: '/myadm/video/deletesingle',
                data: 'iamge_id=' + id + '&_token=' + _token,
                success: function(data) {
                    $(".pagloader").html(' ')
                    if (data.sucess) {
                        $("#" + id).remove();
                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'video gallery data',
                            body: data.sucess + ' successful'
                        })
                    } else {
                        if (data.errors) {
                            $.each(data, function(errorkay, errorval) {
                                $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'Image video data',
                                    body: errorval
                                })
                            })
                        }
                    }

                }

            })



        }

    }




    function videocategorydelete(id) {
        var delconform = confirm('Are you sure want to delete ?. complete group will delete .')
        if (delconform == true) {

            var _token = "{{ csrf_token() }}";

            $.ajax({
                type: "post",
                url: '/myadm/video/delete',
                data: 'gmenu_id=' + id + '&_token=' + _token,
                success: function(data) {
                    $(".pagloader").html(' ')
                    if (data.sucess) {
                        $("#" + id).remove();

                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'video gallery data',
                            body: data.sucess + ' successful'
                        })
                    } else {
                        if (data.errors) {
                            $.each(data, function(errorkay, errorval) {
                                $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'video gallery data',
                                    body: errorval
                                })



                            })
                        }
                    }

                }

            })



        }

    }

    $(document).ready(function() {
        $('#menutable').DataTable();
    });


    function viewmessage(id) {
        var _token = "{{ csrf_token() }}";
        $.ajax({
            type: 'post',
            url: '/myadm/ContactUs/readstatus',
            data: 'msgid=' + id + '&_token=' + _token,
            success: function(data) {
                if (data.stetus == 'readed') {
                    var element = document.getElementById(id);
                    element.classList.remove("font-weight-bold");
                }
            }

        })

    }



    function deleteuserinquery(id) {

        var delconform = confirm('Are you sure want to delete ?')
        if (delconform == true) {

            var _token = "{{ csrf_token() }}";

            $.ajax({
                type: "post",
                url: '/myadm/contactus/delete',
                data: 'inc_id=' + id + '&_token=' + _token,
                success: function(data) {
                    $(".pagloader").html(' ')
                    if (data.sucess) {
                        $("." + id).remove();

                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'contact us data',
                            body: data.sucess + ' successful'
                        })
                    } else {
                        if (data.errors) {
                            $.each(data, function(errorkay, errorval) {
                                $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'contact us data',
                                    body: errorval
                                })



                            })
                        }
                    }

                }

            })



        }

    }


    $(document).ready(function() {
        CKEDITOR.replace('newscontent', {
            filebrowserUploadUrl: "{{ route('uploadckeditorimagefornews', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    });







    $("#news_data").submit(function(e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }

        var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
        <div class="overlay-wrapper">
          <div class="overlay">
              <i class="fas fa-3x fa-sync-alt fa-spin"></i>
              <div class="text-bold pt-2">Loading...</div></div>
        </div>
      </div>`;
        $(".pagloader").html(pageloader)

        var news_data = new FormData($(this)[0])
        $.ajax({
            type: "post",
            Headers: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            url: '/myadm/addnews/add',
            data: news_data,
            success: function(data) {
                $(".pagloader").html(' ')
                if (data.stetus == 'updated') {
                    location.reload()
                }

                if (data.sucess) {
                    $('#menuidnews').val('');

                    $(document).Toasts('create', {
                        class: 'bg-success',
                        title: 'Menu data',
                        body: data.sucess + ' successful'
                    })
                } else {
                    if (data.errors) {
                        $.each(data, function(errorkay, errorval) {
                            $.each(errorval, function(k, v) {

                                $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'Menu data',
                                    body: v
                                })


                            })

                        })
                    }
                }

            },
            contentType: false,
            processData: false,
            cache: false,

        });

    })



    function newspublish(id) {

        var delconform = confirm('Are you sure want to publish ?')
        if (delconform == true) {

            var _token = "{{ csrf_token() }}";

            $.ajax({
                type: "post",
                url: '/myadm/managenews/stetus/1',
                data: 'inc_id=' + id + '&_token=' + _token,
                success: function(data) {
                    $(".pagloader").html(' ')
                    if (data.sucess) {


                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'manage news',
                            body: data.sucess + ''
                        })
                        location.reload()

                    } else {
                        if (data.errors) {
                            $.each(data, function(errorkay, errorval) {
                                $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'manage news',
                                    body: errorval
                                })



                            })
                        }
                    }

                }

            })



        }


    }


    function newspublishun(id) {


        var delconform = confirm('Are you sure want to unpublish ?')
        if (delconform == true) {

            var _token = "{{ csrf_token() }}";

            $.ajax({
                type: "post",
                url: '/myadm/managenews/stetus/0',
                data: 'inc_id=' + id + '&_token=' + _token,
                success: function(data) {
                    $(".pagloader").html(' ')
                    if (data.sucess) {



                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'contact us data',
                            body: data.sucess + ''
                        })
                        location.reload()


                    } else {
                        if (data.errors) {
                            $.each(data, function(errorkay, errorval) {
                                $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'contact us data',
                                    body: errorval
                                })



                            })
                        }
                    }

                }

            })
        }



    }






    function deletenewsdata(id) {
        var delconform = confirm('Are you sure want to delete ?')
        if (delconform == true) {

            var _token = "{{ csrf_token() }}";

            $.ajax({
                type: "post",
                url: '/myadm/managenews/delete',
                data: 'inc_id=' + id + '&_token=' + _token,
                success: function(data) {
                    $(".pagloader").html(' ')
                    if (data.sucess) {
                        $("#" + id).remove();

                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'contact us data',
                            body: data.sucess + ' successful'
                        })
                    } else {
                        if (data.errors) {
                            $.each(data, function(errorkay, errorval) {
                                $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'contact us data',
                                    body: errorval
                                })



                            })
                        }
                    }

                }

            })



        }

    }



    $(document).ready(function() {
        $('#mannagenews').DataTable();
    });





    $("#mannage_banners_form_data").submit(function(e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }

        var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
        $(".pagloader").html(pageloader)

        var mannage_bannder_form_data = new FormData($(this)[0])
        $.ajax({
            type: "post",
            Headers: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            url: '/myadm/mannagebanner/procss',
            data: mannage_bannder_form_data,
            success: function(data) {
                $(".pagloader").html(' ')
                if (data.errors) {
                    $.each(data, function(errorkay, errorval) {
                        $.each(errorval, function(k, v) {

                            $(document).Toasts('create', {
                                class: 'bg-danger',
                                title: 'banner data',
                                body: v
                            })


                        })

                    })
                } else {
                    $("#menu_slugerr").html('')
                    $("#menuerr").html('')
                    $("#errorval_bannder_image").html('')
                    $("#menutypeerr").html('')
                    var sucess = data.sucess;

                    $(document).Toasts('create', {
                        class: 'bg-success',
                        title: 'banner data',
                        body: 'data update success'
                    })

                    $("#banner_image_prew").html(' ')
                    var url = "{{ url('storage/media/') }}";
                    var bannerimg = `<img src="` + url + `/` + data.sucess.banner_image +
                        `" width="150" >`;
                    $("#banner_image_prew").html(bannerimg)



                    $("#background_img_prwe").html(' ')
                    var url = "{{ url('storage/media/') }}";
                    var background = `<img src="` + url + `/` + data.sucess.background_img +
                        `" width="150" >`;
                    $("#background_img_prwe").html(background)


                }
            },
            contentType: false,
            processData: false,
            cache: false,

        });

    })







    function bannerdelete(id) {
        var delconform = confirm('Are you sure want to delete ?')
        if (delconform == true) {

            var _token = "{{ csrf_token() }}";

            $.ajax({
                type: "post",
                url: '/myadm/Banners/delete',
                data: 'inc_id=' + id + '&_token=' + _token,
                success: function(data) {
                    $(".pagloader").html(' ')
                    if (data.sucess) {
                        $("#" + id).remove();

                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'contact us data',
                            body: data.sucess + ' successful'
                        })
                    } else {
                        if (data.errors) {
                            $.each(data, function(errorkay, errorval) {
                                $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'contact us data',
                                    body: errorval
                                })



                            })
                        }
                    }

                }

            })



        }

    }






    $("#alignemtformdata").submit(function(e) {
        e.preventDefault();

        var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
        $(".pagloader").html(pageloader)

        var mannage_bannder_form_data = new FormData($(this)[0])
        $.ajax({
            type: "post",
            Headers: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            url: '/myadm/arrange-menus/data',
            data: mannage_bannder_form_data,
            success: function(data) {
                $(".pagloader").html(' ')
                if (data.errors) {
                    $.each(data, function(errorkay, errorval) {
                        $.each(errorval, function(k, v) {

                            $(document).Toasts('create', {
                                class: 'bg-danger',
                                title: 'menu alignment data',
                                body: v
                            })


                        })

                    })
                } else {
                    $("#menu_slugerr").html('')
                    $("#menuerr").html('')
                    $("#errorval_bannder_image").html('')
                    $("#menutypeerr").html('')
                    var sucess = data.sucess;

                    $(document).Toasts('create', {
                        class: 'bg-success',
                        title: 'banner data',
                        body: 'data update success'
                    })

                    $("#banner_image_prew").html(' ')
                    var url = "{{ url('storage/media/') }}";
                    var bannerimg = `<img src="` + url + `/` + data.sucess.banner_image +
                        `" width="150" >`;
                    $("#banner_image_prew").html(bannerimg)



                    $("#background_img_prwe").html(' ')
                    var url = "{{ url('storage/media/') }}";
                    var background = `<img src="` + url + `/` + data.sucess.background_img +
                        `" width="150" >`;
                    $("#background_img_prwe").html(background)


                }
            },
            contentType: false,
            processData: false,
            cache: false,

        });

    })




















    CKEDITOR.replace('homesectionone')



    $("#mannage_home_data_section_one").submit(function(e) {
        e.preventDefault();
        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }

        var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
        $(".pagloader").html(pageloader)

        var mannage_home_form_data = new FormData($(this)[0])
        $.ajax({
            type: "post",
            Headers: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            url: '/myadm/Section-one/mannage/save',
            data: mannage_home_form_data,
            success: function(data) {
                $(".pagloader").html(' ')


                if (data.errors) {

                    var errors = data.errors;
                    $.each(errors, function(kay, val) {

                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'Home section One',
                            body: val

                        })



                    })

                } else {

                    $(document).Toasts('create', {
                        class: 'bg-success',
                        title: 'Home section One',
                        body: data.sucess
                    })


                }

            },
            contentType: false,
            processData: false,
            cache: false,

        });

    })





    function homecectiondelete(id) {
        var con = confirm("Are you sure want to delete ?");
        if (con == true) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/myadm/Section-one/Delete',
                data: 'id=' + id,
                success: function(data) {
                    if (data.sucess == 'deleted') {
                        $('table#menutable tr#' + id).remove();


                    }
                }

            })



        }

    }



    CKEDITOR.replace('eventscontent')


    $("#mannage_formdata_form_data").submit(function(e) {
        e.preventDefault();

        for (instance in CKEDITOR.instances) {
            CKEDITOR.instances[instance].updateElement();
        }



        var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
        $(".pagloader").html(pageloader)

        var mannage_menu_form_data = new FormData($(this)[0])
        $.ajax({
            type: "post",
            Headers: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            url: '/myadm/addevent/mannagevent/save',
            data: mannage_menu_form_data,
            success: function(data) {
                $(".pagloader").html(' ')
                if (data.errors) {
                    var erros = data.errors;

                    $.each(erros, function(k, v) {
                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'Manage Events',
                            body: v
                        })
                    })

                } else {



                    if (data.stetus == 'updated') {

                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'manage events',
                            body: data.sucess
                        })
                        $("#image_id").html(' ')

                        if (data.itemdata.image) {
                            var curentid = data.itemdata.image
                            var deltid = data.itemdata.id;
                            var dlt_buttom =
                                `   <a class="btn btn-app bg-danger" onclick='deleteeventimg(` +
                                deltid + `)'>
                                            <i class="fas fa-inbox"></i> Orders
                                          </a>`;
                            var img = "{{ url('storage/media/') }}" + '/' + curentid;
                            var htmldat_of_img = ` <img src="` + img + `" width="150">` + dlt_buttom

                            $("#image_id").html(htmldat_of_img)
                        }







                    } else {

                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'manage events',
                            body: data.sucess
                        })
                        var curentid = data.itemdata.id

                        var href = '/myadm/addevent/mannagevent/edit/' + curentid
                        window.location = href

                    }





                }

            },
            contentType: false,
            processData: false,
            cache: false,

        });

    })




    function deleteeventimg(id) {
        var con = confirm("Are you sure want to delete ?");
        if (con == true) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/myadm/addevent/mannagevent/delete',
                data: 'id=' + id,
                success: function(data) {

                    if (data.sucess == 'deleted') {

                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'manage events',
                            body: data.sucess
                        })

                        $("#image_id").html(' ')


                    }
                }

            })



        }

    }






    function deleteeventsdata(id) {
        var con = confirm("Are you sure want to delete ?");
        if (con == true) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/myadm/addevents/detete_table',
                data: 'id=' + id,
                success: function(data) {
                    console.log(data)
                    if (data.sucess) {
                        $('table#mannageevents tr#' + id).remove();

                    }
                }

            })



        }

    }





    function eventspublish(id) {

        var delconform = confirm('Are you sure want to publish ?')
        if (delconform == true) {

            var _token = "{{ csrf_token() }}";

            $.ajax({
                type: "post",
                url: '/myadm/addevents/stetus/1',
                data: 'inc_id=' + id + '&_token=' + _token,
                success: function(data) {
                    $(".pagloader").html(' ')
                    if (data.sucess) {


                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'manage news',
                            body: data.sucess + ''
                        })
                        location.reload()

                    } else {
                        if (data.errors) {
                            $.each(data, function(errorkay, errorval) {
                                $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'manage news',
                                    body: errorval
                                })



                            })
                        }
                    }

                }

            })



        }


    }


    function eventspublishun(id) {


        var delconform = confirm('Are you sure want to unpublish ?')
        if (delconform == true) {

            var _token = "{{ csrf_token() }}";

            $.ajax({
                type: "post",
                url: '/myadm/addevents/stetus/0',
                data: 'inc_id=' + id + '&_token=' + _token,
                success: function(data) {
                    $(".pagloader").html(' ')
                    if (data.sucess) {



                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'contact us data',
                            body: data.sucess + ''
                        })
                        location.reload()


                    } else {
                        if (data.errors) {
                            $.each(data, function(errorkay, errorval) {
                                $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'contact us data',
                                    body: errorval
                                })



                            })
                        }
                    }

                }

            })



        }



    }





    function page_delete(id) {
        var con = confirm("Are you sure want to delete ?");
        if (con == true) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/myadm/pages/Delete',
                data: 'id=' + id,
                success: function(data) {
                    if (data.sucess == 'deleted') {
                        $('table#pages_table tr#' + id).remove();


                    }
                }

            })



        }

    }










    $("#mannage_footer_cat_form_data").submit(function(e) {
        e.preventDefault();

        var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
        $(".pagloader").html(pageloader)

        var mannage_menu_form_data = new FormData($(this)[0])
        $.ajax({
            type: "post",
            Headers: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            url: '/myadm/Footer-controller/mannagecategory/save',
            data: mannage_menu_form_data,
            success: function(data) {
                $(".pagloader").html(' ')

                console.log(data)

                if (data.errors) {
                    var err = data.errors

                    $.each(err, function(k, v) {

                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'Manage footer category',
                            body: v
                        })

                    })


                } else {


                    if (data.status) {
                        var msg = data.msg;

                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'Manage footer category',
                            body: msg
                        })

                    }

                }






            },
            contentType: false,
            processData: false,
            cache: false,

        });

    })

















    $("#mannage_footer_links_form_data").submit(function(e) {
        e.preventDefault();

        var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
        $(".pagloader").html(pageloader)

        var mannage_menu_form_data = new FormData($(this)[0])
        $.ajax({
            type: "post",
            Headers: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            url: '/myadm/Footer-controller/configfooter/save',
            data: mannage_menu_form_data,
            success: function(data) {
                $(".pagloader").html(' ')

                console.log(data)

                if (data.errors) {
                    var err = data.errors

                    $.each(err, function(k, v) {

                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'Manage footer links',
                            body: v
                        })

                    })


                } else {


                    if (data.status) {
                        var msg = data.msg;

                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'Manage footer links',
                            body: msg
                        })

                        location.reload();


                    }



                }






            },
            contentType: false,
            processData: false,
            cache: false,

        });

    })









    $("#alignemtformdata_of_footer").submit(function(e) {
        e.preventDefault();

        var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
    <div class="overlay-wrapper">
      <div class="overlay">
          <i class="fas fa-3x fa-sync-alt fa-spin"></i>
          <div class="text-bold pt-2">Loading...</div></div>
    </div>
  </div>`;
        $(".pagloader").html(pageloader)

        var mannage_bannder_form_data = new FormData($(this)[0])
        $.ajax({
            type: "post",
            Headers: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            url: '/myadm/arrange-footer/data',
            data: mannage_bannder_form_data,
            success: function(data) {
                $(".pagloader").html(' ')
                if (data.errors) {
                    $.each(data, function(errorkay, errorval) {
                        $.each(errorval, function(k, v) {

                            $(document).Toasts('create', {
                                class: 'bg-danger',
                                title: 'menu alignment data',
                                body: v
                            })


                        })

                    })
                } else {
                    $("#menu_slugerr").html('')
                    $("#menuerr").html('')
                    $("#errorval_bannder_image").html('')
                    $("#menutypeerr").html('')
                    var sucess = data.sucess;

                    $(document).Toasts('create', {
                        class: 'bg-success',
                        title: 'banner data',
                        body: 'data update success'
                    })

                    $("#banner_image_prew").html(' ')
                    var url = "{{ url('storage/media/') }}";
                    var bannerimg = `<img src="` + url + `/` + data.sucess.banner_image +
                        `" width="150" >`;
                    $("#banner_image_prew").html(bannerimg)



                    $("#background_img_prwe").html(' ')
                    var url = "{{ url('storage/media/') }}";
                    var background = `<img src="` + url + `/` + data.sucess.background_img +
                        `" width="150" >`;
                    $("#background_img_prwe").html(background)


                }
            },
            contentType: false,
            processData: false,
            cache: false,

        });

    })







    function deletefootercategory(id) {
        var con = confirm("Are you sure want to delete ?");
        if (con == true) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/myadm/Footer-controller/delete',
                data: 'id=' + id,
                success: function(data) {
                    console.log(data)
                    if (data.sucess == "deleted") {
                        $('table#menutable_footer tr#' + id).remove();


                    }
                }

            })



        }

    }




    function delarefooterlinks(id) {
        var con = confirm("Are you sure want to delete ?");
        if (con == true) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/myadm/Footer-controller/configfooter/delete',
                data: 'id=' + id,
                success: function(data) {

                    if (data.sucess == "deleted") {
                        $('table#footer_link_table tr#' + id).remove();


                    }
                }

            })



        }

    }





    $("#moel_box_data").submit(function(e) {
        e.preventDefault();
        var pageloader = `<div class="preloader flex-column justify-content-center align-items-center">
        <div class="overlay-wrapper">
          <div class="overlay">
              <i class="fas fa-3x fa-sync-alt fa-spin"></i>
              <div class="text-bold pt-2">Loading...</div></div>
        </div>
      </div>`;
        $(".pagloader").html(pageloader)

        var sitedetails = new FormData($(this)[0])
        $.ajax({
            type: "post",
            Headers: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            },
            url: '/myadm/Model-Box/save',
            data: sitedetails,
            success: function(data) {
                $(".pagloader").html(' ')
                console.log(data)
                if (data.sucess) {
                    $(document).Toasts('create', {
                        class: 'bg-success',
                        title: 'site details',
                        body: data.sucess + ' successful'
                    })
                    location.reload();

                } else {
                    if (data.errors) {
                        $.each(data, function(errorkay, errorval) {
                            $.each(errorval, function(k, v) {

                                $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'Menu data',
                                    body: v
                                })


                            })

                        })
                    }
                }

            },
            contentType: false,
            processData: false,
            cache: false,

        });

    })



    function delete_home_section_image(id) {
        var con = confirm("Are you sure want to delete ?");
        if (con == true) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/myadm/Section-one/mannage/main_image/delete',
                data: 'id=' + id,
                success: function(data) {

                    if (data.sucess == 'deleted') {

                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'manage events',
                            body: data.sucess
                        })

                        $("#image_id_of_home").html(' ')


                    }
                }


            })



        }


    }





    function delete_home_section_image_brand(id) {
        var con = confirm("Are you sure want to delete ?");
        if (con == true) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/myadm/Section-one-brand/mannage/main_image/delete',
                data: 'id=' + id,
                success: function(data) {

                    if (data.sucess == 'deleted') {

                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'manage events',
                            body: data.sucess
                        })

                        $("#image_id_of_brabd").html(' ')


                    }
                }


            })



        }


    }



    $(document).ready(function() {
        CKEDITOR.replace('part_one_description', {
            filebrowserUploadUrl: "{{ route('uploadckeditorimage', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    });








    function banner_delete_product(id) {
        var delconform = confirm('Are you sure want to delete ?')
        if (delconform == true) {

            var _token = "{{ csrf_token() }}";

            $.ajax({
                type: "post",
                url: '/myadm/mannage_product_banner/delete',
                data: 'inc_id=' + id + '&_token=' + _token,
                success: function(data) {
                    $(".pagloader").html(' ')
                    if (data.sucess) {
                        $("#" + id).remove();

                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'contact us data',
                            body: data.sucess + ' successful'
                        })
                    } else {
                        if (data.errors) {
                            $.each(data, function(errorkay, errorval) {
                                $(document).Toasts('create', {
                                    class: 'bg-danger',
                                    title: 'contact us data',
                                    body: errorval
                                })



                            })
                        }
                    }

                }

            })



        }

    }


    function deleteFooter_Address(id) {
        var con = confirm("Are you sure want to delete ?");
        if (con == true) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/myadm/footer-address/detete_table',
                data: 'id=' + id,
                success: function(data) {
                    console.log(data)
                    if (data.sucess) {
                        $('table#footer_table tr#' + id).remove();

                    }
                }

            })



        }

    }





    $(document).ready(function() {
        CKEDITOR.replace('part_two_descreption', {
            filebrowserUploadUrl: "{{ route('uploadckeditorimage', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    });



    $(document).ready(function() {
        CKEDITOR.replace('module_description', {
            filebrowserUploadUrl: "{{ route('uploadckeditorimage', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });
    });






    function home_product_link_image(id) {
        var con = confirm("Are you sure want to delete ?");
        if (con == true) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/myadm/home-product-link-mannage-image/delete',

                data: 'id=' + id,
                success: function(data) {

                    if (data.sucess == 'deleted') {

                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'manage events',
                            body: data.sucess
                        })

                        $("#image_id_of_home").html(' ')


                    }
                }


            })



        }


    }



    function homeproduct_data_delete(id) {
        var con = confirm("Are you sure want to delete ?");
        if (con == true) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/myadm/homeproduct_data_delete/Delete',
                data: 'id=' + id,
                success: function(data) {
                    if (data.sucess == 'deleted') {
                        $('table#home_product_link_table tr#' + id).remove();


                    }
                }

            })



        }

    }




    custome_cms('part_one_title')
    custome_cms('banner_image_description')
    custome_cms('main_description')
    custome_cms('main_title')


    
    $(document).ready(function() {
        $('#mannage_module_table').DataTable();
        $('#mannage_module_table_config').DataTable();
        $('#home_product_link_table').DataTable();



    });




    

    function home_product_link_image(id) {
        var con = confirm("Are you sure want to delete ?");
        if (con == true) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/myadm/footer-widget-one-mannage-image/delete',

                data: 'id=' + id,
                success: function(data) {

                    if (data.sucess == 'deleted') {

                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'manage events',
                            body: data.sucess
                        })


                        $("#image_id_of_home").html(' ')


                    }
                }


            })



        }


    }











    function footer_widget_one_delete(id) {
        var con = confirm("Are you sure want to delete ?");
        if (con == true) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'post',
                url: '/myadm/footer_widget_one_delete/Delete',
                data: 'id=' + id,
                success: function(data) {
                    if (data.sucess == 'deleted') {
                        $('table#footer_widget_one_table tr#' + id).remove();


                    }
                }

            })



        }

    }










</script>
