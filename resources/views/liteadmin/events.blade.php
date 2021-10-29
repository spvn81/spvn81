@extends('liteadmin.layout')
<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('events-link','active')
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
                       <a href="{{ url('myadm/addevent/mannagevent') }}">
                        <button type="button" class="btn btn-block bg-gradient-success">Add Event <i class="fas fa-plus-circle"></i></button>
                       </a>
                     </div>


                    </div>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover"  id="mannageevents">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>events title</th>

                          <th>event type</th>

                          <th>event start</th>

                          <th>event emd</th>

                          <th>Action</th>
                            </tr>






                      </thead>
                      <tbody>
                          @foreach ($eventsdata as $eventsdata )


                          <tr id="{{ $eventsdata->id }}">
                              <td>{{ $eventsdata->id }}</td>
                              <td>{{ $eventsdata->event_name }}</td>
                              <td>{{ $eventsdata->event_type }}</td>


                              <td>{{ $eventsdata->event_start }}</td>
                              <td>{{ $eventsdata->event_emd }}</td>

                              <td>
                                  @if ($eventsdata->status==1)
                                  <button   onclick='eventspublishun("{{ $eventsdata->id }}")' class="btn btn-success btn-sm" ><i class="fas fa-eye"></i> Published</button>

                                  @else
                                  <button onclick='eventspublish("{{ $eventsdata->id }}")' class="btn btn-danger btn-sm" ><i class="fas fa-eye"></i> Published</button>

                                  @endif
                                </td>
                              <td>
                                <a href="{{ url('myadm/addevent/mannagevent/edit/'.$eventsdata->id) }}"><button class="btn btn-info btn-sm" ><i class="fas fa-pen"></i> Edit</button></a>
                                <button onclick='deleteeventsdata("{{ $eventsdata->id }}")' class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i> Delete</button>
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

