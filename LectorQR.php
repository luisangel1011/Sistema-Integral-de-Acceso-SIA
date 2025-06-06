<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lector QR y Código de Barras con ZXing</title>
    <script src="js/Zxing0.21.3.js"></script>
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="Inicio Sesion">

    <main class="contenido-principal">
        <div class="InicioSesion">
            <div class="logoImg"><img src="Icons/logo.png" class="btnlogoSes" alt="" id="btnlogo"></div>
            <div> <label for=""> Inicio sesion</label></div>
            <div> <label>mostrar codigo QR ó de barra</label></div>
            <div><video id="video" autoplay></video> </div>

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
    <Script src="js/Script.js"></Script>
    <script src="https://kit.fontawesome.com/7e6b5e67cc.js" crossorigin="anonymous"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const video = document.getElementById("video");

            const startButton = document.getElementById("btnStartScan");
            const codeReader = new ZXing.BrowserMultiFormatReader();



            video.style.display = "block"; // Mostrar la cámara

            startScanner();


            function startScanner() {
                codeReader.decodeFromVideoDevice(undefined, video, (result, err) => {
                    if (result) {


                        codeReader.reset(); // Detener escaneo después de detectar un código


                        let Usuario = new Usuarios();
                        Usuario.IniciarSesion("", "", result.text.trim());
                        startScanner();
                    }
                    if (err && !(err instanceof ZXing.NotFoundException)) {
                        console.error("Error en la lectura del código:", err);
                    }
                });
            }
        });
    </script>
</body>

</html>