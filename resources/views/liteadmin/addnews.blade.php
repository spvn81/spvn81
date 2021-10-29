@extends('liteadmin.layout')
<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('news-link','active')
@section('pagetitle','news')

@section('content')




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>News</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">News</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>




<div class="card-body">
    <form id="news_data" enctype="multipart/form-data">

        @csrf

        <div class="input-group mb-3">
    <div class="col-md-12">
            <select name="menuid"  id="menuidnews" class="form-control" onchange="menuchangefunction(this.value)">
        <option value="">select</option>
        @foreach ($newsdata as $menu )
                <option value="{{ $menu->id }}">{{  $menu->menu }}</option>

        @endforeach

    </select>

        </div>
        </div>

        <div class="input-group mb-3">
            <div class="col-md-12">
              <input class="form-control" placeholder="Enter title" type="text" value="" name="title"></div>
              </div>


              <div class="input-group mb-3">
                <div class="col-md-6">
                    <label>Show in top scrollbar</label>
                  <input   type="checkbox" value="1"  name="is_home_top" ></div>
                  </div>

                  <div class="input-group mb-3">
                    <div class="col-md-6">
                        <label>Show in Latest News</label>
                      <input   type="checkbox"  value="1"  name="is_home"></div>
                      </div>




              <div class="input-group mb-3">
                <div class="col-md-12">
                  <input class="form-control"  type="file" name="news_image"></div>
                  </div>
                  <div class="input-group mb-3">
                    <div class="col-md-3">

                      </div>

              <div class="input-group mb-3">
          <div class="col-md-12">
          <textarea name="description" id="newscontent"></textarea>
          </div>

        </div>
          <div class="input-group mb-3">
              <div class="col-md-12">
          <button type="submit" id="newsdata" class="btn btn-block bg-gradient-success btn-lg">Publish</button>
          </div>
          </div>

    </form>
</div>


  </div>


</div>







@endsection

<script>


    </script>
