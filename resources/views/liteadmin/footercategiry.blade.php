@extends('liteadmin.layout')
<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('home-link','active')
@section('pagetitle','Footer controller')

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
                   <a href="{{ url('myadm/Footer-controller/mannagecategory') }}">
                    <button type="button" class="btn btn-block bg-gradient-success">Add category <i class="fas fa-plus-circle"></i></button>
                   </a>
                 </div>



                 <div class="col-sm-3 col-xs-12 col-lg-3">
                    <a href="{{ url('myadm/Footer-controller/configfooter') }}">
                     <button type="button" class="btn btn-block bg-gradient-success">config footer links <i class="fas fa-plus-circle"></i></button>
                    </a>
                  </div>

                </div>


                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table  class="table table-bordered table-hover" id="menutable_footer">
                    <thead>
                    <tr>
                      <th>Id</th>
                      <th>category </th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($footer_cat as $cat)


                        <tr id="{{ $cat->id }}">
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->category }}</td>
                            <td>
                                <a href="{{ url('myadm/Footer-controller/mannagecategory/'.$cat->id) }}"><button class="btn btn-info btn-sm" ><i class="fas fa-pen"></i> Edit</button></a>
                                <button onclick='deletefootercategory("{{ $cat->id }}")' class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i> Delete</button>
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
