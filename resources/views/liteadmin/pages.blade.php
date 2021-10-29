@extends('liteadmin.layout')
<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('pages-link','active')
@section('pagetitle','web pages')

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
                  <table  class="table table-bordered table-hover" id="pages_table">
                    <thead>
                    <tr>
                      <th>Id</th>
                      <th>Menu</th>
                      <th>Menu Type</th>
                      <th>title</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                            @foreach ($getdata as $mdata )

                        <tr id="{{ $mdata->id  }}">
                            <td>{{  $mdata->id }}</td>
                            <td>{{  $mdata->menu }}</td>
                            <td>{{  $mdata->menu_type }}</td>
                            <td>{{  $mdata->title }}</td>
                            <td>

                                @php
                                     $encurl = urlencode($mdata->menu_slug);

                                    $urlstrre = str_replace('+','-',$encurl);
                                @endphp
                                <a href="{{ url(''.$urlstrre ) }}" target="_blank">
                                <button type="button" class="btn  bg-gradient-primary btn-sm"><i class="fas fa-eye"></i> View</button>
                            </a>

                                <button type="button" onclick='page_delete("{{ $mdata->id }}")'  class="btn btn btn-outline-danger btn-sm">Delete</button>


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
