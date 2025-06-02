<?php
// dados_grafico.php

// Conexão com o banco
include("conexao.php");

// Consulta SQL: conta quantos agendamentos existem por sala
$sql = "
    SELECT s.descricao AS sala, COUNT(a.id_agendamento) AS total
    FROM salas s
    LEFT JOIN agendamentos a ON s.id_salas = a.id_sala
    GROUP BY s.id_salas
    ORDER BY total DESC
";

$result = $conn->query($sql);

$salas = [];
$totais = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $salas[] = $row['sala'];
        $totais[] = (int)$row['total'];
    }
}

echo json_encode([
    'labels' => $salas,
    'data' => $totais
]);

?>
