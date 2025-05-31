<?php

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

include("funcoes.php");
include("conexao.php");

$_SESSION['logado'] = 0;

$email = stripslashes($_POST["nEmail"]);
$senha = stripslashes($_POST["nSenha"]);

// Verifica se o e-mail existe no banco
$sqlEmail = "SELECT * FROM usuarios WHERE email = '$email'";
$resultEmail = mysqli_query($conn, $sqlEmail);

if (mysqli_num_rows($resultEmail) === 0) {
    $_SESSION['erro_login'] = "Usuário não encontrado! Registre-se para entrar.";
    mysqli_close($conn);
    header('Location: ../index.php');
    exit;
}

// Verifica se o e-mail e senha batem
$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = md5('$senha')";
$resultLogin = mysqli_query($conn, $sql);
mysqli_close($conn);

if (mysqli_num_rows($resultLogin) > 0) {
    foreach ($resultLogin as $coluna) {
        $_SESSION['idTipoUsuario'] = $coluna['id_tipo_usuario'];
        $_SESSION['logado']        = 1;
        $_SESSION['idLogin']       = $coluna['id_usuario'];
        $_SESSION['NomeLogin']     = $coluna['nome'];
        $_SESSION['FotoLogin']     = $coluna['Foto'];
        $_SESSION['AtivoLogin']    = $coluna['flg_ativos'];

        header('location: ../painel.php');
        exit;
    }
} else {
    $_SESSION['erro_login'] = "Usuário ou senha incorretos!";
    header('location: ../index.php');
    exit;
}
?>
