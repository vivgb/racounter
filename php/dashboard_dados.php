<?php
require_once 'conexao.php';

$entradas = $saidas = $salas_ativas = 0;

$res = $conn->query("SELECT COUNT(*) AS total FROM movimentacao WHERE tipo = 1 AND DATE(data_hora) = CURDATE()");
$entradas = $res->fetch_assoc()['total'] ?? 0;

$res = $conn->query("SELECT COUNT(*) AS total FROM movimentacao WHERE tipo = 0 AND DATE(data_hora) = CURDATE()");
$saidas = $res->fetch_assoc()['total'] ?? 0;

$res = $conn->query("SELECT COUNT(*) AS total FROM salas WHERE lotacao_atual > 0 AND ativo = 1");
$salas_ativas = $res->fetch_assoc()['total'] ?? 0;

$total = $entradas + $saidas;

$agendamentos = [];
$sql = "
    SELECT 
        a.data, 
        a.hora_inicio,
        a.hora_fim,
        s.descricao AS nome_sala, 
        u.nome AS nome_usuario,
        a.titulo
    FROM agendamentos a
    JOIN salas s ON a.id_sala = s.id_salas
    JOIN usuarios u ON a.id_usuario = u.id_usuario
    ORDER BY a.data DESC
    LIMIT 5
";


$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
    $agendamentos[] = $row;
}

echo json_encode([
    'entradas' => $entradas,
    'saidas' => $saidas,
    'salas_ativas' => $salas_ativas,
    'total' => $total,
    'agendamentos' => $agendamentos
]);
$con = null;