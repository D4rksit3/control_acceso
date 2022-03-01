


<html class="">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <!-- <link href="Admin Acceso MDY PR_files/metro-bootstrap.css" rel="stylesheet">
    <link href="Admin Acceso MDY PR_files/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="Admin Acceso MDY PR_files/datepicker.css" rel="stylesheet" type="text/css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    
    <script src="./Admin Acceso MDY PR_files/bootstrap-datepicker.min.js"></script>
    <link href="./Admin Acceso MDY PR_files/iconFont.css" rel="stylesheet">
    <link href="./Admin Acceso MDY PR_files/docs.css" rel="stylesheet">
    <link href="./Admin Acceso MDY PR_files/prettify.css" rel="stylesheet">

    <!-- Load JavaScript Libraries -->
    <script src="./Admin Acceso MDY PR_files/jquery.min.js"></script>

    
    <script src="./Admin Acceso MDY PR_files/jquery.widget.min.js"></script>
    <script src="./Admin Acceso MDY PR_files/jquery.mousewheel.js"></script>
    <script src="./Admin Acceso MDY PR_files/prettify.js"></script>

    <!-- Metro UI CSS JavaScript plugins -->
    <script src="./Admin Acceso MDY PR_files/load-metro.js"></script>

    <!-- Local JavaScript -->
    <script src="./Admin Acceso MDY PR_files/docs.js"></script>
    <script src="./Admin Acceso MDY PR_files/github.info.js"></script>
    <script src="./Admin Acceso MDY PR_files/metro.min.js"></script>

  </head>
  
  <body>
    <header class="bg-dark" style=" background-image: url(&quot;img_login/cabecera_flash1.gif&quot;);background-size: 220px 100px; background-repeat: no-repeat; height:100px !important; background-color: #92C102; "></header>


  
		<title>Admin Acceso MDY</title>
     
  
    <link rel="stylesheet prefetch" href="style_login/bootstrap.min.css">
    <style class="cp-pen-styles">

      body {
        background: #eee !important;
      }

      .wrapper {
        margin-top: 80px;
        margin-bottom: 80px;
      }

      .form-signin {
        background-image: url("img_login/chica.jpg");
        background-repeat: no-repeat;
        max-width: 380px;
        padding: 15px 35px 45px;
        margin: 0 auto;
        background-color: #92C102;
        border: 1px solid rgba(0, 0, 0, 0.1);
      }
      .form-signin-heading{

        height: 55px;

        /*
          background-image: url("http://158.69.241.104:90/Acceso/content/img/chica.jpg");
          background-color: #92C102;
        */
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 30px;
      }
      .form-signin .checkbox {
        font-weight: normal;
      }
      .form-signin .form-control {
        position: relative;
        font-size: 16px;
        height: auto;
        padding: 10px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }
      .form-signin input[type="text"] {
        margin-bottom: -1px;
        border-bottom-left-radius: 0;
        border-bottom-right-radius: 0;
      }
      .form-signin input[type="password"] {
        margin-bottom: 20px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
    </style>
  
  
    <div class="wrapper">
      <form class="form-signin" action="validar.php" method="POST" CLASS="user">       
        <h2 class="form-signin-heading">  </h2>

        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" required="" =""="">

        <input type="password" class="form-control" name="contraseña" placeholder="Contraseña" required="">  

        <label class="checkbox">

          <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me

        </label>

        <div class="form-group">
          <label for="">Rol</label>
          <select class="form-control" id="cargo" name="cargo" required> 
            <option value = ""></option>
            <option value = "1">Administrador</option>
            <option value = "2">DH</option>
          </select>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   

      </form>
    </div>

  

   <script src="./Admin Acceso MDY PR_files/css_live_reload_init.js"></script>

  


   <div style=" position: absolute; bottom: 0; left: 0; color:cc0; ">MDY Contact Center || Copyright 2022 || Derechos Reservados</div>
  </body>
</html>

