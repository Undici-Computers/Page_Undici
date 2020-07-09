<?php


require("class.phpmailer.php");
require("class.smtp.php");

// // Valores enviados desde el formulario
// if ( !isset($_POST["user_name"]) || !isset($_POST["user_email"]) ) {
//     die ("Es necesario completar todos los datos del formulario");
// }





$nombre = $_POST["user_name"];

$email = $_POST["email"];


$destinatario = "info@undicicomputers.it";


// Datos de la cuenta de correo utilizada para enviar v�a SMTP
$smtpHost = "smtp.ionos.es";  // Dominio alternativo brindado en el email de alta 
$smtpUsuario = "formulario@undicicomputers.it";  // Mi cuenta de correo
$smtpClave = "@2WsxLkjh";  // Mi contrase�a




$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Port = 587; 
$mail->IsHTML(true); 
$mail->CharSet = "utf-8";

// VALORES A MODIFICAR //
$mail->Host = $smtpHost; 
$mail->Username = $smtpUsuario; 
$mail->Password = $smtpClave;


$mail->From = $user_email; // Email desde donde env�o el correo.
$mail->FromName = $user_name;
$mail->AddAddress($destinatario); // Esta es la direcci�n a donde enviamos los datos del formulario

$mail->Subject = "Formulario desde el Sitio Web"; // Este es el titulo del email.
$mensajeHtml = nl2br($mensaje);
$mail->Body = "
<html> 

<body> 

<h1>Recibiste un nuevo mensaje desde el formulario de Pagina Principal</h1>

<p>Informacion enviada por el usuario de la web:</p>

<p>nombre: {$nombre}</p>

<p>email: {$email}</p>


<p>asunto: Pagina Principal</p>

<p>Pongase en contacto</p>

</body> 

</html>

<br />"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n "; // Texto sin formato HTML
// FIN - VALORES A MODIFICAR //

$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);

$estadoEnvio = $mail->Send(); 
if($estadoEnvio){
    header("Lacation:http://undicicomputers.it/Grazie-OK.html/");
} else {
    header("Lacation:http://undicicomputers.it/Grazie-NoOK.html/");
}







?>

