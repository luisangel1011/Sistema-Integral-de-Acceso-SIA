<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InicioSesion</title>

    <link rel="shortcut icon" href="Icons/logo.ico">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="Inicio Sesion">



    <main class="contenido-principal">
        <div class="InicioSesion">
            <div class="logoImg"><img src="Icons/logo.png" class="btnlogoSes" alt="" id="btnlogo"></div>

            <div> <label for=""> Inicio sesion</label></div>
            <div>

                <label for="">Correo</label>
                <input type="email" class="UsuarioSes">
            </div>

            <div>
                <label for="">Contraseña</label>
                <input type="password" class="ContraseñaSes">
            </div>
            <div class="ScanC">
                <label for="" class="btnScanner">Escanear Credencial</label>
            </div>
            <div class="ScanC">
                <label for="" class="btnReconocimiento">Reconocimiento Facial</label>
            </div>
            <div>
                <button class="botonInicioSes">Iniciar Sesion</button>
            </div>
        </div>
    </main>
    <div class="Mensaje">
        <div><i class="fa-solid fa-triangle-exclamation"></i></div>

        <div><label for="" class="txtMensaje">*Poner mensaje*</label></div>
        <div><button class="btnMensaje">Aceptar</button></div>
    </div>

    <footer>
        <div class="footer-content">

            <img src="Icons/Logo.png" alt="SIA Logo" class="btnlogoInd footer-logo">

            <div class="footer-links">
                <a href="Index.php">Inicio</a>
                <a href="#">Acerca de</a>
                <a href="#">Contacto</a>
                <a href="#">Ayuda</a>
            </div>
        </div>
        <div class="copyright">
            © 2025 Instituto Tecnológico Superior de Atlixco - Sistema Integral de Acceso
        </div>
    </footer>

    <script src="js/jquery-3.7.1.min.js"></script>
    <Script src="js/Script.js"></Script>
    <script src="https://kit.fontawesome.com/7e6b5e67cc.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(async function() {
            let Procesos = new ProcesosDeterminados();
            let dato = await Procesos.VerificarSesion()

            if (dato[0] != "undefined") {
                console.log(dato)
                if (dato[1] === "Administrador")
                    Procesos.pagPerfilAdmin();
                else if (dato[1] === "Alumno")
                    Procesos.pagPerfil();
            }
        });
    </script>

</body>

</html>