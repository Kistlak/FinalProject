
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Amazing Cinema Login</title>

    <!-- Bootstrap 3.3.2 -->
    <link href="http://www.soulfy.com/soulfy_admin2/public/vendor/crudbooster/assets/adminlte/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="http://www.soulfy.com/soulfy_admin2/public/vendor/crudbooster/assets/adminlte/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

    <link rel='stylesheet' href='http://www.soulfy.com/soulfy_admin2/public/vendor/crudbooster/assets/css/main.css'/>
    
    <style>
        
      .login-page, .register-page {
          background: #dddddd url('http://www.soulfy.com/soulfy_admin2/public/vendor/crudbooster/assets/bg_blur3.jpg');
          color: #ffffff !important;
          background-repeat: no-repeat;
          background-position: center;
          background-size: cover;
      }
      .login-box, .register-box {
        margin: 2% auto;
      }
      .login-box-body {
        box-shadow: 0px 0px 50px rgba(0,0,0,0.8);              
        background: rgba(255,255,255,0.9);
        color: #666666 !important;
      }
      html,body {
        overflow: hidden;
      }
      
    </style>
    
  </head>

  <body class="login-page">

    <div class="login-box">
        
      <div class="login-logo">
        <a href="{{ route('login') }}">
            <?php 
            $dir_path = "img/logo/";

            if(is_dir($dir_path))
            {
                $files = scandir($dir_path);

                echo "<img src='$dir_path$files[2]' style='max-width: 100%;max-height:170px'>";   
            } 

            ?> 
        </a>
      </div><!-- /.login-logo --> 
      
      <div class="login-box-body">
	  
        <p class='login-box-msg'>Please login to access Admin Panel</p>
        
        <form class="form-horizontal" method="POST" action="{{ route('loginprocess') }}">
	{{ csrf_field() }}	  
          
            <div class="form-group has-feedback">
            <input autocomplete='off'  type="text" class="form-control" name='email' required placeholder="Email"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          
            <div class="form-group has-feedback">
            <input autocomplete='off'  type="password" class="form-control" name='password' required placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
            
          <div style="margin-bottom:10px" class='row'>
            <div class='col-xs-12'>
                <button type="submit" class="btn btn-primary btn-block btn-flat"><i class='fa fa-lock'></i> Login </button>                
            </div>
          </div>       
          
          <div class='row'>
            <div class='col-xs-12' align="center"><p style="padding:10px 0px 10px 0px">Forgot the Password ? 
            <a href='http://www.soulfy.com/soulfy_admin2/public/admin/forgot'>Click here</a>   </p></div>
          </div>
            
            <div class='row'>
            <div class='col-xs-12' align="center"><p style="padding:10px 0px 10px 0px">Want to join with Us ? 
            <a href='{{ route('register') }}'>Create a Account</a>   </p></div>
          </div>
        
        <center>
           <div class="form-group">
                            <div class="col-xs-12">
                        <a href="{{ route('SMLoginGoogle') }}">
                                <img src="img/Other/Google Login.jpg" width="200px" height=""></img>
                                </a>
                        </div>
                            </div>
                        
                        <div class="form-group">
                            <div class="col-xs-12">
                        <a href="{{ route('SMLoginFB') }}">
                                <img src="img/Other/FB Login.jpg" width="200px" height=""></img>
                                </a>
                        </div>
                            </div> 
        </center>
        </form>

      </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->



    <!-- jQuery 2.1.3 -->
    <script src="http://www.soulfy.com/soulfy_admin2/public/vendor/crudbooster/assets/adminlte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="http://www.soulfy.com/soulfy_admin2/public/vendor/crudbooster/assets/adminlte/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
  </body>
</html>