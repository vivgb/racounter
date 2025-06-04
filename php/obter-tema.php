<?php
// obter-tema.php

session_start();
require_once 'conexao.php'; // Arquivo de conexão com o banco de dados

// Verifica se o usuário está logado
if (isset($_SESSION['id_usuario'])) {
    $usuarioId = $_SESSION['id_usuario'];

    // Prepara a query para buscar o tema do usuário no banco
    $stmt = $pdo->prepare("SELECT tema FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', $usuarioId);
    $stmt->execute();

    // Verifica se encontrou o tema
    if ($stmt->rowCount() > 0) {
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        $tema = ($resultado['tema'] == 1) ? 'dark' : 'light';  // Converte 1/0 para 'dark' ou 'light'
        echo json_encode(['tema' => $tema]);
    } else {
        echo json_encode(['tema' => 'light']);  // Se não encontrar, retorna 'light'
    }
} else {
    echo json_encode(['tema' => 'light']);  // Se o usuário não estiver logado, retorna 'light'
}

var_dump("teste");
die();
?>
