@extends('liteadmin.layout')
<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('Product-link','active')
@section('pagetitle','manage Product part three')

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
                       <a href="{{ url('myadm/mannage_part_two_title') }}">
                        <button type="button" class="btn btn-block bg-gradient-success">Add  title <i class="fas fa-plus-circle"></i></button>
                       </a>
                     </div>

                     <div class="col-sm-3 col-xs-12 col-lg-3">
                        <a href="{{ url('myadm/mannage_part_two_content') }}">
                         <button type="button" class="btn btn-block bg-gradient-success">Add content <i class="fas fa-plus-circle"></i></button>
                        </a>
                      </div>
                    </div>


                    </div>


                </div>
                <!-- /.card-header -->


                <div class="row">
                    <div class="col-md-12">



                <div class="card-body">
                    <table class="table table-bordered table-hover"  id="part_two_table">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>menu id</th>

                          <th>part one title</th>



                          <th>Action</th>
                            </tr>

                        </thead>

                      <tbody>


                        @foreach ($part_two_main_titles as $schldata )

                        <tr id="{{ $schldata ->id }}">
                            <td>{{ $schldata ->id }}</td>

                            <td>{{ $schldata ->menu_id }}</td>

                            <td>{{ $schldata ->main_title }}</td>

                            <td>

                                <a href="{{ url('myadm/mannage_part_two_title/'.$schldata->id) }}"><button type="button" class="btn btn btn-info btn-sm">Edit</button></a>

                                @if ($schldata->status==1)

                                <a href="{{ url('/myadm/mannage_part_two_title/stetus/0/'.$schldata->id) }}"><button type="button" class="btn btn btn-success btn-sm">Active</button></a>

                                @else
                                <a href="{{ url('/myadm/mannage_part_two_title/stetus/1/'.$schldata->id) }}"><button type="button" class="btn btn btn-danger btn-sm">Deactivate</button></a>

                                @endif

                                    <button type="button" onclick='mannage_part_two_title_delete("{{ $schldata->id }}")'  class="btn btn btn-danger btn-sm">Delete</button>

                            </td>

                        </tr>
                        @endforeach





                        </tbody>
                    </table>
                  </div>
                </div>

                  <div class="col-md-12">

                    <div class="card-body">
                        <table class="table table-bordered table-hover"  id="mannage_part_two_content_table">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>title id</th>

                              <th>part one title</th>



                              <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>



                                @foreach ($part_two_data as $schldata )

                                <tr id="{{ $schldata ->id }}">
                                    <td>{{ $schldata ->id }}</td>

                                    <td>{{ $schldata ->main_title_id }}</td>

                                    <td>{{ $schldata ->ref_title }}</td>

                                    <td>

                                        <a href="{{ url('myadm/mannage_part_two_content/'.$schldata->id) }}"><button type="button" class="btn btn btn-info btn-sm">Edit</button></a>

                                        @if ($schldata->status==1)

                                        <a href="{{ url('/myadm/mannage_part_two_content/stetus/0/'.$schldata->id) }}"><button type="button" class="btn btn btn-success btn-sm">Active</button></a>

                                        @else
                                        <a href="{{ url('/myadm/mannage_part_two_content/stetus/1/'.$schldata->id) }}"><button type="button" class="btn btn btn-danger btn-sm">Deactivate</button></a>

                                        @endif

                                            <button type="button" onclick='mannage_part_two_content_delete("{{ $schldata->id }}")'  class="btn btn btn-danger btn-sm">Delete</button>

                                    </td>

                                </tr>
                                @endforeach




                            </tbody>
                        </table>
                      </div>






                  </div>




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

