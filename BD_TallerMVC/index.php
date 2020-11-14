<?php
session_start();
if (isset($_SESSION['login']) && isset($_SESSION['Admin']) && $_SESSION['Admin'] == true) {
    header('Location: Views/Admin/main.php');
} elseif (isset($_SESSION['login']) && $_SESSION['login'] != '') {
    header('Location: Views/prestamos.php');
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700i,900|Roboto&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/jquery.fancybox.min.css">
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/aos.css">
        <!-- MAIN CSS -->
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" id="container-page-registration">

        <div class="site-wrap" id="home-section">

            <header class="site-navbar site-navbar-target bg-white" role="banner">
                <div class="container">
                    <div class="row align-items-center position-relative">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4 text-center">
                            <div class="site-logo"><img src="images/logo.jpg"></div>
                        </div>
                        <div class="col-lg-4"></div>
                    </div>
                </div>
            </header>

            <div class="owl-carousel-wrapper">

                <div class="box-92819 shadow-lg" style="background: #16181b; border-radius: 20px;">
                    <div id="container-form">
                        <p style="color:#fff" class="text-center lead">Bienvenidos al Sistema<br>de prestamos del Iser</p>
                        <br>
                        <form action="Controller/Controlador.php?accion=login"  method="POST" class="FormCatElec" name="formLogin">
                            <div class="form-group">
                                <label style="color:#fff;">Nombre</label>
                                <label id="error_user" style="color: red"></label>
                                <input type="text" onclick="limpia_user();" class="form-control" name="user" placeholder="Escribe tu nombre"/>
                            </div>
                            <div class="form-group">
                                <label style="color:#fff;">Contraseña</label>
                                <label id="error_pass" style="color: red"></label>
                                <input type="password" onclick="limpia_pass();" class="form-control" name="pass" placeholder="Escribe tu contraseña" />
                            </div>
                            <div class="modal-footer">
                                <button type="submit" onclick="return Validar();" class="btn btn-primary btn-sm">Iniciar sesión</button>
                            </div>
                        </form>
                    </div> 
                </div>

                <div class="owl-carousel owl-1 ">
                    <div class="ftco-cover-1" style="background-image: url('images/img1.jpg');"></div>
                    <div class="ftco-cover-1" style="background-image: url('images/img2.jpg');"></div>
                    <div class="ftco-cover-1" style="background-image: url('images/img3.jpg');"></div>

                </div>
            </div> 

            <script src="js/jquery-3.3.1.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/owl.carousel.min.js"></script>
            <script src="js/jquery.sticky.js"></script>
            <script src="js/jquery.waypoints.min.js"></script>
            <script src="js/jquery.animateNumber.min.js"></script>
            <script src="js/jquery.fancybox.min.js"></script>
            <script src="js/jquery.easing.1.3.js"></script>
            <script src="js/aos.js"></script>

            <script src="js/main.js"></script>
        </div>

        <script type="text/javascript">
            
            function Validar(){
                if (!validar_pass() || !validar_user()) {
                    validar_user();
                    validar_pass(); 
                    
                    return false;
                }
                return true;
            }
            
            function validar_user(){
                var user = document.formLogin.user.value;
                var error = document.getElementById("error_user");
                var valida = /^[A-Za-z]{1,25}/;
                
                if (user === "") {
                    error.textContent = "Digite un Usuario";
                    return false;
                }
                if (user.length > 25) {
                    error.textContent = "Caracteres permitidos(25)";
                    return false;
                }
                if (!valida.test(user)) {
                    error.textContent = "Solo puede contener lestras";
                    return false;
                }
                return true;
            }
            
            function validar_pass(){
                var pass = document.formLogin.pass.value;
                var error = document.getElementById("error_pass");
                var valida = /^[0-9]{1,25}/;
                
                if (pass === "") {
                    error.textContent = "Digite una contraseña";
                    return false;
                }
                if (pass.length > 25) {
                    error.textContent = "Caracteres permitidos(25)";
                    return false;
                }
                if (!valida.test(pass)) {
                    error.textContent = "Solo puede contener numeros";
                    return false;
                }
                return true;
            }
            
            function limpia_user(){
                var borrar = document.getElementById("error_user");
                borrar.textContent = "";
            }
            
            function limpia_pass(){
                var borrar = document.getElementById("error_pass");
                borrar.textContent = "";
            }
            
        </script>

    </body>

</html>