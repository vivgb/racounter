<?php
session_start();

error_reporting(E_ALL); ini_set('display_errors', 1);

require_once __DIR__ . '/conexao.php';
require_once __DIR__ . '/funcoes_salas.php';

header('Content-Type: application/json');

$idSala = intval($_POST['idSala'] ?? 0);
$operacao = $_POST['operacao'] ?? '';
$id_usuario = $_SESSION['idLogin'] ?? 0;  // Pega o ID do usuário logado
$tipo_usuario = $_SESSION['idTipoUsuario']; // Tipo do usuário (1 = admin)


// 1. Verifica se usuário está autenticado
if ($id_usuario === 0) {
    echo json_encode(['sucesso' => false, 'erro' => 'Usuário não autenticado.']);
    exit;
}

// 2. Verifica se a sala existe e busca usuário vinculado
$sql = "SELECT id_usuario FROM salas WHERE id_salas = $idSala";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) === 0) {
    echo json_encode(['sucesso' => false, 'erro' => 'Sala não encontrada.']);
    exit;
}
$row = mysqli_fetch_assoc($result);
$id_usuario_vinculado = $row['id_usuario'];

// 3. Verifica se o usuário logado é o vinculado à sala
if ($tipo_usuario != 1 && $id_usuario !== $id_usuario_vinculado) {
    echo json_encode(['sucesso' => false, 'erro' => 'Você não tem permissão para alterar a lotação desta sala.']);
    exit;
}

// 4. Se tudo OK, executa a alteração
if ($idSala > 0 && in_array($operacao, ['mais', 'menos'])) {
    $sucesso = alterarLotacao($conn, $idSala, $operacao);

    if ($sucesso) {
        $tipo = ($operacao == 'mais' ? 1 : 0);
        registrarMovimentacao($conn, $id_usuario, $idSala, $tipo);
        $sala = buscarSalaPorId($conn, $idSala);
        echo json_encode(['sucesso' => true, 'nova_lotacao' => $sala['lotacao_atual']]);
    } else {
        echo json_encode(['sucesso' => false, 'erro' => 'Erro ao alterar lotação.']);
    }
} else {
    echo json_encode(['sucesso' => false, 'erro' => 'Dados inválidos.']);
}



?>

