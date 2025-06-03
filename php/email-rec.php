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
        $mail->Password   = 'aamm smae prmn lmpg'; // Senha de app
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
//Recebe o email via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['nEmail'];

    $assunto = "Email de Recuperacao - Raccounter";
    $codigo = rand(100000, 999999);

    //mensagem enviada por email
$mensagem = '
<html>
<head>
  <style>
    body {
      font-family: Roboto, Arial, sans-serif;
      background-color: #ffffff;
      color: #202124;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 40px auto;
      padding: 20px;
      border: 1px solid #dadce0;
      border-radius: 8px;
      box-shadow: 0 1px 2px rgba(0,0,0,0.1);
      text-align: center;
    }

    h2 {
      font-size: 20px;
      margin-bottom: 16px;
      color: #1a73e8;
    }

    .code {
      font-size: 32px;
      font-weight: bold;
      letter-spacing: 4px;
      color: #202124;
      background: #f1f3f4;
      padding: 12px 24px;
      border-radius: 8px;
      display: inline-block;
      margin: 20px auto;
    }

    p {
      font-size: 14px;
      line-height: 1.6;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Seu código de verificação</h2>
    <p>Use o código abaixo para continuar:</p>
    <div class="code">' . $codigo . '</div>
    <p>Se você não solicitou esse código, ignore esta mensagem.</p>
  </div>
</body>
</html>
';

    $_SESSION['codigo_recuperacao'] = $codigo;
    $_SESSION['email_recuperacao'] = $email;

    if (sendEmail($email, $assunto, $mensagem)) {
        $_SESSION['msg'] = "E-mail enviado com sucesso!";
        header('Location: ../verificarCodigo.php');
        exit;
    } else {
        $_SESSION['erro_enviar'] = "Erro ao enviar e-mail. Tente novamente.";
        header('Location: ../email-rec.php');
        exit;
    }
} else {
    header('Location: ../email-rec.php');
    exit;
}
