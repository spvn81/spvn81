@extends('liteadmin.layout')
<meta name="csrf-token" content="{{ csrf_token() }}" />

@section('pagetitle','CMS')
@section('cms-link','active')
@section('content')





<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>CMS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"  id="menu"></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>




<div class="card-body">
    <form id="cms_data" enctype="multipart/form-data">

        @csrf

        <div class="input-group mb-3">
    <div class="col-md-12" >

            <select name="menuid"  id="menuid"  class="form-control" onchange="menuchangefunction(this.value)">
        <option value="">select</option>
        @foreach ($menudata as $menu )
                <option value="{{ $menu->id }}">{{  $menu->menu }}</option>

        @endforeach

    </select> 

        </div>
        <div class="col-md-12"  id="menuidjs">
        </div>


        </div>
    <div id="content_id"></div>
    <div class="col-md-12" id="menu_type"></div>

    <div class="data_of_manues"></div>
    </form>

  </div>

    <div class="gallerplace"></div>




</div>
<script>



</script>
@endsection



