@extends('liteadmin.layout')
<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('home-link','active')
@section('pagetitle','Home Section one')

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
                   <a href="{{ url('myadm/Section-one/mannage') }}">
                    <button type="button" class="btn btn-block bg-gradient-success">Add New <i class="fas fa-plus-circle"></i></button>
                   </a>
                 </div>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table  class="table table-bordered table-hover" id="menutable">
                    <thead>
                    <tr>
                      <th>Id</th>
                      <th>Title</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>


                        @foreach ($homesecone as $home)

                        <tr id="{{ $home->id }}">
                            <td>{{  $home->id }}</td>

                            <td>{{  $home->title }}</td>
                            <td>

                                <a href="{{ url('myadm/Section-one/mannage/'.$home->id) }}"><button type="button" class="btn btn btn-outline-info btn-sm">Edit</button></a>

                                @if ($home->status==1)

                                <a href="{{ url('myadm/Section-one/stetus/0/'.$home->id) }}"><button type="button" class="btn btn btn-outline-success btn-sm">Active</button></a>

                                @else
                                <a href="{{ url('myadm/Section-one/stetus/1/'.$home->id) }}"><button type="button" class="btn btn btn-outline-danger btn-sm">Deactivate</button></a>

                                @endif

                                    <button type="button" onclick='homecectiondelete("{{ $home->id }}")'  class="btn btn btn-outline-danger btn-sm">Delete</button>

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
