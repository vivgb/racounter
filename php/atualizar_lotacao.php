<?php
require_once 'conexao.php';
require_once 'funcoes_salas.php';

header('Content-Type: application/json');

$idSala = intval($_POST['idSala'] ?? 0);
$operacao = $_POST['operacao'] ?? '';

if ($idSala > 0 && in_array($operacao, ['mais', 'menos'])) {
    $sucesso = alterarLotacao($conn, $idSala, $operacao);
    if ($sucesso) {
        $sala = buscarSalaPorId($conn, $idSala);
        echo json_encode(['sucesso' => true, 'nova_lotacao' => $sala['lotacao_atual']]);
    } else {
        echo json_encode(['sucesso' => false, 'erro' => 'Erro ao alterar lotação.']);
    }
} else {
    echo json_encode(['sucesso' => false, 'erro' => 'Dados inválidos.']);
}
?>
