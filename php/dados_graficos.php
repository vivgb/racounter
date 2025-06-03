<?php
header('Content-Type: application/json');

// Conexão com o banco
$conn = new mysqli('localhost', 'root', '', 'sistema_contagem');
if ($conn->connect_error) {
    die(json_encode(['erro' => 'Erro na conexão com o banco']));
}

// Consulta corrigida
$sql = "
    SELECT s.descricao AS sala, COUNT(a.id_agendamento) AS total_agendamentos
    FROM salas s
    LEFT JOIN agendamentos a ON s.id_salas = a.id_sala
    GROUP BY s.id_salas
";

$result = $conn->query($sql);

$dados = [];
while ($row = $result->fetch_assoc()) {
    $dados[] = [
        'sala' => $row['sala'],
        'total' => (int)$row['total_agendamentos']
    ];
}

echo json_encode($dados);
$conn->close();
?>
