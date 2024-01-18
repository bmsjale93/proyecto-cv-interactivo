<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = isset($_POST['nombre']) ? $db->conn->real_escape_string($_POST['nombre']) : '';
    $email = isset($_POST['email']) ? $db->conn->real_escape_string($_POST['email']) : '';
    $mensaje = isset($_POST['mensaje']) ? $db->conn->real_escape_string($_POST['mensaje']) : '';

    $stmt = $db->conn->prepare("INSERT INTO formulario (nombre, email, mensaje) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $mensaje);

    if ($stmt->execute()) {
        echo "Datos guardados exitosamente";

        // Preparar el correo electrónico
        $to = 'bmsjale@gmail.com'; // Cambia esto por tu correo electrónico
        $subject = 'Nuevo mensaje del formulario de contacto';
        $message = "Has recibido un nuevo mensaje:\n\n";
        $message .= "Nombre: " . $nombre . "\n";
        $message .= "Email: " . $email . "\n";
        $message .= "Mensaje: " . $mensaje . "\n";

        // Encabezados adicionales
        $headers = 'From: bmsjale@gmail.com' . "\r\n"; // Cambia esto por tu dirección de correo del remitente
        $headers .= 'Reply-To: ' . $email . "\r\n";
        $headers .= 'X-Mailer: PHP/' . phpversion();

        // Enviar el correo electrónico
        mail($to, $subject, $message, $headers);
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $db->conn->close();
} else {
    echo "Método de solicitud no permitido";
}