<!DOCTYPE html>

<html lang="en">

    <head>
        <title>Admin Panel Sepatu Bordir</title>  
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{asset('lte/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('lte/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('lte/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('lte/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{asset('lte/dist/css/skins/skin-blue.min.css')}}">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body id="login">
        <div class="login-box">
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-signin" role="form" method="post" action="<?php echo url('/login'); ?>">
                        <h2 class="form-signin-heading"></h2>
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                            <button class="btn btn-lg btn-danger btn-block" style="background-color:#4F55D9; border-color:#4F55D9" type="submit">Sign in</button>
                        <div class="clearfix" style="margin-top:20px;"></div>
                        <span>Copyright &copy; 2019. Sepatu Bordir<br>All Rights Reserved.</span>
                    </form>
                </div>
            </div>
        </div> <!-- /container -->
    </body>
</html>