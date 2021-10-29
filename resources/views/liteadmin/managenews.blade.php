@extends('liteadmin.layout')
<meta name="csrf-token" content="{{ csrf_token() }}" />


@section('news-link','active')
@section('pagetitle','manage news')

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




                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-hover"  id="mannagenews">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>News title</th>

                          <th>Status</th>
                            <th>Action</th>
                            </tr>




                      </thead>
                      <tbody>
                          @foreach ($news as $newsdata )


                          <tr id="{{ $newsdata->id }}">
                              <td>{{ $newsdata->id }}</td>
                              <td>{{ $newsdata->news_title }}</td>

                              <td>
                                  @if ($newsdata->status==1)
                                  <button   onclick='newspublishun("{{ $newsdata->id }}")' class="btn btn-success btn-sm" ><i class="fas fa-eye"></i> Published</button>

                                  @else
                                  <button onclick='newspublish("{{ $newsdata->id }}")' class="btn btn-danger btn-sm" ><i class="fas fa-eye"></i> Published</button>

                                  @endif
                                </td>
                              <td>
                                <a href="{{ url('myadm/managenews/edit/'.$newsdata->id) }}"><button class="btn btn-info btn-sm" ><i class="fas fa-pen"></i> Edit</button></a>
                                <button onclick='deletenewsdata("{{ $newsdata->id }}")' class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i> Delete</button>
                              </td>


                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                  </div>
            <!-- /.card-body -->
                </div>
              <!-- /.card -->
        <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->












@endsection

