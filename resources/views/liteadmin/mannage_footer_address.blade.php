@extends('liteadmin.layout')
@section('pagetitle','manage banner')



@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>mannage footer address</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">mannage footer address</li>
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
                <h3 class="card-title">mannage part two title</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data"  id="mannage_footer_address_form_data">
                @csrf
                <div class="card-body">
                        <div class="row">



                          <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="menu">title</label>
                                <input type="text" class="form-control" id="country" value="{{ $title }}" name="title"
                                placeholder="Enter title">
                              </div>
                            </div>


            <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="menu">country</label>
                            <input type="text" class="form-control" id="country" value="{{ $country }}" name="country"
                            placeholder="Enter country">
                          </div>
                        </div>


                        
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label for="menu">state</label>
                    <input type="text" class="form-control" id="state" value="{{ $state }}" name="state"
                    placeholder="Enter state">
                  </div>
                </div>



                
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label for="menu">city</label>
                    <input type="text" class="form-control" id="city" value="{{ $city }}" name="city"
                    placeholder="Enter city">
                  </div>
                </div>



                
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label for="menu">line one</label>
                    <input type="text" class="form-control" id="line_one" value="{{ $line_one }}" name="line_one"
                    placeholder="Enter line one">
                  </div>
                </div>



                
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label for="menu"> line tw</label>
                    <input type="text" class="form-control" id="line_two" value="{{ $line_two }}" name="line_two"
                    placeholder="Enter line two">
                  </div>
                </div>



                
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label for="menu">line three</label>
                    <input type="text" class="form-control" id="line_three" value="{{ $line_three }}" name="line_three"
                    placeholder="Enter line three">
                  </div>
                </div>


                
            <div class="col-md-4 col-sm-12">
                <div class="form-group">
                    <label for="menu">zip</label>
                    <input type="text" class="form-control" id="zip" value="{{ $zip }}" name="zip"
                    placeholder="Enter zip">
                  </div>
                </div>

                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label for="menu">email</label>
                        <input type="text" class="form-control" id="email" value="{{ $email }}" name="email"
                        placeholder="Enter email">
                      </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group">
                            <label for="menu">phone</label>
                            <input type="text" class="form-control" id="phone" value="{{ $phone }}" name="phone"
                            placeholder="Enter phone">
                          </div>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="menu">land line</label>
                                <input type="text" class="form-control" id="land_line" value="{{ $land_line }}" name="land_line"
                                placeholder="Enter land line">
                              </div>
                            </div>

                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label for="menu">google map</label>
                                    <input type="text" class="form-control" id="google_map" value="{{ $google_map }}" name="google_map"
                                    placeholder="Enter google map link">
                                  </div>
                                </div>
            
                 

                 

                    <input type="hidden" value="{{ $id }}" name="id">

                </div>
                <div class="card-footer">
                    <button type="submit"  id="mannage_part_two_title_btn" class="btn btn-primary">Save</button>
              </div>

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
