<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        
        #capa {
            display: none;
            z-index: 3;
            position: fixed;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0, 0.8);
        }
    </style>
    <title></title>
  </head>
  <body>
  	<div id="capa">
        <div class="logo">
            <h1 class="biomedicina">Bio-Medicina</h1>
        </div>
        <div class="loader-frame" >
            <div class="loader1" id="loader1"></div>
            <div class="loader2" id="loader2"></div>
        </div> 
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                <div class="account-wall">
                    <img class="profile-img" src="img/user.png" alt="">
                    <center><p id="mensaje" class="mensaje"><br></p></center>
                    <form id="formulario" class="form-signin">
                        <input type="text" class="form-control" id="usuario" placeholder="Digite ID" autofocus required autofocus>
                        <input type="password" class="form-control" id="password" placeholder="Digite Password" required>
                        <input type="button" id="iniciar" class="btn btn-lg btn-primary btn-block" value="Login">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        document.getElementById("iniciar").onclick = function(){
            var user = document.getElementById("usuario");
            var password = document.getElementById("password");
            if(user.value.length>0 && password.value.length>0){
                var data = "login=&user="+user.value+"&password="+password.value;
                ajax("controller/login.php",data, 2, function(){
                    mostrarloader();
                }, function(n){
                    ocultarloader();
                    if(n=='1'){
                        window.location.href='app.php';
                    }else if(n=='0'){
                        user.select();
                        password.value=null;
                        document.getElementById("mensaje").innerHTML="Usuario o contraseña incorrecto";
                    }
                });
            }else{
                user.select();
                document.getElementById("mensaje").innerHTML="No puede haber campos vacios";
            }
        };
         window.onload = function(){
            var data = "isLogin";
            ajax("controller/login.php",data, 2, null, function(n){
                if(n==1){
                    window.location="app.php";
                }
            });
        }

        function mostrarloader(){
            document.getElementById("capa").style.display = "inline";
        }

        function ocultarloader(){
            document.getElementById("capa").style.display = "none";
        }
    </script>
  </body>
  
</html>
