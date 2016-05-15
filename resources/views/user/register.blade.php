<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BowerFi | Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href=" {{ URL::asset('adminLTE-2.3.3/bootstrap/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href=" {{ URL::asset('adminLTE-2.3.3/dist/css/AdminLTE.min.css') }}">
  <!-- iCheck -->
 <link rel="stylesheet" href="{{URL::asset('adminLTE-2.3.3/plugins/iCheck/square/blue.css')}} ">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Bower</b>Fi</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="{{URL::to("register")}}" method="post">
            {!! csrf_field() !!}
          <div class="form-group has-feedback">
            <input type="text" name="name" class="form-control" placeholder="Full name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <div class="error-div">
              <div class="error"><p class="text-red">{{ $errors->first('name') }}</p></div>
            </div>
          </div>
          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <div class="error-div">
              <div class="error"><p class="text-red">{{ $errors->first('email') }}</p></div>
            </div>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <div class="error-div">
              <div class="error"><p class="text-red"> {{ $errors->first('password') }}</p></div>
            </div>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            <div class="error-div">
              <div class="error"><p class="text-red"> {{ $errors->first('confirm_password') }}</p></div>
            </div>
            
          </div>
          <div class="row">
            <div class="col-xs-12">
                
           </div>
          <div class="row">
            
            <!-- /.col -->
            <div class="col-xs-10 col-xs-offset-1 btn-register">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
            
            <!-- /.col -->
          </div>
        </form>

    

    <a href="{{ URL::to('login')}}" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- iCheck -->
<script src="{{ URL::asset('AdminLTE-2.3.3/plugins/jQuery/jQuery-2.2.0.min.js' ) }} "> </script>

<!-- Bootstrap 3.3.6 -->

<script src= "{{URL::asset('AdminLTE-2.3.3/bootstrap/js/bootstrap.min.js')  }} " > </script>

<!-- AdminLTE App -->

<script src="{{URL::asset('AdminLTE-2.3.3/plugins/iCheck/icheck.min.js') }}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
