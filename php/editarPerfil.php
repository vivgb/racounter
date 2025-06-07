<?php
session_start();
include("conexao.php");

if (!isset($_SESSION['idLogin'])) {
    die("Acesso negado.");
}

$idUsuario = $_SESSION['idLogin'];
$nome = $_POST['nNome']; // Corrigido aqui
$senhaAtual = $_POST['senha_atual'] ?? '';
$novaSenha = $_POST['nova_senha'] ?? '';
$setSenha = "";

// Busca a senha atual do banco
$sqlSenha = "SELECT senha FROM usuarios WHERE id_usuario = $idUsuario";
$resultSenha = mysqli_query($conn, $sqlSenha);
$dadosSenha = mysqli_fetch_assoc($resultSenha);

// Verifica se a senha atual confere SOMENTE se quiser trocar
if (!empty($novaSenha)) {
    if (md5($senhaAtual) !== $dadosSenha['senha']) {
        die("Senha atual incorreta.");
    }
    $setSenha = ", senha = md5('$novaSenha')";
}

// Atualiza nome e senha (se necessário)
$sql = "UPDATE usuarios SET nome = '$nome' $setSenha WHERE id_usuario = $idUsuario";
mysqli_query($conn, $sql);

// Atualiza nome na sessão
$_SESSION['NomeLogin'] = $nome;

// Upload de foto, se houver
if (!empty($_FILES['nFoto']['tmp_name'])) {
    $extensao = pathinfo($_FILES['nFoto']['name'], PATHINFO_EXTENSION);
    $novoNome = md5($_FILES['nFoto']['name'] . time()) . '.' . $extensao;

    $diretorio = '../img/';
    if (!is_dir($diretorio)) {
        mkdir($diretorio);
    }

    move_uploaded_file($_FILES['nFoto']['tmp_name'], $diretorio . $novoNome);

    $caminhoFoto = 'img/' . $novoNome;

    $sqlImg = "UPDATE usuarios SET foto = '$caminhoFoto' WHERE id_usuario = $idUsuario";
    mysqli_query($conn, $sqlImg);

    $_SESSION['FotoLogin'] = $caminhoFoto;
}

mysqli_close($conn);
echo "<script>window.location.href = 'painel.php?page=home';</script>";
exit;

?>
