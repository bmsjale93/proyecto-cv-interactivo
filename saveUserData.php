<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "proyecto_cv";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Asegúrate de que el método de solicitud sea POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del usuario
    $session_id = $_POST['session_id'];
    $consent = $_POST['consent'] ? 1 : 0; // Convertir a booleano

    // Preparar la consulta SQL
    $stmt = $conn->prepare("INSERT INTO cookies (session_id, consent) VALUES (?, ?)");
    $stmt->bind_param("si", $session_id, $consent);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Datos guardados exitosamente";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar sentencia y conexión
    $stmt->close();
    $conn->close();
} else {
    echo "Método de solicitud no permitido";
}