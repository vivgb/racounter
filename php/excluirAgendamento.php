<?php
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id_agendamento = $_POST['id'];

    // Busca a sala vinculada ao agendamento
    $sqlBuscaSala = "SELECT id_sala FROM agendamentos WHERE id_agendamento = ?";
    $stmtBusca = mysqli_prepare($conn, $sqlBuscaSala);
    mysqli_stmt_bind_param($stmtBusca, "i", $id_agendamento);
    mysqli_stmt_execute($stmtBusca);
    mysqli_stmt_bind_result($stmtBusca, $id_sala);
    mysqli_stmt_fetch($stmtBusca);
    mysqli_stmt_close($stmtBusca);

    // Exclui o agendamento
    $sqlDelete = "DELETE FROM agendamentos WHERE id_agendamento = ?";
    $stmtDel = mysqli_prepare($conn, $sqlDelete);
    mysqli_stmt_bind_param($stmtDel, "i", $id_agendamento);

    if (mysqli_stmt_execute($stmtDel)) {
        mysqli_stmt_close($stmtDel);

        // Verifica se ainda existem agendamentos para essa sala
        $sqlVerifica = "SELECT COUNT(*) FROM agendamentos WHERE id_sala = ?";
        $stmtVerifica = mysqli_prepare($conn, $sqlVerifica);
        mysqli_stmt_bind_param($stmtVerifica, "i", $id_sala);
        mysqli_stmt_execute($stmtVerifica);
        mysqli_stmt_bind_result($stmtVerifica, $qtd);
        mysqli_stmt_fetch($stmtVerifica);
        mysqli_stmt_close($stmtVerifica);

        // Se não houver mais agendamentos, atualiza sala para disponível
        if ($qtd == 0) {
            $sqlAtualiza = "UPDATE salas SET agendamento = 0 WHERE id_salas = ?";
            $stmtAtualiza = mysqli_prepare($conn, $sqlAtualiza);
            mysqli_stmt_bind_param($stmtAtualiza, "i", $id_sala);
            mysqli_stmt_execute($stmtAtualiza);
            mysqli_stmt_close($stmtAtualiza);
        }

        echo "OK";
    } else {
        echo "Erro ao excluir.";
    }

    mysqli_close($conn);
} else {
    echo "Requisição inválida.";
}
