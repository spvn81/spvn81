@extends('liteadmin.layout')
<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('Product-link', 'active')
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
                                    <div class="col-sm-3 col-xs-12 col-lg-3">
                                        <a href="{{ url('myadm/mannage_Product_partone') }}">
                                            <button type="button" class="btn btn-block bg-gradient-success">Add product one
                                                <i class="fas fa-plus-circle"></i></button>
                                        </a>
                                    </div>


                                </div>


                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover" id="part_one_table">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>menu id</th>

                                            <th>part one title</th>



                                            <th>Action</th>
                                        </tr>
                                    </thead>




                                    <tbody>


                                        @foreach ($product_part_one as $schldata)

                                            <tr id="{{ $schldata->id }}">
                                                <td>{{ $schldata->id }}</td>

                                                <td>{{ $schldata->menu_id }}</td>

                                                <td>{!! $schldata->part_one_title !!}</td>

                                                <td>

                                                    <a href="{{ url('myadm/mannage_Product_partone/' . $schldata->id) }}"><button
                                                            type="button"
                                                            class="btn btn btn-outline-info btn-sm">Edit</button></a>

                                                    @if ($schldata->status == 1)

                                                        <a
                                                            href="{{ url('/myadm/mannage_Product_partone/stetus/0/' . $schldata->id) }}"><button
                                                                type="button"
                                                                class="btn btn btn-outline-success btn-sm">Active</button></a>

                                                    @else
                                                        <a
                                                            href="{{ url('/myadm/mannage_Product_partone/stetus/1/' . $schldata->id) }}"><button
                                                                type="button"
                                                                class="btn btn btn-outline-danger btn-sm">Deactivate</button></a>

                                                    @endif

                                                    <button type="button" onclick='part_one_delete("{{ $schldata->id }}")'
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
