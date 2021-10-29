@extends('liteadmin.layout')

@section('pagetitle','Dashboard')

@section('dashboard-link','active')

@section('content')




<div class="content-wrapper">

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $totelpages }}</h3>

                <p>Total pages</p>
              </div>
              <div class="icon">
                <i class="ion-navicon-round"></i>
              </div>
              <a href="{{ url('myadm/addmenu') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $totalvideos }}</h3>

                <p>Total videos</p>
            </div>
              <div class="icon">
                <i class="ion-videocamera"></i>
              </div>
              <a href="{{ url('myadm/video') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $totalimages }}</h3>
            <p>Total images</p>
              </div>
              <div class="icon">
                <i class="ion-images"></i>
              </div>
              <a href="{{ url('myadm/Image') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $news }}</h3>
        <p>News</p>
              </div>
              <div class="icon">
                <i class="ion-compass"></i>
              </div>
              <a href="{{ url('myadm/managenews') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection
