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

        <section id="contagem">
            <h1 class="bigtitle">
                Controle de movimentação
                <i class='bx  bx-chevron-left' onclick="window.location.href='./painel.php?page=salas'"></i> 
            </h1>
            <div id="controles">
                <p class="title"><?= htmlspecialchars($sala['descricao'] ?? '') ?></p>
                <div id="conteudo">
                    <div id="menos" class="acoes">
                        <i class='bx  bx-minus'  ></i> 
                    </div>
                    <div id="lotacao">
                        <p><?= $sala['lotacao_atual'] ?>/<?= $sala['lotacao_maxima'] ?></p>
                    </div>
                    <div id="mais" class="acoes">
                        <i class='bx bx-plus meu-icone'></i>
                    </div>
                </div>
            </div>
            <div id="info">
                <p class="subtitle">Informações</p>
                <p>Lotação atual: <?= htmlspecialchars($sala['lotacao_atual'] ?? 0) ?></p>
                <p>Lotação máxima: <?= htmlspecialchars($sala['lotacao_maxima'] ?? 0) ?></p>
                <p>Status: <?= (!empty($sala['agendamento']) && $sala['agendamento'] == 1) ? 'Agendada' : 'Sem agendamentos' ?></p>
                <p>Usuário vinculado:</p>
            </div>
            <div id="agendamentos">
                <p class="subtitle">Agendamentos</p>
            </div>
            <div id="historico">
                <p class="subtitle">Histórico de movimentação</p>
            </div>

        </section>
<?php
    else:
        echo "<p>Sala não encontrada.</p>";
    endif;
} else {
    echo "<p>ID da sala não fornecido.</p>";
}
?>
