<?php

// Establecer conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "practica";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Fallo la conexión: " . $conn->connect_error);
}
echo "Conexión exitosa";

?>