<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión Académica</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #e74c3c;
            --accent-color: #3498db;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        .header {
            background: var(--primary-color);
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            position: relative;
            overflow: hidden;
        }

        .header h1 {
            margin: 0;
            font-size: 28px;
            z-index: 1;
            position: relative;
        }

        .header::before {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(52, 152, 219, 0.2) 0%, rgba(52, 152, 219, 0) 70%);
            animation: pulse 15s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.8);
                opacity: 0.5;
            }

            50% {
                transform: scale(1.2);
                opacity: 0.8;
            }

            100% {
                transform: scale(0.8);
                opacity: 0.5;
            }
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        .tabs {
            display: flex;
            background: white;
            border-radius: 10px 10px 0 0;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .tab {
            padding: 15px 25px;
            background: var(--light-color);
            color: var(--dark-color);
            cursor: pointer;
            transition: all 0.3s;
            font-weight: bold;
            text-align: center;
            flex: 1;
            border-bottom: 3px solid transparent;
        }

        .tab:hover {
            background: #d6dcde;
        }

        .tab.active {
            background: white;
            color: var(--secondary-color);
            border-bottom: 3px solid var(--secondary-color);
        }

        .content {
            background: white;
            padding: 20px;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            min-height: 400px;
        }

        .panel {
            display: none;
        }

        .panel.active {
            display: block;
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 15px;
            transition: all 0.3s;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            border-left: 5px solid var(--accent-color);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .card-alumnos {
            border-left-color: var(--secondary-color);
        }

        .card-usuarios {
            border-left-color: var(--accent-color);
        }

        .card-icon {
            font-size: 32px;
            margin-bottom: 10px;
            color: var(--accent-color);
            text-align: center;
        }

        .card-alumnos .card-icon {
            color: var(--secondary-color);
        }

        .card h3 {
            margin: 0;
            font-size: 18px;
            text-align: center;
            position: relative;
        }

        /* Estilos para formularios */
        form {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: var(--dark-color);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select,
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s;
            box-sizing: border-box;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
            outline: none;
        }

        .btn {
            background: var(--accent-color);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: all 0.3s;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn:hover {
            background: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-success {
            background: var(--success-color);
        }

        .btn-success:hover {
            background: #27ae60;
        }

        .btn-danger {
            background: var(--secondary-color);
        }

        .btn-danger:hover {
            background: #c0392b;
        }

        /* Tabla de datos */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .data-table th,
        .data-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .data-table th {
            background: var(--primary-color);
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 14px;
        }

        .data-table tr:nth-child(even) {
            background: #f9f9f9;
        }

        .data-table tr:hover {
            background: #f1f1f1;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .edit-btn,
        .delete-btn,
        .view-btn {
            padding: 5px 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
        }

        .edit-btn {
            background: var(--accent-color);
            color: white;
        }

        .delete-btn {
            background: var(--secondary-color);
            color: white;
        }

        .view-btn {
            background: var(--primary-color);
            color: white;
        }

        .edit-btn:hover,
        .delete-btn:hover,
        .view-btn:hover {
            opacity: 0.8;
            transform: translateY(-2px);
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            border-radius: 10px;
            padding: 20px;
            width: 90%;
            max-width: 500px;
            position: relative;
            animation: modalFadeIn 0.3s;
        }

        @keyframes modalFadeIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .close-modal {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 24px;
            cursor: pointer;
            color: #aaa;
            transition: color 0.3s;
        }

        .close-modal:hover {
            color: var(--secondary-color);
        }

        .modal-header {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }

        .modal-header h2 {
            margin: 0;
            color: var(--primary-color);
        }

        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: rgba(46, 204, 113, 0.2);
            border: 1px solid var(--success-color);
            color: #27ae60;
        }

        .alert-danger {
            background: rgba(231, 76, 60, 0.2);
            border: 1px solid var(--secondary-color);
            color: #c0392b;
        }

        /* Vista de detalles */
        .detail-view {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .detail-item {
            margin-bottom: 15px;
            display: flex;
        }

        .detail-label {
            font-weight: bold;
            min-width: 150px;
            color: var(--primary-color);
        }

        .detail-value {
            flex: 1;
        }

        /* Mensaje de sin datos */
        .no-data {
            text-align: center;
            padding: 40px 0;
            color: #7f8c8d;
        }

        .no-data i {
            font-size: 50px;
            margin-bottom: 20px;
            opacity: 0.3;
        }

        @media (max-width: 768px) {
            .card-grid {
                grid-template-columns: 1fr;
            }

            .tabs {
                flex-direction: column;
            }

            .tab {
                border-right: none;
                border-bottom: 1px solid #ddd;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <h1><i class="fas fa-graduation-cap"></i> Sistema de Gestión Académica</h1>
    </div>

    <div class="container">
        <div class="tabs">
            <div class="tab active" data-tab="dashboard">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </div>
            <div class="tab" data-tab="alumnos">
                <i class="fas fa-user-graduate"></i> Alumnos
            </div>
            <div class="tab" data-tab="usuarios">
                <i class="fas fa-users-cog"></i> Usuarios
            </div>
        </div>

        <div class="content">
            <!-- Panel Dashboard -->
            <div class="panel active" id="dashboard">
                <h2>Bienvenido al Sistema de Gestión</h2>
                <p>Seleccione una de las siguientes opciones:</p>

                <div class="card-grid">
                    <div class="card card-alumnos" onclick="changeTab('alumnos')">
                        <div class="card-icon">
                            <i class="fas fa-user-graduate"></i>
                        </div>
                        <h3>Gestión de Alumnos</h3>
                    </div>

                    <div class="card card-usuarios" onclick="changeTab('usuarios')">
                        <div class="card-icon">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <h3>Gestión de Usuarios</h3>
                    </div>
                </div>
            </div>

            <!-- Panel Alumnos -->
            <div class="panel" id="alumnos">
                <h2>Gestión de Alumnos</h2>

                <div class="card-grid">
                    <div class="card card-alumnos" onclick="showModal('alumnosListaModal')">
                        <div class="card-icon">
                            <i class="fas fa-list"></i>
                        </div>
                        <h3>Listar Alumnos</h3>
                    </div>

                    <div class="card card-alumnos" onclick="showModal('alumnosAgregarModal')">
                        <div class="card-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h3>Agregar Alumno</h3>
                    </div>

                    <div class="card card-alumnos" onclick="showModal('alumnosBuscarModal')">
                        <div class="card-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3>Buscar Alumno</h3>
                    </div>
                </div>
            </div>

            <!-- Panel Usuarios -->
            <div class="panel" id="usuarios">
                <h2>Gestión de Usuarios</h2>

                <div class="card-grid">
                    <div class="card card-usuarios" onclick="showModal('usuariosListaModal')">
                        <div class="card-icon">
                            <i class="fas fa-list"></i>
                        </div>
                        <h3>Listar Usuarios</h3>
                    </div>

                    <div class="card card-usuarios" onclick="showModal('usuariosAgregarModal')">
                        <div class="card-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h3>Agregar Usuario</h3>
                    </div>

                    <div class="card card-usuarios" onclick="showModal('usuariosBuscarModal')">
                        <div class="card-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3>Buscar Usuario</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modales para Alumnos -->
    <!-- Modal Lista de Alumnos -->
    <div class="modal" id="alumnosListaModal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('alumnosListaModal')">&times;</span>
            <div class="modal-header">
                <h2><i class="fas fa-list"></i> Lista de Alumnos</h2>
            </div>
            <div id="alumnosListaContent">
                <table class="data-table" id="alumnosTable">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Matrícula</th>
                            <th>Grupo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="alumnosTableBody">
                        <!-- Los datos se cargarán dinámicamente -->
                    </tbody>
                </table>
                <div class="no-data" id="noAlumnos">
                    <i class="fas fa-user-graduate"></i>
                    <p>No hay alumnos registrados aún.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Agregar Alumno -->
    <div class="modal" id="alumnosAgregarModal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('alumnosAgregarModal')">&times;</span>
            <div class="modal-header">
                <h2><i class="fas fa-user-plus"></i> Agregar Alumno</h2>
            </div>
            <form id="agregarAlumnoForm">
                <div class="form-group">
                    <label for="nombre">Nombre Completo:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="matricula">Matrícula:</label>
                    <input type="text" id="matricula" name="matricula" required>
                </div>
                <div class="form-group">
                    <label for="grupo">Grupo:</label>
                    <input type="text" id="grupo" name="grupo" required>
                </div>
                <div class="form-group">
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Guardar Alumno</button>
                </div>
            </form>
            <div class="alert alert-success" id="alumnoAgregadoAlert" style="display: none;">
                Alumno agregado correctamente.
            </div>
        </div>
    </div>

    <!-- Modal Buscar Alumno -->
    <div class="modal" id="alumnosBuscarModal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('alumnosBuscarModal')">&times;</span>
            <div class="modal-header">
                <h2><i class="fas fa-search"></i> Buscar Alumno</h2>
            </div>
            <form id="buscarAlumnoForm">
                <div class="form-group">
                    <label for="buscarMatricula">Matrícula:</label>
                    <input type="text" id="buscarMatricula" name="buscarMatricula" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Buscar</button>
                </div>
            </form>
            <div id="resultadoBusquedaAlumno" style="display: none;">
                <div class="detail-view">
                    <h3>Detalles del Alumno</h3>
                    <div class="detail-item">
                        <div class="detail-label">Nombre:</div>
                        <div class="detail-value" id="detalleNombre"></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Matrícula:</div>
                        <div class="detail-value" id="detalleMatricula"></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Grupo:</div>
                        <div class="detail-value" id="detalleGrupo"></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Correo:</div>
                        <div class="detail-value" id="detalleCorreo"></div>
                    </div>
                </div>
                <div style="margin-top: 20px;">
                    <button class="btn edit-btn" id="editarAlumnoBtn"><i class="fas fa-edit"></i> Editar</button>
                    <button class="btn delete-btn" id="eliminarAlumnoBtn"><i class="fas fa-trash"></i> Eliminar</button>
                </div>
            </div>
            <div class="alert alert-danger" id="alumnoNoEncontradoAlert" style="display: none;">
                No se encontró ningún alumno con esa matrícula.
            </div>
        </div>
    </div>

    <!-- Modal Editar Usuario -->
    <div class="modal" id="usuariosEditarModal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('usuariosEditarModal')">&times;</span>
            <div class="modal-header">
                <h2><i class="fas fa-user-edit"></i> Editar Usuario</h2>
            </div>
            <form id="editarUsuarioForm">
                <input type="hidden" id="editUsuarioId" name="editUsuarioId">
                <div class="form-group">
                    <label for="editNombreUsuario">Nombre de Usuario:</label>
                    <input type="text" id="editNombreUsuario" name="editNombreUsuario" required>
                </div>
                <div class="form-group">
                    <label for="editPassword">Nueva Contraseña:</label>
                    <input type="password" id="editPassword" name="editPassword" placeholder="Dejar en blanco para mantener la actual">
                </div>
                <div class="form-group">
                    <label for="editRol">Rol:</label>
                    <select id="editRol" name="editRol" required>
                        <option value="Administrador">Administrador</option>
                        <option value="Editor">Editor</option>
                        <option value="Profesor">Profesor</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="editEstado">Estado:</label>
                    <select id="editEstado" name="editEstado" required>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Actualizar Usuario</button>
                </div>
            </form>
            <div class="alert alert-success" id="usuarioEditadoAlert" style="display: none;">
                Usuario actualizado correctamente.
            </div>
        </div>
    </div>

    <!-- Modal Eliminar Usuario -->
    <div class="modal" id="usuariosEliminarModal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('usuariosEliminarModal')">&times;</span>
            <div class="modal-header">
                <h2><i class="fas fa-user-minus"></i> Eliminar Usuario</h2>
            </div>
            <div class="alert alert-danger">
                ¿Está seguro que desea eliminar al usuario <strong id="eliminarNombreUsuario"></strong>?
                Esta acción no se puede deshacer.
            </div>
            <div class="form-group" style="text-align: right;">
                <button class="btn" onclick="closeModal('usuariosEliminarModal')">Cancelar</button>
                <button class="btn btn-danger" id="confirmarEliminarUsuario">Eliminar</button>
            </div>
            <div class="alert alert-success" id="usuarioEliminadoAlert" style="display: none;">
                Usuario eliminado correctamente.
            </div>
        </div>
    </div>

    <!-- JavaScript para la funcionalidad de la aplicación -->
    <script>
        // Almacenamiento de datos (simulando una base de datos)
        let alumnos = [];
        let usuarios = [];

        // Elementos DOM frecuentemente utilizados
        const tabs = document.querySelectorAll('.tab');
        const panels = document.querySelectorAll('.panel');

        // Función para cambiar de pestaña
        function changeTab(tabName) {
            // Actualizar pestañas
            tabs.forEach(tab => {
                if (tab.dataset.tab === tabName) {
                    tab.classList.add('active');
                } else {
                    tab.classList.remove('active');
                }
            });

            // Actualizar paneles
            panels.forEach(panel => {
                if (panel.id === tabName) {
                    panel.classList.add('active');
                } else {
                    panel.classList.remove('active');
                }
            });
        }

        // Configuración de pestañas
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                changeTab(tab.dataset.tab);
            });
        });

        // Funciones de Modal
        function showModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = "flex";

                // Cargar datos si es necesario
                if (modalId === 'alumnosListaModal') {
                    cargarTablaAlumnos();
                } else if (modalId === 'usuariosListaModal') {
                    cargarTablaUsuarios();
                }
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = "none";

                // Limpiar formularios
                const forms = modal.querySelectorAll('form');
                forms.forEach(form => form.reset());

                // Ocultar alertas
                const alerts = modal.querySelectorAll('.alert');
                alerts.forEach(alert => {
                    alert.style.display = 'none';
                });

                // Ocultar resultados de búsqueda
                const resultadoBusquedaAlumno = document.getElementById('resultadoBusquedaAlumno');
                if (resultadoBusquedaAlumno) resultadoBusquedaAlumno.style.display = 'none';

                const resultadoBusquedaUsuario = document.getElementById('resultadoBusquedaUsuario');
                if (resultadoBusquedaUsuario) resultadoBusquedaUsuario.style.display = 'none';
            }
        }

        // Cerrar el modal al hacer clic fuera de él
        document.addEventListener('click', (e) => {
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                if (e.target === modal) {
                    closeModal(modal.id);
                }
            });
        });

        // Funciones para Alumnos
        function cargarTablaAlumnos() {
            const tbody = document.getElementById('alumnosTableBody');
            const noAlumnos = document.getElementById('noAlumnos');

            // Limpiar tabla
            tbody.innerHTML = '';

            if (alumnos.length === 0) {
                noAlumnos.style.display = 'block';
                document.getElementById('alumnosTable').style.display = 'none';
            } else {
                noAlumnos.style.display = 'none';
                document.getElementById('alumnosTable').style.display = 'table';

                alumnos.forEach((alumno, index) => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${alumno.nombre}</td>
                        <td>${alumno.matricula}</td>
                        <td>${alumno.grupo}</td>
                        <td class="action-buttons">
                            <button class="view-btn" onclick="verAlumno(${index})"><i class="fas fa-eye"></i></button>
                            <button class="edit-btn" onclick="prepararEditarAlumno(${index})"><i class="fas fa-edit"></i></button>
                            <button class="delete-btn" onclick="prepararEliminarAlumno(${index})"><i class="fas fa-trash"></i></button>
                        </td>
                    `;
                    tbody.appendChild(tr);
                });
            }
        }

        function agregarAlumno(nombre, matricula, grupo, correo) {
            const nuevoAlumno = {
                nombre,
                matricula,
                grupo,
                correo
            };

            alumnos.push(nuevoAlumno);
            return nuevoAlumno;
        }

        function buscarAlumnoPorMatricula(matricula) {
            return alumnos.findIndex(alumno => alumno.matricula === matricula);
        }

        function actualizarAlumno(index, nombre, matricula, grupo, correo) {
            if (index >= 0 && index < alumnos.length) {
                alumnos[index].nombre = nombre;
                alumnos[index].matricula = matricula;
                alumnos[index].grupo = grupo;
                alumnos[index].correo = correo;
                return true;
            }
            return false;
        }

        function eliminarAlumno(index) {
            if (index >= 0 && index < alumnos.length) {
                alumnos.splice(index, 1);
                return true;
            }
            return false;
        }

        function verAlumno(index) {
            if (index >= 0 && index < alumnos.length) {
                const alumno = alumnos[index];

                document.getElementById('detalleNombre').textContent = alumno.nombre;
                document.getElementById('detalleMatricula').textContent = alumno.matricula;
                document.getElementById('detalleGrupo').textContent = alumno.grupo;
                document.getElementById('detalleCorreo').textContent = alumno.correo;

                closeModal('alumnosListaModal');
                showModal('alumnosBuscarModal');

                document.getElementById('resultadoBusquedaAlumno').style.display = 'block';
                document.getElementById('alumnoNoEncontradoAlert').style.display = 'none';

                // Configurar botones
                document.getElementById('editarAlumnoBtn').onclick = () => prepararEditarAlumno(index);
                document.getElementById('eliminarAlumnoBtn').onclick = () => prepararEliminarAlumno(index);
            }
        }

        function prepararEditarAlumno(index) {
            if (index >= 0 && index < alumnos.length) {
                const alumno = alumnos[index];

                document.getElementById('editId').value = index;
                document.getElementById('editNombre').value = alumno.nombre;
                document.getElementById('editMatricula').value = alumno.matricula;
                document.getElementById('editGrupo').value = alumno.grupo;
                document.getElementById('editCorreo').value = alumno.correo;

                closeModal('alumnosListaModal');
                closeModal('alumnosBuscarModal');
                showModal('alumnosEditarModal');
            }
        }

        function prepararEliminarAlumno(index) {
            if (index >= 0 && index < alumnos.length) {
                document.getElementById('eliminarNombreAlumno').textContent = alumnos[index].nombre;

                document.getElementById('confirmarEliminarAlumno').onclick = () => {
                    eliminarAlumno(index);
                    document.getElementById('alumnoEliminadoAlert').style.display = 'block';

                    // Ocultar mensajes después de un tiempo
                    setTimeout(() => {
                        closeModal('alumnosEliminarModal');
                    }, 2000);
                };

                closeModal('alumnosListaModal');
                closeModal('alumnosBuscarModal');
                showModal('alumnosEliminarModal');
            }
        }

        // Funciones para Usuarios
        function cargarTablaUsuarios() {
            const tbody = document.getElementById('usuariosTableBody');
            const noUsuarios = document.getElementById('noUsuarios');

            // Limpiar tabla
            tbody.innerHTML = '';

            if (usuarios.length === 0) {
                noUsuarios.style.display = 'block';
                document.getElementById('usuariosTable').style.display = 'none';
            } else {
                noUsuarios.style.display = 'none';
                document.getElementById('usuariosTable').style.display = 'table';

                usuarios.forEach((usuario, index) => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${usuario.nombreUsuario}</td>
                        <td>${usuario.rol}</td>
                        <td>${usuario.estado}</td>
                        <td class="action-buttons">
                            <button class="view-btn" onclick="verUsuario(${index})"><i class="fas fa-eye"></i></button>
                            <button class="edit-btn" onclick="prepararEditarUsuario(${index})"><i class="fas fa-edit"></i></button>
                            <button class="delete-btn" onclick="prepararEliminarUsuario(${index})"><i class="fas fa-trash"></i></button>
                        </td>
                    `;
                    tbody.appendChild(tr);
                });
            }
        }

        function agregarUsuario(nombreUsuario, password, rol, estado) {
            const nuevoUsuario = {
                nombreUsuario,
                password,
                rol,
                estado
            };

            usuarios.push(nuevoUsuario);
            return nuevoUsuario;
        }

        function buscarUsuarioPorNombre(nombreUsuario) {
            return usuarios.findIndex(usuario => usuario.nombreUsuario === nombreUsuario);
        }

        function actualizarUsuario(index, nombreUsuario, password, rol, estado) {
            if (index >= 0 && index < usuarios.length) {
                usuarios[index].nombreUsuario = nombreUsuario;
                if (password) {
                    usuarios[index].password = password;
                }
                usuarios[index].rol = rol;
                usuarios[index].estado = estado;
                return true;
            }
            return false;
        }

        function eliminarUsuario(index) {
            if (index >= 0 && index < usuarios.length) {
                usuarios.splice(index, 1);
                return true;
            }
            return false;
        }

        function verUsuario(index) {
            if (index >= 0 && index < usuarios.length) {
                const usuario = usuarios[index];

                document.getElementById('detalleUsuario').textContent = usuario.nombreUsuario;
                document.getElementById('detalleRol').textContent = usuario.rol;
                document.getElementById('detalleEstado').textContent = usuario.estado;

                closeModal('usuariosListaModal');
                showModal('usuariosBuscarModal');

                document.getElementById('resultadoBusquedaUsuario').style.display = 'block';
                document.getElementById('usuarioNoEncontradoAlert').style.display = 'none';

                // Configurar botones
                document.getElementById('editarUsuarioBtn').onclick = () => prepararEditarUsuario(index);
                document.getElementById('eliminarUsuarioBtn').onclick = () => prepararEliminarUsuario(index);
            }
        }

        function prepararEditarUsuario(index) {
            if (index >= 0 && index < usuarios.length) {
                const usuario = usuarios[index];

                document.getElementById('editUsuarioId').value = index;
                document.getElementById('editNombreUsuario').value = usuario.nombreUsuario;
                document.getElementById('editRol').value = usuario.rol;
                document.getElementById('editEstado').value = usuario.estado;

                closeModal('usuariosListaModal');
                closeModal('usuariosBuscarModal');
                showModal('usuariosEditarModal');
            }
        }

        function prepararEliminarUsuario(index) {
            if (index >= 0 && index < usuarios.length) {
                document.getElementById('eliminarNombreUsuario').textContent = usuarios[index].nombreUsuario;

                document.getElementById('confirmarEliminarUsuario').onclick = () => {
                    eliminarUsuario(index);
                    document.getElementById('usuarioEliminadoAlert').style.display = 'block';

                    // Ocultar mensajes después de un tiempo
                    setTimeout(() => {
                        closeModal('usuariosEliminarModal');
                    }, 2000);
                };

                closeModal('usuariosListaModal');
                closeModal('usuariosBuscarModal');
                showModal('usuariosEliminarModal');
            }
        }

        // Configuración de eventos para formularios
        document.addEventListener('DOMContentLoaded', function() {
            // Formulario Agregar Alumno
            document.getElementById('agregarAlumnoForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const nombre = document.getElementById('nombre').value;
                const matricula = document.getElementById('matricula').value;
                const grupo = document.getElementById('grupo').value;
                const correo = document.getElementById('correo').value;

                agregarAlumno(nombre, matricula, grupo, correo);

                // Mostrar mensaje de éxito
                document.getElementById('alumnoAgregadoAlert').style.display = 'block';

                // Limpiar formulario
                this.reset();

                // Ocultar mensaje después de un tiempo
                setTimeout(() => {
                    document.getElementById('alumnoAgregadoAlert').style.display = 'none';
                }, 3000);
            });

            // Formulario Buscar Alumno
            document.getElementById('buscarAlumnoForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const matricula = document.getElementById('buscarMatricula').value;
                const index = buscarAlumnoPorMatricula(matricula);

                if (index !== -1) {
                    const alumno = alumnos[index];

                    document.getElementById('detalleNombre').textContent = alumno.nombre;
                    document.getElementById('detalleMatricula').textContent = alumno.matricula;
                    document.getElementById('detalleGrupo').textContent = alumno.grupo;
                    document.getElementById('detalleCorreo').textContent = alumno.correo;

                    document.getElementById('resultadoBusquedaAlumno').style.display = 'block';
                    document.getElementById('alumnoNoEncontradoAlert').style.display = 'none';

                    // Configurar botones
                    document.getElementById('editarAlumnoBtn').onclick = () => prepararEditarAlumno(index);
                    document.getElementById('eliminarAlumnoBtn').onclick = () => prepararEliminarAlumno(index);
                } else {
                    document.getElementById('resultadoBusquedaAlumno').style.display = 'none';
                    document.getElementById('alumnoNoEncontradoAlert').style.display = 'block';
                }
            });

            // Formulario Editar Alumno
            document.getElementById('editarAlumnoForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const index = parseInt(document.getElementById('editId').value);
                const nombre = document.getElementById('editNombre').value;
                const matricula = document.getElementById('editMatricula').value;
                const grupo = document.getElementById('editGrupo').value;
                const correo = document.getElementById('editCorreo').value;

                actualizarAlumno(index, nombre, matricula, grupo, correo);

                // Mostrar mensaje de éxito
                document.getElementById('alumnoEditadoAlert').style.display = 'block';

                // Ocultar mensaje después de un tiempo
                setTimeout(() => {
                    closeModal('alumnosEditarModal');
                }, 2000);
            });

            // Formulario Agregar Usuario
            document.getElementById('agregarUsuarioForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const nombreUsuario = document.getElementById('nombreUsuario').value;
                const password = document.getElementById('password').value;
                const rol = document.getElementById('rol').value;
                const estado = document.getElementById('estado').value;

                agregarUsuario(nombreUsuario, password, rol, estado);

                // Mostrar mensaje de éxito
                document.getElementById('usuarioAgregadoAlert').style.display = 'block';

                // Limpiar formulario
                this.reset();

                // Ocultar mensaje después de un tiempo
                setTimeout(() => {
                    document.getElementById('usuarioAgregadoAlert').style.display = 'none';
                }, 3000);
            });

            // Formulario Buscar Usuario
            document.getElementById('buscarUsuarioForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const nombreUsuario = document.getElementById('buscarUsuario').value;
                const index = buscarUsuarioPorNombre(nombreUsuario);

                if (index !== -1) {
                    const usuario = usuarios[index];

                    document.getElementById('detalleUsuario').textContent = usuario.nombreUsuario;
                    document.getElementById('detalleRol').textContent = usuario.rol;
                    document.getElementById('detalleEstado').textContent = usuario.estado;

                    document.getElementById('resultadoBusquedaUsuario').style.display = 'block';
                    document.getElementById('usuarioNoEncontradoAlert').style.display = 'none';

                    // Configurar botones
                    document.getElementById('editarUsuarioBtn').onclick = () => prepararEditarUsuario(index);
                    document.getElementById('eliminarUsuarioBtn').onclick = () => prepararEliminarUsuario(index);
                } else {
                    document.getElementById('resultadoBusquedaUsuario').style.display = 'none';
                    document.getElementById('usuarioNoEncontradoAlert').style.display = 'block';
                }
            });

            // Formulario Editar Usuario
            document.getElementById('editarUsuarioForm').addEventListener('submit', function(e) {
                e.preventDefault();

                const index = parseInt(document.getElementById('editUsuarioId').value);
                const nombreUsuario = document.getElementById('editNombreUsuario').value;
                const password = document.getElementById('editPassword').value;
                const rol = document.getElementById('editRol').value;
                const estado = document.getElementById('editEstado').value;

                actualizarUsuario(index, nombreUsuario, password, rol, estado);

                // Mostrar mensaje de éxito
                document.getElementById('usuarioEditadoAlert').style.display = 'block';

                // Ocultar mensaje después de un tiempo
                setTimeout(() => {
                    closeModal('usuariosEditarModal');
                }, 2000);
            });
        });
    </script> Alumno -->
    <div class="modal" id="alumnosEditarModal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('alumnosEditarModal')">&times;</span>
            <div class="modal-header">
                <h2><i class="fas fa-user-edit"></i> Editar Alumno</h2>
            </div>
            <form id="editarAlumnoForm">
                <input type="hidden" id="editId" name="editId">
                <div class="form-group">
                    <label for="editNombre">Nombre Completo:</label>
                    <input type="text" id="editNombre" name="editNombre" required>
                </div>
                <div class="form-group">
                    <label for="editMatricula">Matrícula:</label>
                    <input type="text" id="editMatricula" name="editMatricula" required>
                </div>
                <div class="form-group">
                    <label for="editGrupo">Grupo:</label>
                    <input type="text" id="editGrupo" name="editGrupo" required>
                </div>
                <div class="form-group">
                    <label for="editCorreo">Correo Electrónico:</label>
                    <input type="email" id="editCorreo" name="editCorreo" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Actualizar Alumno</button>
                </div>
            </form>
            <div class="alert alert-success" id="alumnoEditadoAlert" style="display: none;">
                Alumno actualizado correctamente.
            </div>
        </div>
    </div>

    <!-- Modal Eliminar Alumno -->
    <div class="modal" id="alumnosEliminarModal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('alumnosEliminarModal')">&times;</span>
            <div class="modal-header">
                <h2><i class="fas fa-user-minus"></i> Eliminar Alumno</h2>
            </div>
            <div class="alert alert-danger">
                ¿Está seguro que desea eliminar al alumno <strong id="eliminarNombreAlumno"></strong>?
                Esta acción no se puede deshacer.
            </div>
            <div class="form-group" style="text-align: right;">
                <button class="btn" onclick="closeModal('alumnosEliminarModal')">Cancelar</button>
                <button class="btn btn-danger" id="confirmarEliminarAlumno">Eliminar</button>
            </div>
            <div class="alert alert-success" id="alumnoEliminadoAlert" style="display: none;">
                Alumno eliminado correctamente.
            </div>
        </div>
    </div>

    <!-- Modales para Usuarios -->
    <!-- Modal Lista de Usuarios -->
    <div class="modal" id="usuariosListaModal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('usuariosListaModal')">&times;</span>
            <div class="modal-header">
                <h2><i class="fas fa-list"></i> Lista de Usuarios</h2>
            </div>
            <div id="usuariosListaContent">
                <table class="data-table" id="usuariosTable">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="usuariosTableBody">
                        <!-- Los datos se cargarán dinámicamente -->
                    </tbody>
                </table>
                <div class="no-data" id="noUsuarios">
                    <i class="fas fa-users"></i>
                    <p>No hay usuarios registrados aún.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Agregar Usuario -->
    <div class="modal" id="usuariosAgregarModal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('usuariosAgregarModal')">&times;</span>
            <div class="modal-header">
                <h2><i class="fas fa-user-plus"></i> Agregar Usuario</h2>
            </div>
            <form id="agregarUsuarioForm">
                <div class="form-group">
                    <label for="nombreUsuario">Nombre de Usuario:</label>
                    <input type="text" id="nombreUsuario" name="nombreUsuario" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="rol">Rol:</label>
                    <select id="rol" name="rol" required>
                        <option value="">Seleccionar Rol</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Editor">Editor</option>
                        <option value="Profesor">Profesor</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select id="estado" name="estado" required>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Guardar Usuario</button>
                </div>
            </form>
            <div class="alert alert-success" id="usuarioAgregadoAlert" style="display: none;">
                Usuario agregado correctamente.
            </div>
        </div>
    </div>

    <!-- Modal Buscar Usuario -->
    <div class="modal" id="usuariosBuscarModal">
        <div class="modal-content">
            <span class="close-modal" onclick="closeModal('usuariosBuscarModal')">&times;</span>
            <div class="modal-header">
                <h2><i class="fas fa-search"></i> Buscar Usuario</h2>
            </div>
            <form id="buscarUsuarioForm">
                <div class="form-group">
                    <label for="buscarUsuario">Nombre de Usuario:</label>
                    <input type="text" id="buscarUsuario" name="buscarUsuario" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Buscar</button>
                </div>
            </form>
            <div id="resultadoBusquedaUsuario" style="display: none;">
                <div class="detail-view">
                    <h3>Detalles del Usuario</h3>
                    <div class="detail-item">
                        <div class="detail-label">Usuario:</div>
                        <div class="detail-value" id="detalleUsuario"></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Rol:</div>
                        <div class="detail-value" id="detalleRol"></div>
                    </div>
                    <div class="detail-item">
                        <div class="detail-label">Estado:</div>
                        <div class="detail-value" id="detalleEstado"></div>
                    </div>
                </div>
                <div style="margin-top: 20px;">
                    <button class="btn edit-btn" id="editarUsuarioBtn"><i class="fas fa-edit"></i> Editar</button>
                    <button class="btn delete-btn" id="eliminarUsuarioBtn"><i class="fas fa-trash"></i> Eliminar</button>
                </div>
            </div>
            <div class="alert alert-danger" id="usuarioNoEncontradoAlert" style="display: none;">
                No se encontró ningún usuario con ese nombre.
            </div>
        </div>
    </div>

    <!-- Modal Editar