<?php
session_start();
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigoDigitado = $_POST['nCode'];
    $email = $_SESSION['email_recuperacao'];

    // Verifica se o e-mail e código batem com os do banco
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND codigo_recuperacao = '$codigoDigitado'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        // Código correto, redireciona para nova senha
        header('Location: ../novaSenha.php');
        exit;
    } else {
        // Código incorreto
        $_SESSION['erro_codigo'] = "Código inválido!";
        header('Location: ../verificarCodigo.php');
        exit;
    }
} else {
    header('Location: ../verificarCodigo.php');
    exit;
}
