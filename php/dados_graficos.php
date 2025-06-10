<?php
header('Content-Type: application/json');

// Conexão com o banco
$conn = new mysqli('localhost', 'root', '', 'sistema_contagem');
if ($conn->connect_error) {
    die(json_encode(['erro' => 'Erro na conexão com o banco']));
}

// Consulta: conta movimentações por sala
$sql = "
    SELECT s.descricao AS sala, COUNT(m.id_movimentacao) AS total_movimentacoes
    FROM salas s
    INNER JOIN movimentacao m ON s.id_salas = m.id_salas
     WHERE DATE(m.data_hora) = CURDATE()
    GROUP BY s.id_salas
    ORDER BY total_movimentacoes DESC
";

$result = $conn->query($sql);

$dados = [];
while ($row = $result->fetch_assoc()) {
    $dados[] = [
        'sala' => $row['sala'],
        'total' => (int)$row['total_movimentacoes']
    ];
}

echo json_encode($dados);
$conn->close();
?>
