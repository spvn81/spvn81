@extends('liteadmin.layout')
@section('pagetitle','site details')


@section('sitedetails-link','active')

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
                    <h3 class="card-title  text-uppercase">site details</h3>

                </div>



    <form id="moel_box_data" enctype="multipart/form-data">
      <div class="card-body text-uppercase">
        @csrf


        <input type="hidden" name="id" value="{{ $id }}">

        <div class="form-group">
            <label for="exampleInputEmail1">title</label>
            <input type="text" name="title"  class="form-control"  value="{{ $title }}"  placeholder="Enter title">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Descreption</label>
            <input type="text" name="descreption"  class="form-control" value="{{ $descreption }}"   placeholder="Enter website name">
          </div>




          <div class="form-group">
            <label for="exampleInputFile">model image</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="model_image" id="exampleInputFile">
                <label class="custom-file-label" for="favicon">Choose file</label>
                </div>
            </div>
            @if (!empty($model_image))
            <img src="{{ url('storage/media/'.$model_image) }}" width="100px">
            @endif
          </div>

              <div class="form-group">
            <label for="twitter_link">link</label>
            <input type="text" name="link" value="{{ $link }}"  class="form-control"  placeholder="link">
          </div>

          @php
              if($status==1){

                $checked = "checked";

              }else{
                $checked = '';
              }
          @endphp

          <div class="form-group">
            <label for="enable">Enable</label>
            <input type="checkbox" name="status" value="1"  {{ $checked }} placeholder="link">
          </div>











      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
</div>
</div>
</div>
</div>
</section>
  </div>






@endsection
