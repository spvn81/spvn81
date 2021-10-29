@extends('liteadmin.layout')
<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('home-link','active')
@section('pagetitle','manage events')

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

                        <div class="col-sm-3 col-xs-12 col-lg-3">
                       <a href="{{ url('myadm/footer-address/mannage-footer-address') }}">
                        <button type="button" class="btn btn-block bg-gradient-success">Add Event <i class="fas fa-plus-circle"></i></button>
                       </a>
                     </div>


                    </div>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover"  id="footer_table">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>country</th>

                          <th>state</th>

                          <th>city</th>

                          <th>line one</th>
                          <th>zip</th>

                          <th>Action</th>
                            </tr>







                      </thead>
                      <tbody>


                        
                        @foreach ($addres as $address_data )
                        <tr id="{{  $address_data->id }}">
                          <td>{{ $address_data->id }}</td>
                          <td>{{ $address_data->country }}</td>
                          <td>{{ $address_data->state }}</td>
                          <td>{{ $address_data->city }}</td>
                          <td>{{ $address_data->line_one }}</td>
                          <td>{{ $address_data->zip }}</td>
                    
                          <td>
                            <a href="{{ url('myadm/footer-address/mannage-footer-address/'.$address_data->id) }}"><button class="btn btn-info btn-sm" ><i class="fas fa-pen"></i> Edit</button></a>
                            <button onclick='deleteFooter_Address("{{ $address_data->id }}")' class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i> Delete</button>
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

