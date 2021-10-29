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
                                    <a href="{{ url('myadm/home-product-link-mannage') }}">
                                        <button type="button" class="btn btn-block bg-gradient-success">Add New <i
                                                class="fas fa-plus-circle"></i></button>
                                    </a>
                                </div>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover" id="home_product_link_table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>




                                        @foreach ($homeproduct as $homeproduct_data)

                                            <tr id="{{ $homeproduct_data->id }}">
                                                <td>{{ $homeproduct_data->id }}</td>

                                                <td>{{ $homeproduct_data->title }}</td>
                                                <td>

                                                    <a
                                                        href="{{ url('myadm/home-product-link-mannage/' . $homeproduct_data->id) }}"><button
                                                            type="button"
                                                            class="btn btn btn-outline-info btn-sm">Edit</button></a>

                                                    @if ($homeproduct_data->status == 1)

                                                        <a
                                                            href="{{ url('myadm/home-product-link-mannage/stetus/0/' . $homeproduct_data->id) }}"><button
                                                                type="button"
                                                                class="btn btn btn-outline-success btn-sm">Active</button></a>

                                                    @else
                                                        <a
                                                            href="{{ url('myadm/home-product-link-mannage/stetus/1/' . $homeproduct_data->id) }}"><button
                                                                type="button"
                                                                class="btn btn btn-outline-danger btn-sm">Deactivate</button></a>

                                                    @endif

                                                    <button type="button"
                                                        onclick='homeproduct_data_delete("{{ $homeproduct_data->id }}")'
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
