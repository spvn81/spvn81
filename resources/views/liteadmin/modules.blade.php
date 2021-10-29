@extends('liteadmin.layout')
<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('home-link', 'active')
@section('pagetitle', 'manage Product part one')

@section('content')



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">

                                <div class="card-header">
                                  <div class="row">
                                    <div class="col-sm-3 col-xs-12 col-lg-3">
                                        <a href="{{ url('myadm/mannage_module') }}">
                                            <button type="button" class="btn btn-block bg-gradient-success">Create Module <i
                                                    class="fas fa-plus-circle"></i></button>
                                        </a>
                                    </div>


                                    <div class="col-sm-3 col-xs-12 col-lg-3">
                                      <a href="{{ url('myadm/module_config') }}">
                                          <button type="button" class="btn btn-block bg-gradient-success"> config Module <i class="far fa-folder-open"></i></button>
                                      </a>
                                  </div>

                                </div>

                                </div>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover" id="mannage_module_table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>menu id</th>
                                            <th>title</th>
                                            <th>home img</th>
                                            <th>mudule main image</th>
                                            <th>Action</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @foreach ($modules as $module_data)

                                            <tr id="{{ $module_data->id }}">
                                                <td>{{ $module_data->id }}</td>

                                                <td>{{ $module_data->menu_id }}</td>
                                                <td>{{ $module_data->title }}</td>
                                                <td><img src="{{ url('storage/media/' . $module_data->home_img) }}"
                                                        width="50px" height="20px"></td>
                                                <td><img src="{{ url('storage/media/' . $module_data->mudule_main_image) }}"
                                                        width="50px" height="20px"></td>
                                                <td>

                                                    <a href="{{ url('myadm/mannage_module/' . $module_data->id) }}"><button
                                                            type="button" class="btn btn btn-info btn-sm">Edit</button></a>

                                                    @if ($module_data->status == 1)

                                                        <a
                                                            href="{{ url('/myadm/mannage_module/stetus/0/' . $module_data->id) }}"><button
                                                                type="button"
                                                                class="btn btn btn-success btn-sm">Active</button></a>

                                                    @else
                                                        <a
                                                            href="{{ url('/myadm/mannage_module/stetus/1/' . $module_data->id) }}"><button
                                                                type="button"
                                                                class="btn btn btn-danger btn-sm">Deactivate</button></a>

                                                    @endif

                                                    <button type="button"
                                                        onclick='mannage_module_delete("{{ $module_data->id }}")'
                                                        class="btn btn btn-danger btn-sm">Delete</button>

                                                </td>

                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>


                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



@endsection
