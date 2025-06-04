<?php
// salvar-tema.php

session_start();
require_once 'php/conexao.php'; // Arquivo de conexão com o banco de dados

$data = json_decode(file_get_contents("php://input"), true);

// Verifica se o tema foi enviado e se o usuário está logado
if (isset($data['tema']) && isset($_SESSION['id_usuario'])) {
    $usuarioId = $_SESSION['id_usuario'];  // ID do usuário logado
    $tema = ($data['tema'] === 'dark') ? 1 : 0;  // Salva 1 para dark, 0 para light

    // Prepara a query para atualizar o tema no banco de dados
    $stmt = $pdo->prepare("UPDATE usuarios SET tema = :tema WHERE id = :id");
    $stmt->bindParam(':tema', $tema);
    $stmt->bindParam(':id', $usuarioId);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'sucesso']);
    } else {
        echo json_encode(['status' => 'erro']);
    }
} else {
    echo json_encode(['status' => 'erro', 'mensagem' => 'Dados inválidos']);
}
?>
