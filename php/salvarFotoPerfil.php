<?php
session_start();
include("conexao.php");

$idUsuario = $_SESSION['idUsuario'] ?? null;

if (!$idUsuario) {
    echo json_encode(["status" => "erro", "mensagem" => "Usuário não autenticado."]);
    exit;
}

if (isset($_POST['fotoIcone'])) {
    // Ícone pré-definido selecionado
    $foto = $_POST['fotoIcone'];
    $stmt = $conn->prepare("UPDATE Usuario SET Foto = ? WHERE id = ?");
    $stmt->bind_param("si", $foto, $idUsuario);
    $stmt->execute();
    echo json_encode(["status" => "sucesso", "mensagem" => "Ícone atualizado com sucesso."]);
    exit;
}

if (isset($_FILES['nFoto']) && $_FILES['nFoto']['error'] == 0) {
    $arquivo = $_FILES['nFoto']['tmp_name'];
    $conteudo = file_get_contents($arquivo);
    $conteudo = base64_encode($conteudo);

    $stmt = $conn->prepare("UPDATE Usuario SET Foto = ? WHERE id = ?");
    $stmt->bind_param("si", $conteudo, $idUsuario);
    $stmt->execute();
    echo json_encode(["status" => "sucesso", "mensagem" => "Foto de perfil atualizada com sucesso."]);
    exit;
}

echo json_encode(["status" => "erro", "mensagem" => "Nenhuma foto recebida."]);
