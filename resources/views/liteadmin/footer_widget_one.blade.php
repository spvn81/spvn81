@extends('liteadmin.layout')
<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('home-link', 'active')
@section('pagetitle', 'Home Section one')

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

                                <div class="col-sm-3 col-xs-12 col-lg-3">
                                    <a href="{{ url('myadm/footer-widget-one-mannage') }}">
                                        <button type="button" class="btn btn-block bg-gradient-success">Add New <i
                                                class="fas fa-plus-circle"></i></button>
                                    </a>
                                </div>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover" id="footer_widget_one_table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>



                                        @foreach ($footerbanner as $footerbanner_data)


                                        <tr id="{{ $footerbanner_data->id }}">
                                            <td>{{ $footerbanner_data->id }}</td>
                                            <td>{!!  $footerbanner_data->main_title !!}</td>


                                                <td>

                                                    <a
                                                        href="{{ url('myadm/footer-widget-one-mannage/' . $footerbanner_data->id) }}"><button
                                                            type="button"
                                                            class="btn btn btn-outline-info btn-sm">Edit</button></a>

                                                    @if ($footerbanner_data->status == 1)

                                                        <a
                                                            href="{{ url('myadm/footer-widget-one-mannage/stetus/0/' . $footerbanner_data->id) }}"><button
                                                                type="button"
                                                                class="btn btn btn-outline-success btn-sm">Active</button></a>

                                                    @else
                                                        <a
                                                            href="{{ url('myadm/footer-widget-one-mannage/stetus/1/' . $footerbanner_data->id) }}"><button
                                                                type="button"
                                                                class="btn btn btn-outline-danger btn-sm">Deactivate</button></a>

                                                    @endif

                                                    <button type="button"
                                                        onclick='footer_widget_one_delete("{{ $footerbanner_data->id }}")'
                                                        class="btn btn btn-outline-danger btn-sm">Delete</button>

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
