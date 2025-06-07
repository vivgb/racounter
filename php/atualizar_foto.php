<?php
session_start();
include("conexao.php");

$idUsuario = $_SESSION['idLogin'] ?? null;

if (!$idUsuario) {
    echo "Usuário não logado.";
    exit;
}

if (isset($_FILES['nFoto']) && is_uploaded_file($_FILES['nFoto']['tmp_name'])) {
    // Upload de arquivo normal (foto do PC)
    $extensao = pathinfo($_FILES['nFoto']['name'], PATHINFO_EXTENSION);
    $novoNome = md5($_FILES['nFoto']['name'] . time()) . '.' . $extensao;
    $diretorio = '../imagem/';

    if (!is_dir($diretorio)) {
        mkdir($diretorio, 0755, true);
    }

    if (move_uploaded_file($_FILES['nFoto']['tmp_name'], $diretorio . $novoNome)) {
        $dirImagem = 'imagem/' . $novoNome;
    } else {
        echo "Erro ao mover a imagem.";
        exit;
    }
} else if (!empty($_POST['fotoIcone']) && strpos($_POST['fotoIcone'], 'img/guaxinim/') === 0) {
    $dirImagem = $_POST['fotoIcone'];
}
 else {
    echo "Nenhuma imagem enviada.";
    exit;
}

$sql = "UPDATE usuarios SET foto = '$dirImagem' WHERE id_usuario = $idUsuario";
if (mysqli_query($conn, $sql)) {
    $_SESSION['fotoPerfil'] = $dirImagem;
    header("Location: /racounter/painel.php?page=Perfil&fotoAtualizada=1");
    exit;
} else {
    echo "Erro ao atualizar no banco: " . mysqli_error($conn);
}
?>
