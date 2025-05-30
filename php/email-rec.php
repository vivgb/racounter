<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';
require_once 'conexao.php'; // se precisar
require_once 'funcoes.php'; // se precisar

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendEmail($to, $subject, $message) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'thiagosp419@gmail.com';
        $mail->Password   = 'aamm smae prmn lmpg';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('thiagosp419@gmail.com', 'Raccounter');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

