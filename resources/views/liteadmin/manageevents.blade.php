@extends('liteadmin.layout')
@section('pagetitle','manage Events')

@section('events-link','active')
<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage Events</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manage Events</li>
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
                <h3 class="card-title">Manage Events</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form enctype="multipart/form-data"  id="mannage_formdata_form_data">
                @csrf
                <div class="card-body text-capitalize">
                        <div class="row">
                            <input type="hidden" name="events_id"  value="{{ $id }}">


                            <div class="input-group mb-3">
                                <div class="col-md-12">
                                        <select name="menuid"  id="menuid" class="form-control">

                                    <option value="">select menu</option>
                                    @foreach ($menu as $menudata )

                                    @php
                                        if ($menu_id == $menudata->id) {
                                           $selccted = "selected";
                                        }else {
                                            $selccted = '';
                                        }
                                    @endphp


                                <option  value="{{ $menudata->id }}" {{ $selccted  }}>{{  $menudata->menu }}</option>

                                    @endforeach

                                </select>

                                    </div>
                                    </div>






                      <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="menu">event name</label>
                            <input type="text" class="form-control" id="event_name" value="{{ $event_name }}" name="event_name"
                            placeholder="Enter event name">
                          </div>
                        </div>


                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="menu">event type</label>
                                <input type="text" class="form-control" id="event_type" value="{{ $event_type }}" name="event_type"
                                placeholder="Enter event type">
                              </div>
                            </div>

                            <div class="col-md-12 col-sm-12">
                                <div class="form-group">
                                    <label for="menu">event duration</label>
                                    <input type="text" class="form-control" id="event_duration" value="{{ $event_duration }}" name="event_duration"
                                    placeholder="event duration">
                                  </div>
                                </div>


                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group">
                                    <label for="event_start">event start</label>
                                    <input type="date" class="form-control" id="event_start" value="{{ $event_start }}" name="event_start">
                                  </div>
                                </div>


                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="event_start">event emd</label>
                                        <input type="date" class="form-control" id="event_emd" value="{{ $event_emd }}" name="event_emd">
                                      </div>
                                    </div>

                                </div>




                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="event_start">event image</label>
                                        <input type="file" class="form-control" id="image"  name="image">
                                        <div id="image_id">
                                        @if (!empty($image))
                                        <img src="{{ url('storage/media/'.$image) }}" width="150">
                                        <a class="btn btn-app bg-danger" onclick='deleteeventimg("{{ $id }}")'>
                                            <i class="fas fa-inbox"></i> Orders
                                          </a>
                                        @endif
                                    </div>

                                      </div>
                                    </div>



                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label for="event_start">descreption</label>
                                            <textarea id="eventscontent" name="eventscontent">{{ $descreption }}</textarea>
                                          </div>
                                        </div>

                                        @php
                                            if($is_home==1){
                                                $is_home_checked = "checked";
                                            }else {
                                                $is_home_checked = '';
                                            }
                                        @endphp
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label for="event_start">Show in home</label>
                                                <input type="checkbox"  id="is_home" value="1" {{ $is_home_checked }} name="is_home">
                                              </div>
                                            </div>

                                            @php
                                            if($is_home_top==1){
                                                $is_home_top_checked = "checked";
                                            }else {
                                                $is_home_top_checked = '';
                                            }
                                        @endphp


                                            <div class="col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label for="event_start">Show in home page top</label>
                                                    <input type="checkbox"  id="is_home_top" value="1" {{ $is_home_top_checked }} name="is_home_top">
                                                  </div>
                                                </div>








                </div>
                <div class="card-footer">
                    <button type="submit"  id="mannage_events_btn" class="btn btn-primary">Save</button>
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
