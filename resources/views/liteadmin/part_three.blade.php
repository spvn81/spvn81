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
                       <a href="{{ url('myadm/mannage_features_image_n_title') }}">
                        <button type="button" class="btn btn-block bg-gradient-success">Add key features img & title <i class="fas fa-plus-circle"></i></button>
                       </a>
                     </div>

                     <div class="col-sm-3 col-xs-12 col-lg-3">
                        <a href="{{ url('myadm/mannage_features') }}">
                         <button type="button" class="btn btn-block bg-gradient-success">Add key features <i class="fas fa-plus-circle"></i></button>
                        </a>
                      </div>
                    </div>


                    </div>


                </div>
                <!-- /.card-header -->


                <div class="row">
                    <div class="col-md-12">



                <div class="card-body">
                    <table class="table table-bordered table-hover"  id="part_one_table">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>menu id</th>

                          <th>part one title</th>



                          <th>Action</th>
                            </tr>

                        </thead>

                      <tbody>
                            @foreach ($part_three as $schldata )

                            <tr id="{{ $schldata ->id }}">
                                <td>{{ $schldata ->id }}</td>

                                <td>{{ $schldata ->menu_id }}</td>

                                <td>{{ $schldata ->title }}</td>

                                <td>

                                    <a href="{{ url('myadm/mannage_features_image_n_title/'.$schldata->id) }}"><button type="button" class="btn btn btn-info btn-sm">Edit</button></a>

                                    @if ($schldata->status==1)

                                    <a href="{{ url('/myadm/mannage_features_image_n_title/stetus/0/'.$schldata->id) }}"><button type="button" class="btn btn btn-success btn-sm">Active</button></a>

                                    @else
                                    <a href="{{ url('/myadm/mannage_features_image_n_title/stetus/1/'.$schldata->id) }}"><button type="button" class="btn btn btn-danger btn-sm">Deactivate</button></a>

                                    @endif

                                        <button type="button" onclick='mannage_features_image_n_title_delete("{{ $schldata->id }}")'  class="btn btn btn-danger btn-sm">Delete</button>

                                </td>

                            </tr>
                            @endforeach



                        </tbody>
                    </table>
                  </div>
                </div>

                  <div class="col-md-12">

                    <div class="card-body">
                        <table class="table table-bordered table-hover"  id="part_three_kay_features_table">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>menu id</th>

                              <th>part one title</th>

                              <th>alignment</th>


                              <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($part_three_kay_features as $schldata )

                                <tr id="{{ $schldata ->id }}">
                                    <td>{{ $schldata ->id }}</td>

                                    <td>{{ $schldata ->title_id }}</td>

                                    <td>{{ $schldata ->kay_feature }}</td>
                                    <td>{{ $schldata ->alignment }}</td>

                                    <td>

                                        <a href="{{ url('myadm/mannage_features/'.$schldata->id) }}"><button type="button" class="btn btn btn-info btn-sm">Edit</button></a>

                                        @if ($schldata->status==1)

                                        <a href="{{ url('/myadm/part_three/stetus/0/'.$schldata->id) }}"><button type="button" class="btn btn btn-success btn-sm">Active</button></a>

                                        @else
                                        <a href="{{ url('/myadm/part_three/stetus/1/'.$schldata->id) }}"><button type="button" class="btn btn btn-danger btn-sm">Deactivate</button></a>

                                        @endif

                                            <button type="button" onclick='part_three_delete_kay_feature("{{ $schldata->id }}")'  class="btn btn btn-danger btn-sm">Delete</button>

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

