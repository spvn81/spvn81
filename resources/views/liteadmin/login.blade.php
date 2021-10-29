@php
$getsiteinformetion = getsiteinformetion();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $getsiteinformetion[0]->title }} | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin_asset/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('admin_asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
    <div id="pagloader"></div>
<div class="login-box" style="margin-top:-10% ">
    @if(!empty($getsiteinformetion))

  <div class="login-logo">

    <img src="{{ url('storage/media/'.$getsiteinformetion[0]->logo)}}" alt=""
    class="brand-image elevation-3" style="opacity: .8" width="200">

  </div>
  @endif

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
        @if (!empty($getsiteinformetion))

      <p class="login-box-msg">{{ $getsiteinformetion[0]->title }}</p>
      @endif

      <form  id="loginform" action="{{ route('login') }}" novalidate="novalidate">
        @csrf
        <span  class="text-danger" id="eamilerr"></span>

        <div class="input-group mb-3">

          <input type="email" name="email" id="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <span  class="text-danger" id="passworerr"></span>

        <div class="input-group mb-3">
          <input type="password" id="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="button" id="loginsubmit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <!-- /.social-auth-links -->

      {{-- <p class="mb-1">
        <a href="/forgot-password">I forgot my password</a>
      </p> --}}


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('admin_asset/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin_asset/dist/js/adminlte.min.js')}}"></script>

<script>
    // login form
    $("#loginsubmit").on('click', function(e){
        e.preventDefault();


        var password = $("#password").val()
        var email = $("#email").val()


    $.ajax({
        type: "post",
        url: '/login',
        data: {
        "_token": "{{ csrf_token() }}",
        "email": email,
        "password": password
    },
    success:function(data){
        if(data.errors){
            console.log(data.errors)
            if(data.errors.email){
                $("#eamilerr").html(data.errors.email)
            }else{
                $("#eamilerr").html('')

            }
            if(data.errors.password){
                $("#passworerr").html(data.errors.password)
            }else{
                $("#passworerr").html('')
            }
        }else{

            $("#eamilerr").html('')
            $("#passworerr").html('')
            if(data.sucess.userlogin=='ok')
            window.location.href='/myadm/dashboard'
        }

    }
});


        })
    </script>



</body>
</html>


