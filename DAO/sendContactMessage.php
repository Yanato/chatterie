<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../vendor/autoload.php';

if (!empty($_POST["message"])) {
    $message = nl2br(stripslashes($_POST["message"]));
}
if (!empty($_POST["name"])) {
    $name = stripslashes($_POST["name"]);
}
if (!empty($_POST["email"])) {
    $pemail = stripslashes($_POST["email"]);

    $subject = "Nouveau message de ".$name;

    try {
        $mail = new PHPMailer(true);
        $mail->setFrom($pemail, $name);
        $mail->addAddress('mikadu355@yahoo.fr', 'Mika'); // destinataire
        $mail->isHTML(true);
        $mail->AddReplyTo($pemail, $name);
        $lmessage = "<b>Message de : </b>". $name ."<br><b>Mail : </b>". $pemail ."<br>";
        if (!empty($_POST["phone"])) {
            $phone = stripslashes($_POST["phone"]);
            $clientphone = "<b>Numero de telephone : </b>".$phone."<br>";
            $lmessage .= $clientphone;
        }
        $lmessage .= "<br>".$message;
        $mail->Subject   = $subject;
        $mail->Body      = $lmessage;
        $mail->Send();
        header('Location: /contact.php?message=ok');
    } catch (phpmailerException $e) {
        echo $e->errorMessage(); //Pretty error messages from PHPMailer
    } catch (Exception $e) {
        echo $e->getMessage(); //Boring error messages from anything else!
    }
}
