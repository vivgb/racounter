<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendEmail($to, $subject, $message) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'thiagosp419@gmail.com';
        $mail->Password   = 'aamm smae prmn lmpg'; // Use senha de app
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('thiagosp419@gmail.com', 'Raccounter');
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['nEmail'];

    $assunto = "Recuperação de Senha - Raccounter";
    $codigo = rand(100000, 999999);
    $mensagem = "Olá! Seu código de verificação é: <strong>$codigo</strong>";

    $_SESSION['codigo_recuperacao'] = $codigo;
    $_SESSION['email_recuperacao'] = $email;

    if (sendEmail($email, $assunto, $mensagem)) {
        $_SESSION['msg'] = "E-mail enviado com sucesso!";
        header('Location: ../verificarCodigo.php');
        exit;
    } else {
        $_SESSION['msg'] = "Erro ao enviar e-mail. Tente novamente.";
        header('Location: ../email-rec.php');
        exit;
    }
} else {
    header('Location: ../email-rec.php');
    exit;
}
