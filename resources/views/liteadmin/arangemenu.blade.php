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




                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form id="alignemtformdata">
                        @csrf
                  <table  class="table table-bordered table-hover" id="menutable">
                    <thead>
                    <tr>
                      <th>Id</th>
                      <th>Menu</th>
                      <th>Value</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($menu as $menudata )
                            <tr>
                            <td><input type="text" value="{{ $menudata->id }}" name="menuid[]" readonly></td>
                            <td>{{ $menudata->menu }}</td>
                            @php
                                if(!empty($menudata->alinement)){
                                    $elamain = $menudata->alinement;
                                }else {
                                    $elamain = '';
                                }
                            @endphp
                            <td><input type="number" name="alinement[]" value="{{ $elamain }}"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-block bg-gradient-primary btn-lg">Update</button>

                </form>

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
