<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reconocimiento Facial</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        video,
        canvas {
            width: 640px;
            height: 480px;
            height: auto;
            display: block;
            margin: 10px auto;
            border: 2px solid #555;
        }

        button {
            display: block;
            margin: 10px auto;
        }
    </style>

</head>

<body class="Inicio Sesion">



    <main class="contenido-principal">
        <div class="InicioSesion">
            <div class="logoImg"><img src="Icons/logo.png" class="btnlogoSes" alt="" id="btnlogo"></div>
            <div> <label for=""> Inicio sesion</label></div>
            <div> <label>Reconocimiento facial</label></div>

            <video id="video" autoplay></video>
            <canvas id="canvas" width="640" height="480" style="display:none;"></canvas>
            <button id="capturar">Capturar y Enviar</button>




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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let Procesos = new ProcesosDeterminados();
        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const resultado = document.getElementById('resultado');

        // Activar la cámara con resolución alta
        navigator.mediaDevices.getUserMedia({
                video: {
                    width: 640,
                    height: 480
                }
            })
            .then(stream => {
                video.srcObject = stream;
            })
            .catch(err => {
                alert("Error accediendo a la cámara: " + err);
            });

        // Capturar imagen y enviarla por jQuery
        $('#capturar').on('click', function() {
            const ctx = canvas.getContext('2d');
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

            canvas.toBlob(function(blob) {
                const formData = new FormData();
                formData.append('file', blob, 'captura.jpg');

                $.ajax({
                    //https://192.168.60.110
                    //https://192.168.1.200:8443
                    url: 'https://192.168.60.110:8443/verificar/', // ⚠️ usa tu IP real aquí
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        let Usuario = new Usuarios();
                        Usuario.IniciarSesion("", "", data.resultado);

                    },
                    error: function() {
                        Procesos.MostrarAlerta("'❌ Error al enviar la imagen'");
                    }
                });
            }, 'image/jpeg');
        });
    </script>

</body>

</html>