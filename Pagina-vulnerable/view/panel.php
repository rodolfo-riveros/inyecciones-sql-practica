<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['user'])) {
    header("Location: /view/login.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?php echo htmlspecialchars($user); ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger text-white" href="/controller/logout.php">Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container my-5">
        <div class="text-center">
            <h1>Dashboard de Usuarios Logeados</h1>
            <p class="lead">Bienvenido a tu aplicación de Panel.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Usuarios Logeados
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Hora de Login</th>
                                </tr>
                            </thead>
                            <tbody id="user-table-body">
                                <!-- Aquí se insertarán los usuarios logeados -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Datos de ejemplo
            const usuariosLogeados = [
                { usuario: "Juan Perez", hora: "10:00 AM" },
                { usuario: "Maria Lopez", hora: "10:30 AM" },
                { usuario: "Carlos Ramirez", hora: "11:00 AM" }
            ];

            const tableBody = document.getElementById('user-table-body');

            usuariosLogeados.forEach(user => {
                const row = document.createElement('tr');
                const usuarioCell = document.createElement('td');
                usuarioCell.textContent = user.usuario;
                const horaCell = document.createElement('td');
                horaCell.textContent = user.hora;

                row.appendChild(usuarioCell);
                row.appendChild(horaCell);
                tableBody.appendChild(row);
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
