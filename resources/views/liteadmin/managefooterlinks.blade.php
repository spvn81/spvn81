@extends('liteadmin.layout')
@section('pagetitle','manage footer links')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('home-link','active')


@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage footer links</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage footer links</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->




    <section class="content">
    <div class="container-fluid">
    <div class="row">
          <!-- left column -->
    <div class="col-md-12">
    <div id="sucessdata"></div>


            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Manage footer links</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form   id="mannage_footer_links_form_data">
                @csrf
                <div class="card-body">
                        <div class="row">





                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="menu">Category</label>

                            <select class="form-control" name="catgory_id">
                                <option value="">--Select--</option>

                                @foreach ($categories_footer as $categories_footer_data )


                                <option value="{{ $categories_footer_data->id  }}" >{{ $categories_footer_data->category }}</option>
                                @endforeach


                            </select>
                          </div>
                    </div>







                    <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label for="menu">Menu</label>

                    <select class="form-control" name="menu_id">
                        <option value="">--Select--</option>

                        @foreach ($menu as $menudata )


                        <option value="{{ $menudata->id }}" >{{ $menudata->menu }}</option>
                        @endforeach


                    </select>
                  </div>
            </div>



                </div>
                <div class="card-footer">
                    <button type="submit"  id="mannage_footer_links" class="btn btn-primary">Save</button>
              </div>

                </div>
              </form>
              </div>
            <!-- /.card -->
        </div>










        <div class="col-12">
            <div class="card">
              <div class="card-header">



              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form id="alignemtformdata_of_footer">
                    @csrf
                <table  class="table table-bordered table-hover" id="footer_link_table">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>catgory</th>
                    <th>Menu</th>
                    <th>menu order</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($footer_links as  $links)

                    <tr id="{{  $links->footer_id  }}">
                        <td><input type="text" value="{{  $links->footer_id }}"  name="footer_id[]" readonly></td>
                        <td>{{  $links->category }}</td>
                        <td>{{  $links->menu }}</td>
                         <td><input type="number" name="menu_order_footer[]" value="{{ $links->menu_order }}"></td>

                        <td>
                            <button onclick='delarefooterlinks("{{ $links->footer_id }}")' class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i> Delete</button>

                        </td>
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
















        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection
