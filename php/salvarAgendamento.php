<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['eventTitle'];
    $data = $_POST['eventDate'];
    $inicio = $_POST['startTime'];
    $fim = $_POST['endTime'];
    $cor = $_POST['cor'] ?? '#3b82f6';
    $id_sala = $_POST['sala'];
    $id_usuario = $_SESSION['idLogin'];
    $id_agendamento = $_POST['eventId'] ?? null;

    if ($id_agendamento) {
        // Atualiza
        $sql = "UPDATE agendamentos 
                SET titulo = ?, data = ?, hora_inicio = ?, hora_fim = ?, cor = ?, id_sala = ?
                WHERE id_agendamento = ? AND id_usuario = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssssssii", $titulo, $data, $inicio, $fim, $cor, $id_sala, $id_agendamento, $id_usuario);
    } else {
        // Insere novo
        $sql = "INSERT INTO agendamentos (id_usuario, id_sala, titulo, data, hora_inicio, hora_fim, cor)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "iisssss", $id_usuario, $id_sala, $titulo, $data, $inicio, $fim, $cor);
    }

    if (mysqli_stmt_execute($stmt)) {
        // Atualiza a sala como agendada
        $sqlUpdateSala = "UPDATE salas SET agendamento = 1 WHERE id_salas = ?";
        $stmtUpdate = mysqli_prepare($conn, $sqlUpdateSala);
        mysqli_stmt_bind_param($stmtUpdate, "i", $id_sala);
        mysqli_stmt_execute($stmtUpdate);
        mysqli_stmt_close($stmtUpdate);


        // Redireciona de volta para a página anterior
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    } else {
        echo "Erro ao salvar agendamento: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>


