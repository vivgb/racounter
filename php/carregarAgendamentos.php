<?php
include("conexao.php");

$sql = "SELECT 
            a.id_agendamento,
            a.titulo,
            a.data,
            a.hora_inicio,
            a.hora_fim,
            a.cor,
            a.id_sala,
            s.descricao AS sala_nome
        FROM agendamentos a
        JOIN salas s ON a.id_sala = s.id_salas";

$result = mysqli_query($conn, $sql);

$eventos = [];

while ($row = mysqli_fetch_assoc($result)) {
    $eventos[] = [
        "id"    => $row["id_agendamento"],
        "title" => $row["titulo"] . " - " . $row["sala_nome"],
        "start" => $row["data"] . "T" . $row["hora_inicio"],
        "end"   => $row["data"] . "T" . $row["hora_fim"],
        "color" => $row["cor"],
        "sala"  => $row["id_sala"],  // <-- necessário para o select de edição
        "titulo" => $row["titulo"]   // <-- necessário para preencher o form
    ];
}

header('Content-Type: application/json');
echo json_encode($eventos);
