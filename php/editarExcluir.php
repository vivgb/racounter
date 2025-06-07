<?php
session_start();
include("conexao.php");

header("Content-Type: application/json");

// Verifica se o usuário está logado
if (!isset($_SESSION['idLogin'])) {
    echo json_encode(['sucesso' => false, 'erro' => 'Usuário não logado.']);
    exit;
}

// Pega os dados do formulário
$idSala         = intval($_POST['idSala'] ?? 0);
$descricao      = $_POST['descricao'] ?? '';
$lotacao_maxima = intval($_POST['lotacao_maxima'] ?? 0);
$id_empresa     = intval($_POST['id_empresa'] ?? 0);
$id_usuario     = intval($_POST['id_usuario'] ?? 0); // usuário vinculado à sala

// Validação simples
if ($idSala === 0 || $descricao === '' || $lotacao_maxima <= 0 || $id_empresa === 0 || $id_usuario === 0) {
    echo json_encode(['sucesso' => false, 'erro' => 'Preencha todos os campos corretamente.']);
    exit;
}

// Atualiza a sala no banco de dados
$sql = "UPDATE salas 
        SET descricao = ?, 
            lotacao_maxima = ?, 
            id_empresa = ?, 
            id_usuario = ?
        WHERE id_salas = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "siiii", $descricao, $lotacao_maxima, $id_empresa, $id_usuario, $idSala);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode(['sucesso' => true, 'mensagem' => 'Sala atualizada com sucesso!']);
} else {
    echo json_encode(['sucesso' => false, 'erro' => 'Erro ao atualizar a sala.']);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
