<?php
require_once "../conexion.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $password = $_POST["password"];

    // Consulta SQL extremadamente vulnerable a inyección
    $sql = "SELECT * FROM users WHERE user = '$user' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['user'] = $user;
        header("Location: /view/panel.php");
        exit();
    } else {
        $_SESSION['error'] = "Usuario o contraseña incorrectos.";
    }

    $conn->close();

    header("Location: /view/login.php");
    exit();
}
?>