@extends('liteadmin.layout')
<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('Banner-link','active')
@section('pagetitle','Banners')

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->


    <section class="content">

        <div class="container-fluid">

            @if (session()->has('msg'))

            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Banner status</h5>
                {{ session('msg') }}
              </div>
              @endif




          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                <div class="col-sm-3 col-xs-12 col-lg-3">
                   <a href="{{ url('myadm/mannagebanner') }}">
                    <button type="button" class="btn btn-block bg-gradient-success">Add Banner <i class="fas fa-plus-circle"></i></button>
                   </a>
                 </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table  class="table table-bordered table-hover" id="menutable">
                    <thead>
                    <tr>
                      <th>Id</th>
                      <th>banner image</th>
                      <th>Menu </th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($banners as $bannerdetrails )

                        <tr id="{{ $bannerdetrails->id }}">
                            <td>{{ $bannerdetrails->id }}</td>
                            <td><img src="{{ url('storage/media/'.$bannerdetrails->banner_image ) }}" width="100"></td>
                            <td>{{ $bannerdetrails->menu_id }}</td>
                            <td>

                                <a href="{{ url('myadm/mannagebanner/'.$bannerdetrails->id) }}"><button type="button" class="btn btn btn-outline-info btn-sm">Edit</button></a>

                                @if ($bannerdetrails->status==1)

                                <a href="{{ url('myadm/mannagebanner/stetus/0/'.$bannerdetrails->id) }}"><button type="button" class="btn btn btn-outline-success btn-sm">Active</button></a>

                                @else
                                <a href="{{ url('myadm/mannagebanner/stetus/1/'.$bannerdetrails->id) }}"><button type="button" class="btn btn btn-outline-danger btn-sm">Deactivate</button></a>

                                @endif

                                    <button type="button" onclick='bannerdelete("{{ $bannerdetrails->id }}")'  class="btn btn btn-outline-danger btn-sm">Delete</button>

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
