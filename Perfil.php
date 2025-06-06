<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="Icons/logo.ico">
    <style>
        body {
            background-color: rgb(179, 179, 179);
            background-image: url("https://www.transparenttextures.com/patterns/diagmonds-light.png");

            /*#background-color: #6e0400;
            #background-image: url("https://www.transparenttextures.com/patterns/subtle-carbon.png");
            */
        }

        .CargaAcademica:hover {
            cursor: pointer;
            filter: brightness(80%);
        }
    </style>
</head>

<body class="Sistema">
    <header class="headerIcon icono">
        <label class="toggle-btn"><i class="fas fa-bars"></i></label>
        <div class="botones">
            <div class="btn Notificaciones"><label class="NotiPer"><i class="fa-regular fa-bell-slash"></i></label></div>
            <!--<i class="fa-solid fa-bell fa-shake"></i> -->

            <div class="btn CSesion"><label class="CerrarPer"><i class="fa-solid fa-right-from-bracket"></i>Cerrar Sesión</label></div>

        </div>



    </header>
    <br>

    <nav class="sidebar" id="sidebar">
        <ul>
            <li class="perfil"></li>

            <li class="ModPerfil"><label><i class="fa-solid fa-address-card"></i>Modificar información</label></li>
            <li class="VisCarga"><label></i> <i class="fa-solid fa-table-list"></i>Visualizar carga académica</label></li>
            <li class="RegAsistencias"><label></i> <i class="fa-solid fa-chart-line"></i>Registro de asistencias</label></li>

        </ul>
    </nav>

    <div class="contenedor-flex">

        <div class="Recuadro_perfil CargaAcademica" title="Dirigir carga academica">
            <div class="PerTitulo"><label for="">Carga académica</label></div>
            <div class="PerCarga"></div>
        </div>

        <Div class="Recuadro_perfil InfUsuario">
            <div class="PerTitulo"> <label class="txtPerTitulo" for="">Información Usuario</label></div>
            <div class="PerImgUsuario"><img class="ImgUsuario" src=" PhotosDB/imgNoFound.jpg" class="ImgUsuario"></div>
            <div class="PerUsuario"><label class="txtPerUsuario">*Nombre de usuario*</label></div>
            <div class="PerMatricula"><label class="txtPerMatricula">*Matricula*</label></div>
            <div class="PerSS"><label class="txtPerSS">*Seguro Social*</label></div>
            <div class="PerSexo"><label class="txtPerSexo">*Sexo*</label></div>

        </Div>
        <div class="Recuadro_perfil InfGrafica" title="Dirigir a listado de asistencias">
            <div class="PerTitulo"><label for="">gráfico de asistencia</label></div>
            <div class="recuadroVacio">
                <div>

                    <label for=""><i class="fa-regular fa-face-sad-tear"></i> No se encontró asistencias</label>

                </div>
            </div>
            <div><canvas id="graficaAsistencia" width="600" height="300"></canvas></div>
        </div>

    </div>
    <br>
    <div class="PerTxtAsistencia">
        <label for="">Lista de asistencia</label>
    </div>
    <div class="PerBusqueda">
        <div class=PerBusquedaInicio>
            <label for="">fecha inicial: <input type="date" class="PerBusquedaDateIn" title="Introducir fecha"></label>
            <!--<input type="text" class="PerBusquedaInp" placeholder="Busqueda de usuario">
        <button class="PerBusquedaBtn"><i class="fa-solid fa-magnifying-glass"></i></button>-->
        </div>
        <div class=PerBusquedaFinal>
            <label for="">Fecha final: <input type="date" class="PerBusquedaDateFin" title="Introducir fecha"></label>

            <!--<input type="text" class="PerBusquedaInp" placeholder="Busqueda de usuario">
        <button class="PerBusquedaBtn"><i class="fa-solid fa-magnifying-glass"></i></button>-->
        </div>
    </div>


    <div class="Recuadro_perfil PerAsistencia">
        <div class="recuadroVacio">
            <div>

                <label for=""><i class="fa-regular fa-face-sad-tear"></i> No se encontró asistencias</label>

            </div>
        </div>
        <table class="tablaAsistencia" border="1">
            <thead>
                <tr>
                    <th>ID Acceso</th>
                    <th>Fecha de Entrada</th>
                    <th>Punto de Acceso</th>
                    <th>Matrícula</th>
                    <th>Fecha de Salida</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se insertarán las filas dinámicamente -->
            </tbody>
        </table>
    </div>

    <div class="Mensaje">
        <div><i class="fa-solid fa-triangle-exclamation"></i></div>

        <div><label for="" class="txtMensaje">*Poner mensaje*</label></div>
        <div><button class="btnMensaje">Aceptar</button></div>
    </div>

    <!--pie de pagina-->
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
    <script src="https://kit.fontawesome.com/7e6b5e67cc.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/Script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $(document).ready(async function() {

            let Procesos = new ProcesosDeterminados();
            let Usuario = new Usuarios();
            let dato = await Procesos.VerificarSesion();
            if (dato[0] != "undefined") {

                if (dato[1] === "Administrador")
                    Procesos.pagPerfilAdmin();
            } else
                Procesos.PagSesion();

            const hoy = new Date().toISOString().split("T")[0];
            $(".PerBusquedaDateIn").attr("max", hoy);
            $(".PerBusquedaDateFin").attr("max", hoy);


            //Obtener la informacion del usuario del archivo script.js
            InfUsuario = await Usuario.GetUsuario("", "", dato[0]);
            //Obtener las etiquetas de los datos de la pagina
            let PerImgUsuario = $('.ImgUsuario')
            let PerUsuario = $('.txtPerUsuario');
            let PerMatricula = $('.txtPerMatricula');
            let PerSS = $('.txtPerSS');
            let PerSexo = $('.txtPerSexo');
            let PerImgCarga = $('.PerCarga');
            let PerMenu = $('.perfil');

            //Establecer los datos del usuario en variables locales
            localStorage.setItem("Matricula", InfUsuario.id_usuario);
            localStorage.setItem("Nombre", InfUsuario.nombre);
            localStorage.setItem("nss", InfUsuario.nss);
            localStorage.setItem("Genero", InfUsuario.Genero);

            //Obtener la imagen del usuario
            PerImgUsuario.attr('src', 'PhotosDB/' + localStorage.getItem("Matricula") + ".jpg").on('error', function() {
                $(this).attr('src', 'PhotosDB/imgNoFound.jpg')
            });
            //Obtener y establecer la informacion del usuario a la pagina de los datos almacenados
            PerUsuario.text("Nombre:" + localStorage.getItem("Nombre"));
            PerMatricula.text("Matricula:" + localStorage.getItem("Matricula"));
            PerSS.text("Seguro social:" + localStorage.getItem("nss"));
            PerSexo.text("Genero:" + localStorage.getItem("Genero"));
            PerImgCarga.append("<img class='PerImgCarga' src='CargasAcademicas/" + localStorage.getItem('Matricula') + ".jpg'>");
            PerMenu.html('<label><img src="PhotosDB/' + localStorage.getItem("Matricula") + '.jpg" ' +
                'onerror="this.onerror=null; this.src=\'PhotosDB/imgNoFound.jpg\';">' + localStorage.getItem("Nombre") + '</label>'
            );
            //Elaboración de la tabla de asistencias del usuario
            Usuario.GetAsistencia(localStorage.getItem("Matricula")).then(respuesta => {
                const tabla = document.querySelector(".tablaAsistencia tbody");
                tabla.innerHTML = "";
                console.log(respuesta.length)
                const conteoPorDia = {};

                const NoAsistencia = document.querySelectorAll(".recuadroVacio");
                NoAsistencia.forEach(elemento => {
                    elemento.style.display = "none";
                });


                // Obtener fechas y llenar tabla
                if ((respuesta.length > 0)) {

                    respuesta.forEach(respuesta => {
                        const fila = document.createElement("tr");
                        fila.innerHTML = `
                    <td>${respuesta.id_acceso}</td>
                    <td>${respuesta.fecha_hora_acceso}</td>
                    <td>${respuesta.punto_acceso}</td>
                    <td>${respuesta.id_usuario}</td>
                    <td>${respuesta.fecha_hora_salida || "—"}</td>`;
                        tabla.appendChild(fila);
                        const fecha = respuesta.fecha_hora_acceso.split(" ")[0];
                        if (fecha) {
                            conteoPorDia[fecha] = (conteoPorDia[fecha] || 0) + 1;
                        }
                    });



                    // Obtener rango de fechas
                    const fechasRegistradas = Object.keys(conteoPorDia).sort();
                    const fechaInicio = new Date(fechasRegistradas[0]);
                    const fechaFin = new Date(); // hoy

                    // Generar todas las fechas entre inicio y fin
                    const fechas = [];
                    const cantidades = [];

                    for (let f = new Date(fechaInicio); f <= fechaFin; f.setDate(f.getDate() + 1)) {
                        const yyyyMMdd = f.toISOString().split("T")[0]; // formato YYYY-MM-DD
                        fechas.push(yyyyMMdd);
                        cantidades.push(conteoPorDia[yyyyMMdd] || 0);
                    }

                    // Graficar
                    const ctx = document.getElementById('graficaAsistencia').getContext('2d');
                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: fechas,
                            datasets: [{
                                label: 'Accesos por día',
                                data: cantidades,
                                borderColor: 'rgba(255, 99, 132, 1)',
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderWidth: 2,
                                tension: 0, // ← línea recta
                                pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                                pointRadius: 5,
                                fill: true
                            }]

                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        precision: 0
                                    },
                                    title: {
                                        display: true,
                                        text: 'Cantidad de Accesos'
                                    }
                                },
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Fecha'
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    labels: {
                                        font: {
                                            size: 14
                                        }
                                    }
                                }
                            }
                        }

                    });
                } else {
                    const tabla = document.querySelector(".tablaAsistencia");
                    const tabla2 = document.querySelector("#graficaAsistencia");
                    const NoAsistencia = document.querySelectorAll(".recuadroVacio");

                    tabla.style.display = "none";
                    tabla2.style.display = "none";
                    NoAsistencia.forEach(elemento => {
                        elemento.style.display = "flex";
                    });

                }
            }).catch(error => {
                console.error("Error al obtener la asistencia:", error);
            });


            $(".PerBusquedaDateIn").on("change", actualizarTabla);
            $(".PerBusquedaDateFin").on("change", actualizarTabla);
            $(".PerBusquedaDateFin").on("change", actualizarTabla);

            //ocultar el menu desplegable
            Procesos.MostrarMenu();
            $(".CargaAcademica").click(function(e) {
                Procesos.VisCarga();

            });

            $(".InfGrafica").click(async function(e) {

                Usuario.GetAsistencia(localStorage.getItem("Matricula")).then(respuesta => {
                    if (respuesta.length > 0) {
                        Procesos.RegAsistencias();
                    } else {
                        Procesos.MostrarAlerta("No se tranfirio al registro debido a que no existe asistencia ");
                    }
                }).catch(error => {
                    console.error("Error al obtener la asistencia:", error);
                });



            });


        });

        function actualizarTabla() {
            let Usuario = new Usuarios();
            Usuario.GetAsistencia(localStorage.getItem("Matricula")).then(respuesta => {
                const tabla = document.querySelector(".tablaAsistencia tbody");
                tabla.innerHTML = "";

                const NoAsistencia = document.querySelectorAll(".recuadroVacio");
                NoAsistencia.forEach(e => e.style.display = "none");

                const fechaInicioInput = document.querySelector(".PerBusquedaDateIn").value;
                const fechaFinalInput = document.querySelector(".PerBusquedaDateFin").value;

                const fechaInicio = fechaInicioInput ? new Date(fechaInicioInput) : null;
                const fechaFinal = fechaFinalInput ? new Date(fechaFinalInput) : null;

                if (respuesta.length > 0) {
                    let tieneResultados = false;

                    respuesta.forEach(respuesta => {
                        const fechaAccesoTexto = respuesta.fecha_hora_acceso.split(" ")[0];
                        const fechaAcceso = new Date(fechaAccesoTexto);

                        const dentroDelRango =
                            (!fechaInicio || fechaAcceso >= fechaInicio) &&
                            (!fechaFinal || fechaAcceso <= fechaFinal);

                        if (dentroDelRango) {
                            const fila = document.createElement("tr");
                            fila.innerHTML = `
                        <td>${respuesta.id_acceso}</td>
                        <td>${respuesta.fecha_hora_acceso}</td>
                        <td>${respuesta.punto_acceso}</td>
                        <td>${respuesta.id_usuario}</td>
                        <td>${respuesta.fecha_hora_salida || "—"}</td>`;
                            tabla.appendChild(fila);
                            tieneResultados = true;
                        }
                    });

                    if (!tieneResultados) {
                        document.querySelector(".tablaAsistencia").style.display = "none";
                        NoAsistencia.forEach(e => e.style.display = "flex");
                    } else {
                        document.querySelector(".tablaAsistencia").style.display = "table";
                    }
                } else {
                    document.querySelector(".tablaAsistencia").style.display = "none";
                    NoAsistencia.forEach(e => e.style.display = "flex");
                }
            }).catch(error => {
                console.error("Error al obtener la asistencia:", error);
            });
        }
    </script>


</body>

</html>