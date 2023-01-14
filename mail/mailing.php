<?php

# On active les sessions
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php"; 

// Creation d'un PHPMailer
$mail = new PHPMailer(true);

try {
    // Param PHPMailer
    $mail->isSMTP();
    $mail->Host='localhost';
    $mail->Port=1025; // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    // Emetteur / Destinataire
    $mail->setFrom('admin@VassEtLudo.com', 'admin');
    $mail->addAddress('recuperemail_user@gmail.com', '');     //
    
    // Piece jointe
    $mail->addAttachment('../img/cadeau.jpeg');

    // Contenu
    $mail->isHTML(true);  //Format d'envoie de l'e mail
    $mail->Subject = 'Valider votre e-mail';
    $mail->Body = '<div><b>Bonjour,</b><br>
                      <br>
                      Vous y etes presque ! Cliquez sur le lien pour confirmer votre adresse e-mail. 
                      <br><a href=http://localhost/projet_vassili_ludovic/login.php>Ici</a>
                      <br><br>
                      P.S : Pensez à regarder vos pièces jointes.
                      </div>';
    $mail->send();
    header("Location: sentMail.php");
} catch (Exception $e) {
    echo "Le message ne peut être envoyé. Erreur sur le Mailer : {$mail->ErrorInfo}";
}
?>