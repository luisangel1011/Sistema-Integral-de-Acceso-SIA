<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="Icons/logo.ico">
</head>

<body class="Inicio Sesion">

    <main class="contenido-principal">
        <div class="FormReg">
            <div class="logoImg"><img src="Icons/logo.png" class="btnlogoSes" alt="" id="btnlogo"></div>
            <div> <label for="">Registro de invitado</label></div>

            <div class="NombreReg"><input type="text" placeholder="Nombre Completo" Class="txtNombreReg" required></div>
            <div class="CorreoReg"><input type="text" placeholder="Correo Electronico" class="txtCorreoReg" required></div>
            <div class="ContraReg"><input type="text" placeholder="Contraseña" class="txtContraReg" required></div>
            <div class="RadGeneroReg">
                <h4>Genero:</h4>

                <label for="">Hombre</label><input type="radio" value="Hombre" name="Genero" class="RadHombreReg">
                <label for="">Mujer</label><input type="radio" value="Mujer" name="Genero" class="RadMujerReg">
            </div>
            <div><button class="btnRegistroReg">Registrarse</button></div>
        </div>
        <div class="Mensaje">
            <div><i class="fa-solid fa-triangle-exclamation"></i></div>

            <div><label for="" class="txtMensaje">*Poner mensaje*</label></div>
            <div><button class="btnMensaje">Aceptar</button></div>
        </div>
    </main>
    <footer>
        <div class="footer-content">

            <img src="Icons/Logo.png" alt="SIA Logo" class="btnlogoInd footer-logo">

            <div class="footer-links">
                <a href="#">Inicio</a>
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
    <script src="js/Script.js"></script>
</body>

</html>