@extends('liteadmin.layout')
<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('home-link','active')
@section('pagetitle','toppers')

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

                    <div class="row">
                    <div class="col-sm-3 col-xs-12 col-lg-3">
                   <a href="{{ url('myadm/addtitle') }}">
                    <button type="button" class="btn btn-block bg-gradient-success">Add Title <i class="fas fa-plus-circle"></i></button>
                   </a>
                 </div>


                 <div class="col-sm-3 col-xs-12 col-lg-3">
                    <a href="{{ url('myadm/manage-toppers') }}">
                     <button type="button" class="btn btn-block bg-gradient-success">Add Toppers <i class="fas fa-plus-circle"></i></button>
                    </a>
                  </div>
                </div>



                </div>


                <div class="card-header">



                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table  class="table table-bordered table-hover" id="toppers_table">
                    <thead>
                    <tr>
                      <th>Id</th>
                      <th>name</th>
                      <th>marks</th>
                      <th>Alignment</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>



                        @foreach ($topper as $schldata )

                        <tr id="{{ $schldata ->id }}">

                            <td>{{ $schldata ->id }}</td>
                            <td>{{ $schldata ->name }}</td>
                            <td>{{ $schldata ->marks }}</td>

                            <td><img src="{{ url('storage/media/'.$schldata ->image) }}"  width="150"></td>
                            <td>

                                <a href="{{ url('myadm/school-toppers-Section/manage/edit/'.$schldata->id) }}"><button type="button" class="btn btn btn-outline-info btn-sm">Edit</button></a>

                                @if ($schldata->status==1)

                                <a href="{{ url('/myadm/school-toppers-Section/stetus/0/'.$schldata->id) }}"><button type="button" class="btn btn btn-outline-success btn-sm">Active</button></a>

                                @else
                                <a href="{{ url('/myadm/school-toppers-Section/stetus/1/'.$schldata->id) }}"><button type="button" class="btn btn btn-outline-danger btn-sm">Deactivate</button></a>

                                @endif

                                    <button type="button" onclick='school_toppers_delete("{{ $schldata->id }}")'  class="btn btn btn-outline-danger btn-sm">Delete</button>

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
