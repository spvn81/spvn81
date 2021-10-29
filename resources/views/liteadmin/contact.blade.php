@extends('liteadmin.layout')
<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('ContactUs-link','active')
@section('pagetitle','Contact us')

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
                    <table class="table table-bordered table-hover"  id="contact">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>full name</th>
                          <th>mobile</th>
                          <th>email</th>
                          <th>subject</th>
                          <th>Action</th>

                        </tr>




                      </thead>
                      <tbody>



                        @foreach ($contactUs as $conctdata )


                        @php
                            if($conctdata->readstatus==0){
                                $readstetus = "font-weight-bold";
                            }else {
                                $readstetus = "";
                            }

                        @endphp


                        <tr class="{{ $readstetus }} {{ $conctdata->id }}" data-widget="expandable-table" id="{{ $conctdata->id }}" aria-expanded="false"  onclick='viewmessage("{{ $conctdata->id }}")'>
                          <td>{{ $conctdata->id }}</td>
                          <td>{{ $conctdata->fullname }}</td>
                          <td>{{ $conctdata->mobile }}</td>
                          <td>{{ $conctdata->email }}</td>
                          <td>{{ $conctdata->subject }}</td>
                          <td><button class="btn btn-danger btn-sm" onclick='deleteuserinquery("{{ $conctdata->id }}")' ><i class="fas fa-trash"></i>Delete</button>
                    </td>

                        </tr>

                        <tr class="expandable-body d-none {{ $conctdata->id }}"  >
                            <td colspan="5">
                              <p style="display: none;">
                                  {{ $conctdata->msg }}
                              </p>
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
