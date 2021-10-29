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



    <form id="site_details" enctype="multipart/form-data">
      <div class="card-body text-uppercase">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">title</label>
          <input type="text" class="form-control" name="title" value="{{ $title }}"  placeholder="Enter title">
        </div>
        <input type="hidden" name="id" value="{{ $id }}">


        <div class="form-group">
            <label for="exampleInputEmail1">subtitle</label>
            <input type="text" name="subtitle" value="{{ $subtitle }}" class="form-control"  placeholder="Enter subtitle">
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">website name</label>
            <input type="text" name="website_name" value="{{ $website_name }}" class="form-control"  placeholder="Enter website name">
          </div>



        <div class="form-group">
            <label for="exampleInputFile">favicon</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="favicon" id="exampleInputFile">
                <label class="custom-file-label" for="favicon">Choose file</label>
              </div>
            </div>
            @if (!empty($favicon))
        <img src="{{ url('storage/media/'.$favicon) }}" width="100px">
            @endif

          </div>


          <div class="form-group">
            <label for="exampleInputFile">logo</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="logo" id="exampleInputFile">
                <label class="custom-file-label" for="favicon">Choose file</label>
                </div>
            </div>
            @if (!empty($logo))
            <img src="{{ url('storage/media/'.$logo) }}" width="100px">
            @endif
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" value="{{ $email_id }}" name="email_id"  placeholder="Enter email">
          </div>



          <div class="form-group">
            <label for="phonenumber">phone number</label>
            <input type="text" name="phonenumber"  value="{{ $phonenumber }}" class="form-control"  placeholder="Enter phone number">
          </div>

          <div class="form-group">
            <label for="landlinenumber">landline number</label>
            <input type="text" class="form-control" value="{{ $landlinenumber }}"  name="landlinenumber" placeholder="Enter landline number">
          </div>

          <div class="form-group">
            <label for="address_line_one">address line one</label>
            <input type="text" class="form-control" value="{{ $address_line_one }}" name="address_line_one"  placeholder="Enter address line one">
          </div>

          <div class="form-group">
            <label for="address_line_two">address line two</label>
            <input type="text" class="form-control" value="{{ $address_line_two }}" name="address_line_two"  placeholder="Enter address line two">
          </div>


          <div class="form-group">
            <label for="address_line_three">address line three</label>
            <input type="text" class="form-control" value="{{ $address_line_three }}" name="address_line_three"  placeholder="Enter address line three">
          </div>
        <div class="form-group">
            <label for="youtube_link">youtube link</label>
            <input type="text" name="youtube_link"  value="{{ $youtube_link }}" class="form-control"  placeholder="Enter youtube link">
          </div>

          <div class="form-group">
            <label for="facebook_link">facebook link</label>
            <input type="text" name="facebook_link" value="{{ $facebook_link }}" class="form-control"  placeholder="Enter facebook link">
          </div>

          <div class="form-group">
            <label for="twitter_link">twitter link</label>
            <input type="text" name="twitter_link" value="{{ $twitter_link }}" class="form-control"  placeholder="Enter twitter link">
          </div>


          <div class="form-group">
            <label for="instagram_link">instagram link</label>
            <input type="text" name="instagram_link" value="{{ $instagram_link }}" class="form-control"  placeholder="Enter instagram link">
          </div>


          <div class="form-group">
            <label for="instagram_link">linkedin link</label>
            <input type="text" name="linksind_link" value="{{ $linksind_link }}" class="form-control"  placeholder="Enter linkedin link">
          </div>

          

          <div class="form-group">
            <label for="map_link">map ink</label>
            <input type="text" name="map_link" value="{{ $map_link }}" class="form-control"  placeholder="Enter map link">
          </div>

          <div class="form-group">
            <label for="map_short_link">map  Short ink</label>
            <input type="text" name="map_short_link" value="{{ $map_short_link }}" class="form-control"  placeholder="Enter short map link">
          </div>



          <div class="form-group">
            <label for="about_site_description">about site description</label>
            <textarea name="about_site_description" class="form-control"  placeholder="Enter about site description">{{ $about_site_description }}</textarea>
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
