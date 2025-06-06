<?php
header('Content-Type: application/json');

include("conexao.php");

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo json_encode(['success' => false, 'message' => 'ID não informado']);
    exit;
}

$id = intval($_GET['id']);

$sql = "SELECT u.id_usuario, u.nome, u.email, u.id_tipo_usuario, u.flg_ativos, u.foto, u.data_nasc
        FROM usuarios u
        WHERE u.id_usuario = $id
        LIMIT 1";


$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $usuario = $result->fetch_assoc();

    // Caso a coluna foto armazene só o nome do arquivo, monte o caminho correto aqui, se quiser
    // $usuario['foto'] = 'uploads/' . $usuario['foto'];

    echo json_encode([
        'success' => true,
        'usuario' => $usuario
    ]);
} else {
    echo json_encode(['success' => false, 'message' => 'Usuário não encontrado']);
}
