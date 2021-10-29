@extends('liteadmin.layout')
@section('pagetitle','manage menu')



@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Menu</li>
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



                <h3 class="card-title">Manage Menu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data"  id="toppers_school_form_data">
                @csrf
                <div class="card-body">
                        <div class="row">

                    <input type="hidden" class="form-control" id="id" value="{{ $id }}" name="id"">


                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="menu">name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $name }}"placeholder="Enter name">
                          </div>


                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                      <label for="exampleInputFile">File input</label>
                                      <div class="input-group">
                                      <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="image" name="image">
                                  <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                              </div>
                            </div>
                            @if (!empty($image))
                          <img src="{{url('storage/media/'.$image)}}" width="150px" >
                            @endif

                          </div>





                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="menu">marks</label>
                            <input type="text" class="form-control" id="marks" name="marks" value="{{ $marks }}"placeholder="Enter name">
                          </div>


                            </div>


                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="menu">total marks</label>
                            <input type="text" class="form-control" id="total_marks" name="total_marks" value="{{ $total_marks }}"placeholder="Enter name">
                          </div>


                            </div>


                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="menu">alignment</label>
                                    <input type="text" class="form-control" id="alignment" name="alignment" value="{{ $alignment }}"placeholder="Enter name">
                                  </div>


                                    </div>






















                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="mannage_menu" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
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
