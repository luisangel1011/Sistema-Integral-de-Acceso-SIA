<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Configuración básica -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>

    <!-- Enlace a estilos -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Icono en la pestaña -->
    <link rel="shortcut icon" href="Icons/logo.ico">

    <!-- Fondo de la página -->
    <style>
        body {
            background-color: rgb(179, 179, 179);
            background-image: url("https://www.transparenttextures.com/patterns/diagmonds-light.png");
        }

        /* Efecto hover en .CargaAcademica */
        .CargaAcademica:hover {
            cursor: pointer;
            filter: brightness(80%);
        }
    </style>
</head>

<body class="Sistema">

    <!-- === Header con iconos === -->
    <header class="headerIcon icono">
        <!-- Botón para mostrar menú -->
        <label class="toggle-btn"><i class="fas fa-bars"></i></label>

        <div class="botones">
            <!-- Icono notificaciones -->
            <div class="btn Notificaciones">
                <label class="NotiPer"><i class="fa-regular fa-bell-slash"></i></label>
            </div>

            <!-- Botón cerrar sesión -->
            <div class="btn CSesion">
                <label class="CerrarPer"><i class="fa-solid fa-right-from-bracket"></i> Cerrar Sesión</label>
            </div>
        </div>
    </header>

    <br>

    <!-- === Menú lateral (sidebar) === -->
    <nav class="sidebar" id="sidebar">
        <ul>
            <!-- Perfil usuario -->
            <li class="perfil"></li>

            <!-- Opción modificar perfil -->
            <li class="ModPerfil">
                <label><i class="fa-solid fa-address-card"></i> Modificar información</label>
            </li>

            <!-- Submenú Alumnos -->
            <li class="ListAlumno">
                <label><i class="fa-solid fa-user-tie"></i> Alumnos</label>
            </li>
            <ol class="EmergentListAlumno" id="EmergentList">
                <li class="ListAlumnoAgregar" onclick="location.href='RegistroAlumno.php'"><label><i class="fas fa-user-plus"></i> Agregar Alumnos</label></li>
                <li class="ListAlumnoModificar" onclick="location.href='ModificarAlumno.php'"><label><i class="fas fa-user-edit"></i> Modificar Alumnos</label></li>
                <li class="ListAlumnoEliminar" onclick="location.href='EliminarAlumno.php'"><label><i class="fas fa-user-times"></i> Eliminar Alumnos</label></li>
                <li class="ListAlumnoVisualizar" onclick="location.href='VisualizarAlumno.php'"><label><i class="fas fa-address-book"></i> Visualizar Alumnos</label></li>
            </ol>

            <!-- Submenú Usuarios -->
            <li class="ListUsuario">
                <label><i class="fa-solid fa-user"></i> Usuarios</label>
            </li>
            <ol class="EmergentListUsuario" id="EmergentList">
                <li class="ListUsuarioAgregar" onclick="location.href='RegistroUsuario.php'"><label><i class="fas fa-user-plus"></i> Agregar Usuario</label></li>
                <li class="ListUsuarioModificar" onclick="location.href='ModificarUsuario.php'"><label><i class="fas fa-user-edit"></i> Modificar Usuario</label></li>
                <li class="ListUsuarioEliminar" onclick="location.href='EliminarUsuario.php'"><label><i class="fas fa-user-times"></i> Eliminar Usuario</label></li>
                <li class="ListUsuarioVisualizar" onclick="location.href='VisualizarUsuario.php'"><label><i class="fas fa-address-book"></i> Visualizar Usuario</label></li>
            </ol>

            <!-- Submenú Otros -->
            <li class="ListOtros">
                <label><i class="fa-solid fa-chart-line"></i> Otros</label>
            </li>
            <ol class="EmergentListOtros" id="EmergentList">
                <li class="ListEnvNoti" onclick="location.href='EnviarNoti.php'"><label><i class="fa-solid fa-share"></i> Enviar notificación a usuario</label></li>
                <li class="ListComunicado" onclick="location.href='Comunicado.php'"><label><i class="fa-solid fa-bullhorn"></i> Hacer comunicado</label></li>
            </ol>
        </ul>
    </nav>

    <!-- === Contenido principal === -->
    <div class="contenido-principal">
        <div class="ContenedorModAlumno">

            <!-- === Recuadro listado alumnos/usuarios a eliminar === -->
            <div class="Recuadro_perfil ListaAlumnos">
                <!-- Buscador de alumnos -->
                <div class="BuscadorWrapper">
                    <input type="text" class="BuscadorAlumno" placeholder="Buscar Usuario..." title="Buscar por nombre, correo_electronico y Genero">
                </div>

                <!-- Listado dinámico (se carga con JS) -->
                <div class="Listado">
                    <!-- Si no hay datos muestra recuadro vacío -->
                    <div class="recuadroVacio">
                        <div>
                            <label><i class="fa-regular fa-face-sad-tear"></i> No se encontró asistencia</label>
                        </div>
                    </div>

                    <!-- Aquí es donde se insertan los alumnos dinámicamente -->
                    <!-- Ejemplo comentado de ItemAlumno:
                    <div class="ItemAlumno"><input type="checkbox"> <label for="">ISC211927 - Juan Pérez</label> <i class="fa-solid fa-trash IconEliminar"></i> <i class="fa-solid fa-pen IconActualizar"></i> <i class="fa-solid fa-circle-info"></i></div>
                    -->
                </div>
            </div>

            <!-- === Recuadro selección múltiple === -->
            <div class="Recuadro_perfil SelMultiple">
                <label>Usuarios Seleccionados:</label>
                <ul class="listaSeleccionados"></ul>
                <i class="fa-solid fa-trash IconEliminar" title="Eliminar seleccionados"></i>
            </div>
        </div>
    </div>

    <!-- === Footer === -->
    <footer>
        <div class="footer-content">
            <!-- Logo -->
            <img src="Icons/Logo.png" alt="SIA Logo" class="btnlogoInd footer-logo">

            <!-- Enlaces -->
            <div class="footer-links">
                <a href="#">Inicio</a>
                <a href="#">Acerca de</a>
                <a href="#">Contacto</a>
                <a href="#">Ayuda</a>
            </div>
        </div>

        <!-- Copyright -->
        <div class="copyright">
            © 2025 Instituto Tecnológico Superior de Atlixco - Sistema Integral de Acceso
        </div>
    </footer>

    <!-- === Scripts externos === -->
    <script src="https://kit.fontawesome.com/7e6b5e67cc.js" crossorigin="anonymous"></script>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/Script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- === Script principal === -->
    <script>
        $(document).ready(async function() {
            let Procesos = new ProcesosDeterminados();
            let Usuario = new Usuarios();

            // Verificar sesión
            let dato = await Procesos.VerificarSesion();
            if (dato[0] != "undefined") {
                if (dato[1] === "Alumno")
                    Procesos.pagPerfil();
            } else
                Procesos.PagSesion();

            // Obtener datos del usuario
            InfUsuario = await Usuario.GetUsuario("", "", dato[0]);

            // Actualizar imagen de perfil
            let PerImgCarga = $('.PerCarga');
            let PerMenu = $('.perfil');
            PerImgCarga.append("<img class='PerImgCarga' src='CargasAcademicas/" + localStorage.getItem('Matricula') + ".jpg'>");
            PerMenu.html('<label><img src="PhotosDB/' + localStorage.getItem("Matricula") + '.jpg" ' +
                'onerror="this.onerror=null; this.src=\'PhotosDB/imgNoFound.jpg\';">' + "  " + localStorage.getItem("Nombre") + '</label>'
            );

            // Obtener listado de usuarios (filtrados por tipo "Alumno")
            const tabla = document.querySelector(".Listado");
            Usuario.GetUsuarios().then(usuarios => {
                const filtrados = usuarios.filter(u => u.tipo_usuario === "Alumno");
                usuarios = filtrados;

                if (usuarios.length > 0) {
                    usuarios.forEach(usuarios => {
                        tabla.innerHTML += `
                            <div class="ItemAlumno" data-id="${usuarios.id_usuario}" data-nombre="${usuarios.nombre}">
                                <input type="checkbox" class="checkAlumno">
                                <label>${usuarios.id_usuario} - ${usuarios.nombre} - ${usuarios.tipo_usuario}</label>
                                <i class="fa-solid fa-trash IconEliminar" title="Eliminar"></i>
                            </div>
                        `;
                    });
                } else {
                    const NoAsistencia = document.querySelectorAll(".recuadroVacio");
                    NoAsistencia.forEach(elemento => {
                        elemento.style.display = "flex";
                    });
                }
            }).catch(error => {
                console.error("Error al obtener la asistencia:", error);
            });

            // === Actualizar lista de seleccionados ===
            $(document).on("change", ".checkAlumno", function() {
                const lista = $(".listaSeleccionados");
                lista.empty(); // limpiar lista

                $(".checkAlumno:checked").each(function() {
                    const contenedor = $(this).closest(".ItemAlumno");
                    const id = contenedor.data("id");
                    const nombre = contenedor.data("nombre");
                    lista.append(`<li>${id} - ${nombre}</li>`);
                });
            });

            // === Eliminar individual ===
            $(document).on("click", ".IconEliminar", function() {
                const contenedor = $(this).closest(".ItemAlumno");
                const matricula = contenedor.data("id");

                if (confirm("¿Deseas eliminar al usuario con matrícula: " + matricula + "?")) {
                    Usuario.EliminarUsuario(matricula);
                }
            });

            // === Eliminar selección múltiple ===
            $(".SelMultiple .IconEliminar").click(function() {
                event.stopPropagation();
                const seleccionados = [];

                $(".checkAlumno:checked").each(function() {
                    const matricula = $(this).closest(".ItemAlumno").data("id");
                    seleccionados.push(matricula);
                });

                if (seleccionados.length === 0) {
                    Procesos.MostrarAlerta("No hay usuarios seleccionados.");
                    return;
                }

                if (confirm("¿Deseas eliminar a los usuarios seleccionados?")) {
                    seleccionados.forEach(matricula => {
                        Usuario.EliminarUsuario(matricula);
                    });
                }
            });

            // === Mostrar menú lateral ===
            Procesos.MostrarMenu();

            // === Mostrar carga académica al hacer clic ===
            $(".PerCarga").click(function(e) {
                Procesos.VisCarga();
            });
        });
    </script>
</body>
</html>
