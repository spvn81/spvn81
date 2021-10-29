@extends('liteadmin.layout')
<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('home-link','active')
@section('pagetitle','school management Section')

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
                   <a href="{{ url('myadm/school-management-Section/manage') }}">
                    <button type="button" class="btn btn-block bg-gradient-success">Add new<i class="fas fa-plus-circle"></i></button>
                   </a>
                 </div>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table  class="table table-bordered table-hover" id="management_school">
                    <thead>
                    <tr>
                      <th>Id</th>
                      <th>name</th>
                      <th>designation</th>
                      <th>image</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($mannage_school as $schldata )

                        <tr id="{{ $schldata ->id }}">

                            <td>{{ $schldata ->id }}</td>
                            <td>{{ $schldata ->name }}</td>
                            <td>{{ $schldata ->designation }}</td>

                            <td><img src="{{ url('storage/media/'.$schldata ->image) }}"  width="150"></td>
                            <td>

                                <a href="{{ url('myadm/school-management-Section/manage/edit/'.$schldata->id) }}"><button type="button" class="btn btn btn-outline-info btn-sm">Edit</button></a>

                                @if ($schldata->status==1)

                                <a href="{{ url('/myadm/school-management-Section/stetus/0/'.$schldata->id) }}"><button type="button" class="btn btn btn-outline-success btn-sm">Active</button></a>

                                @else
                                <a href="{{ url('/myadm/school-management-Section/stetus/1/'.$schldata->id) }}"><button type="button" class="btn btn btn-outline-danger btn-sm">Deactivate</button></a>

                                @endif

                                    <button type="button" onclick='school_management_delete("{{ $schldata->id }}")'  class="btn btn btn-outline-danger btn-sm">Delete</button>

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
