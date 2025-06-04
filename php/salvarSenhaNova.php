<?php 
session_start();
require 'conexao.php';
if ($novaSenha != ''){
    $setSenha = "senha = md5('$senha'),";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novaSenha = $_POST['nSenha'];
    $confirmarSenha = $_POST['nConfSenha'];

    if ($novaSenha !== $confirmarSenha) {
        $_SESSION['erro_senha'] = "As senhas não coincidem.";
        header("Location: ../novaSenha.php");
        exit;
    }else{

        $email = $_SESSION['email_recuperacao'];
        $setSenha = $novaSenha;
    
        $sql = "UPDATE usuarios SET senha = '$setSenha', codigo_recuperacao = NULL WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
    }

    if ($result) {
        unset($_SESSION['email']);
        unset($_SESSION['codigo_recuperacao']);
        header("Location: ../index.php");
        exit;
    } else {
        header("Location: ../novaSenha.php");
        exit;
    }
} else {
    header("Location: ../email-rec.php");
    exit;
}