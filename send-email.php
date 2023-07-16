<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'php/phpmailer/src/Exception.php';
require 'php/phpmailer//src/PHPMailer.php';
require 'php/phpmailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibe los datos del formulario
    $nombre = $_POST['nombre'];
    $email = $_POST['correo'];
    $mensaje = $_POST['comentario'];

    // Configuración de correo
    $destinatario = 'ransedweb@gmail.com';
    $asunto = 'Informacion del contacto';

    // Crea una instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor de correo
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ransedweb@gmail.com';
        $mail->Password = 'm4j1c_1993';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configuración del remitente y destinatario
        $mail->setFrom($email, $nombre);
        $mail->addAddress($destinatario);

        // Construye el cuerpo del correo
        $mail->Subject = $asunto;
        $mail->Body = "Nombre: " . $nombre . "\n";
        $mail->Body .= "Email: " . $email . "\n";
        $mail->Body .= "Mensaje: " . $mensaje;

        // Envía el correo
        $mail->send();

        echo "¡Gracias por tu mensaje! Pronto nos pondremos en contacto contigo.";

    } catch (Exception $e) {
        echo "Hubo un problema al enviar el mensaje. Por favor, inténtalo de nuevo.";
    }
}
?>