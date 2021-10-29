@extends('liteadmin.layout')
@section('pagetitle','video gallery')


@section('Gallery-link','active')

@section('content')


<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
<div class="col-12">
    <div class="card card-primary">
      <div class="card-header">
        <h4 class="card-title">{{ $menu[0]->menu }}</h4>
      </div>
      <div class="card-body">
        <div class="row">



            @foreach ($phoos as $pics)
        <div class="col-sm-2" id="{{  $pics->id }}">
            <a href="{{ url('storage/media/'.$pics->file_name) }}" data-toggle="lightbox" data-title="sample 1 - white" data-gallery="gallery">
              <video height="100" width="200">
                <source src="{{ url('storage/media/'.$pics->file_name)}}" >
                </video>
            </a>

            <div class="btn-group btn-group-sm">
                <a href="{{ url('myadm/addmenu/edit_vod/'.$pics->id) }}"  class="btn btn-info"><i class="fas fa-edit"></i></a>
                <a href="#" onclick='deletlesinglevideo("{{  $pics->id }}")' class="btn btn-danger"><i class="fas fa-trash"></i></a>
              </div>

        </div>
    @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</section>
</div>





@endsection
