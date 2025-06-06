<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carga Academica</title>
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

        .CargaAcademica .PerCarga img {
            width: 70vw;
            height: auto;
            min-width: 24vw;
            max-width: 100%;
            object-fit: contain;
        }
    </style>
</head>

<body class="Sistema">
    <header class="headerIcon icono">
        <label class="toggle-btn"><i class="fas fa-bars"></i></label>
        <div class="botones">
            <div class="btn Notificaciones"><label class="NotiPer"><i class="fa-regular fa-bell-slash"></i></label></div>
            <!--<i class="fa-solid fa-bell fa-shake"></i> -->

            <div class="btn CSesion"><label class="CerrarPer"><i class="fa-solid fa-right-from-bracket"></i>Cerrar Sesion</label></div>

        </div>



    </header>
    <br>

    <nav class="sidebar" id="sidebar">
        <ul>
            <li class="perfil"></li>

            <li class="ModPerfil"><label><i class="fa-solid fa-address-card"></i>Modificar información</label></li>
            <li class="VisCarga"><label></i> <i class="fa-solid fa-table-list"></i>Visualizar carga academica</label></li>
            <li class="RegAsistencias"><label></i> <i class="fa-solid fa-chart-line"></i>Registro de asistencias</label></li>

        </ul>
    </nav>
    <label class="ExportarPDF">Descargar PDF</label>
    <div id="contenidoPDF">
        <br>
        <div class="contenedor-flex">

            <div class="Recuadro_perfil InfGrafica" title="Dirigir a listado de asistencias">
                <div class="PerTitulo"><label for="">grafico de asistencia</label></div>
                <div><canvas id="graficaAsistencia" width="600" height="300"></canvas></div>
            </div>


        </div>
        <br>
        <div class="PerTxtAsistencia">
            <label for="">Lista de asistencia</label>
        </div>
        <div PerTablaAsistencia>
            <div class="Recuadro_perfil PerAsistencia">
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
        </div>

        <div class="PerTablaAsistencia">
            <div class="Recuadro_perfil PerAsistencia1" style="display: none;">
                <table class="tablaAsistencia1" border="1">
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
        </div>

    </div>


    <script src="https://kit.fontawesome.com/7e6b5e67cc.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/Script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <script>
        $(document).ready(async function() {
            localStorage.clear();
            let Procesos = new ProcesosDeterminados();
            let Usuario = new Usuarios();
            let dato = await Procesos.VerificarSesion()
            if (dato[0] != "undefined") {

                if (dato[1] === "Administrador")
                    Procesos.pagPerfilAdmin();

            }

            //Obtener la informacion del usuario del archivo script.js
            InfUsuario = await Usuario.GetUsuario("", "", dato[0]);
            //Elaboración de la tabla de asistencias del usuario
            localStorage.setItem("Nombre", InfUsuario.nombre);
            let PerMenu = $('.perfil');

            PerMenu.html('<label><img src="PhotosDB/' + dato[0] + '.jpg" ' +
                'onerror="this.onerror=null; this.src=\'PhotosDB/imgNoFound.jpg\';">' + localStorage.getItem("Nombre") + '</label>'
            );
            Usuario.GetAsistencia(dato[0]).then(respuesta => {
                const tabla = document.querySelector(".tablaAsistencia tbody");
                const tabla1 = document.querySelector(".tablaAsistencia1 tbody");
                tabla.innerHTML = "";

                const conteoPorDia = {};

                // Obtener fechas y llenar tabla
                respuesta.forEach(respuesta => {
                    const fila = document.createElement("tr");
                    fila.innerHTML = `
                    <td>${respuesta.id_acceso}</td>
                    <td>${respuesta.fecha_hora_acceso}</td>
                    <td>${respuesta.punto_acceso}</td>
                    <td>${respuesta.id_usuario}</td>
                    <td>${respuesta.fecha_hora_salida || "—"}</td>
                    `;
                    const fila1 = document.createElement("tr");
                    fila1.innerHTML = `
                    <td>${respuesta.id_acceso}</td>
                    <td>${respuesta.fecha_hora_acceso}</td>
                    <td>${respuesta.punto_acceso}</td>
                    <td>${respuesta.id_usuario}</td>
                    <td>${respuesta.fecha_hora_salida || "—"}</td>
                    `;
                    tabla.appendChild(fila);
                    tabla1.appendChild(fila1);

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
            }).catch(error => {
                console.error("Error al obtener la asistencia:", error);
            });




            //ocultar el menu desplegable
            Procesos.MostrarMenu();
        });
    </script>


</body>

</html>