<?php
// Mostra os erros para facilitar depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Inclui arquivos de conexão e funções com caminho relativo correto
require_once __DIR__ . '/../php/conexao.php';
require_once __DIR__ . '/../php/funcoes_salas.php';

// Pega o ID da sala pela URL, se existir
$id_sala = $_GET['id'] ?? null;

if ($id_sala) {
    // Busca dados completos da sala pelo ID
    $sala = buscarSalaPorId($conn, $id_sala);

    if ($sala):
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Contagem de Pessoas na Sala</title>
</head>
<body>
    <h1>Contagem de Pessoas na Sala</h1>
    <h2><?= htmlspecialchars($sala['descricao'] ?? '') ?></h2>
    <p>Lotação atual: <?= htmlspecialchars($sala['lotacao_atual'] ?? 0) ?></p>
    <p>Lotação máxima: <?= htmlspecialchars($sala['lotacao_maxima'] ?? 0) ?></p>
    <p>Status: <?= (!empty($sala['agendamento']) && $sala['agendamento'] == 1) ? 'Ocupada' : 'Livre' ?></p>
</body>
</html>
<?php
    else:
        echo "<p>Sala não encontrada.</p>";
    endif;
} else {
    echo "<p>ID da sala não fornecido.</p>";
}
?>
