<?php
session_start();
include("conexao.php");

$idUsuario = $_SESSION['idLogin'] ?? null;

if (!$idUsuario) {
    echo json_encode(['erro' => 'Usuário não logado.']);
    exit;
}

$msgErro = '';
$dirImagem = $_SESSION['fotoPerfil']; 

// FOTO
if (isset($_FILES['nFoto']) && is_uploaded_file($_FILES['nFoto']['tmp_name'])) {
    $extensao = pathinfo($_FILES['nFoto']['name'], PATHINFO_EXTENSION);
    $novoNome = md5($_FILES['nFoto']['name'] . time()) . '.' . $extensao;
    $diretorio = '../imagem/';

    if (!is_dir($diretorio)) mkdir($diretorio, 0755, true);

    if (move_uploaded_file($_FILES['nFoto']['tmp_name'], $diretorio . $novoNome)) {
        $dirImagem = 'imagem/' . $novoNome;
    } else {
        $msgErro = 'Erro ao mover a imagem.';
    }
} else if (!empty($_POST['fotoIcone']) && strpos($_POST['fotoIcone'], 'img/guaxinim/') === 0) {
    $dirImagem = $_POST['fotoIcone'];
}

// SENHA 
$senhaAtual = $_POST['senhaAtual'] ?? '';
$novaSenha = $_POST['novaSenha'] ?? '';
$confirmarSenha = $_POST['confirmarSenha'] ?? '';

if (!empty($senhaAtual) && !empty($novaSenha) && !empty($confirmarSenha)) {
    $stmt = mysqli_prepare($conn, "SELECT senha FROM usuarios WHERE id_usuario = ?");
    mysqli_stmt_bind_param($stmt, "i", $idUsuario);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $dados = mysqli_fetch_assoc($resultado);

    $senhaAtualHash = md5($senhaAtual);

    if (!$dados || $senhaAtualHash !== $dados['senha']) {
        $msgErro = "Senha atual incorreta.";
    } elseif ($novaSenha !== $confirmarSenha) {
        $msgErro = "Nova senha e confirmação não coincidem.";
    } else {
        $novaSenhaHash = md5($novaSenha);
        $stmtUpdate = mysqli_prepare($conn, "UPDATE usuarios SET senha = ? WHERE id_usuario = ?");
        mysqli_stmt_bind_param($stmtUpdate, "si", $novaSenhaHash, $idUsuario);
        mysqli_stmt_execute($stmtUpdate);
    }
}

// FOTO sempre atualiza se passou
if (!$msgErro) {
    $sql = "UPDATE usuarios SET foto = '$dirImagem' WHERE id_usuario = $idUsuario";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['fotoPerfil'] = $dirImagem;
        header("Location: /racounter/painel.php?page=Perfil&sucesso=1");
        exit;
    } else {
        $msgErro = "Erro ao atualizar no banco: " . mysqli_error($conn);
    }
}

// Redireciona com erro
header("Location: /racounter/painel.php?page=Perfil&erro=" . urlencode($msgErro));
exit;

?>
