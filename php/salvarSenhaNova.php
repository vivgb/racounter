<?php
session_start();
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novaSenha = $_POST['nSenha'] ?? '';
    $confirmarSenha = $_POST['nConfSenha'] ?? '';

    if ($novaSenha !== $confirmarSenha) {
        $_SESSION['erro_senha'] = "As senhas não coincidem.";
        header("Location: ../novaSenha.php");
        exit;
    }

    if ($novaSenha != '') {
        $senhaMd5 = md5($novaSenha);
        $setSenha = "senha = '$senhaMd5',";
    } else {
        $setSenha = "";
    }

    $email = mysqli_real_escape_string($conn, $_SESSION['email_recuperacao'] ?? '');

    $sql = "UPDATE usuarios SET $setSenha codigo_recuperacao = NULL WHERE email = '$email'";
    mysqli_query($conn, $sql);

    unset($_SESSION['email_recuperacao'], $_SESSION['codigo_recuperacao']);
    header("Location: ../index.php");
    exit;
} else {
    header("Location: ../email-rec.php");
    exit;
}
?>