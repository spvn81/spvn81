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
                                        <a href="{{ url('myadm/config_module_mannage') }}">
                                            <button type="button" class="btn btn-block bg-gradient-success">Config Module <i class="fas fa-plus-circle"></i></button>
                                        </a>
                                    </div>


                              

                                </div>

                                </div>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover" id="mannage_module_table_config">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>module id</th>
                                            <th>feature</th>      
                                            <th>Action</th>
                                        </tr>

                                    </thead>
                                    <tbody>



                                        @foreach ($module_config as $module_data)

                                        <tr id="{{ $module_data->id }}">
                                            <td>{{ $module_data->id }}</td>

                                            <td>{{ $module_data->module_id }}</td>
                                            <td>{{ $module_data->feature }}</td>
                           


                                            <td>

                                                <a href="{{ url('myadm/config_module_mannage/' . $module_data->id) }}"><button
                                                        type="button" class="btn btn btn-info btn-sm">Edit</button></a>

                                                @if ($module_data->status == 1)

                                                    <a
                                                        href="{{ url('/myadm/config_module_mannage/stetus/0/' . $module_data->id) }}"><button
                                                            type="button"
                                                            class="btn btn btn-success btn-sm">Active</button></a>

                                                @else
                                                    <a
                                                        href="{{ url('/myadm/config_module_mannage/stetus/1/' . $module_data->id) }}"><button
                                                            type="button"
                                                            class="btn btn btn-danger btn-sm">Deactivate</button></a>

                                                @endif

                                                <button type="button"
                                                    onclick='module_config_delete("{{ $module_data->id }}")'
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
