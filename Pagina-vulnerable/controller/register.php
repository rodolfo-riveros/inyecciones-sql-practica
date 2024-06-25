<?php
require_once "../conexion.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $password = $_POST["password"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Preparar la consulta SQL
    $stmt = $conn->prepare("INSERT INTO users (user, password) VALUES (?, ?)");
    if ($stmt === false) {
        $_SESSION['error'] = "Error en la preparación de la consulta: " . $conn->error;
        header("Location: /view/register.php");
        exit();
    }

    $stmt->bind_param("ss", $user, $hashed_password);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        $_SESSION['success'] = "Usuario registrado exitosamente";
        // Redirigir al panel de control después de un registro exitoso
        header("Location: /view/panel.php");
    } else {
        $_SESSION['error'] = "Error al registrar el usuario: " . $stmt->error;
        header("Location: /view/login.php");
    }

    // Cerrar la declaración
    $stmt->close();
    // Cerrar la conexión
    $conn->close();

    exit();
}
?>