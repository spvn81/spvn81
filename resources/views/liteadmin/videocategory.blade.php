@extends('liteadmin.layout')
@section('pagetitle','video gallery')


@section('Gallery-link','active')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>video gallery</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('myadm/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">video gallery</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">





        <div class="card card-success">
          <div class="card-body">
            <div class="row">

                    @foreach ($gallery as $gthumbneal )

              <div class="col-md-12 col-lg-6 col-xl-4" id="{{ $gthumbneal->id }}">

                <div class="card mb-2">
                    @if (!empty($gthumbneal->menu_image))

                    <img class="card-img-top" style="height: 300px" src="{{ url('storage/media/'.$gthumbneal->menu_image) }}" alt="Dist Photo 3" >
                </a>

                    @else
                    <img class="card-img-top"  style="height: 300px" src="{{ asset('admin_asset/dist/img/no-thumbnail.jpg') }}" alt="Dist Photo 3">

                    @endif

                  <div class="card-img-overlay">
                    <h5 class="card-title text-light"><b>{{ $gthumbneal->menu }}</b></h5>
                    <p class="card-text pb-1 pt-1 text-white">
                        <b>
                    <a href="#" class="text-light">Last update {{ $gthumbneal->updated_at }}
                    </b>
                    </a>
                </div>

                <div class="row">
                    <a class="btn btn-app bg-success" href="{{ url('myadm/addmenu/viewvideo/'.$gthumbneal->id) }}">
                        <i class="fas fa-eye"></i> View
                      </a>


                  <a class="btn btn-app bg-info" href="{{ url('myadm/addmenu/mannagemenu/'.$gthumbneal->id) }}">
                    <i class="fas fa-edit"></i> Edit
                  </a>
                  <a class="btn btn-app bg-danger" onclick='videocategorydelete("{{ $gthumbneal->id }}")'>
                    <i class="fas fa-trash"></i> Delete
                  </a>

                </div>
                </div>
              </div>

              @endforeach








            </div>
          </div>
        </div>





      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
  <!-- /.content-wrapper -->




@endsection
