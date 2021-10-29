@extends('liteadmin.layout')
<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('menu-link','active')
@section('pagetitle','Menu')

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
                   <a href="{{ url('myadm/addmenu/mannagemenu') }}">
                    <button type="button" class="btn btn-block bg-gradient-success">Add Menu <i class="fas fa-plus-circle"></i></button>
                   </a>
                 </div>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table  class="table table-bordered table-hover" id="menutable">
                    <thead>
                    <tr>
                      <th>Id</th>
                      <th>Menu</th>
                      <th>Menu Type</th>
                      <th>Slug</th>
                      <th>Parent Menu</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>


                        @foreach ($menu as $menudetails)

                    <tr id="{{$menudetails->id}}">
                      <td>{{ $menudetails->id }}</td>
                      <td>{{ $menudetails->menu }}</td>
                      <td>{{ $menudetails->menu_type }}</td>
                      <td>{{ $menudetails->menu_slug }}</td>
                      <td>{{ $menudetails->menu_parent_id }}</td>
                      <td>

                        <a href="{{ url('myadm/addmenu/mannagemenu/'.$menudetails->id) }}"><button type="button" class="btn btn btn-outline-info btn-sm">Edit</button></a>

                        @if ($menudetails->status==1)

                        <a href="{{ url('myadm/addmenu/stetus/0/'.$menudetails->id) }}"><button type="button" class="btn btn btn-outline-success btn-sm">Active</button></a>

                        @else
                        <a href="{{ url('myadm/addmenu/stetus/1/'.$menudetails->id) }}"><button type="button" class="btn btn btn-outline-danger btn-sm">Deactivate</button></a>

                        @endif

                            <button type="button" onclick='menudelete("{{ $menudetails->id }}")'  class="btn btn btn-outline-danger btn-sm">Delete</button>

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
