<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Configurar el correo
    $to = 'teeninformatics@gmail.com'; // Cambia esto por tu dirección de correo
    $subject = 'Nuevo mensaje de contacto';
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Contenido del correo
    $email_body = "<h2>Nuevo mensaje de contacto</h2>";
    $email_body .= "<p><strong>Nombre:</strong> $name</p>";
    $email_body .= "<p><strong>Email:</strong> $email</p>";
    $email_body .= "<p><strong>Mensaje:</strong><br>$message</p>";

    // Enviar el correo
    if (mail($to, $subject, $email_body, $headers)) {
        echo 'El mensaje se ha enviado correctamente.';
    } else {
        echo 'Hubo un error al enviar el mensaje. Por favor, inténtalo de nuevo.';
    }
} else {
    echo 'No se ha enviado el formulario.';
}
?>
