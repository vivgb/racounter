<?php
require_once __DIR__ . '/../php/conexao.php';
require_once __DIR__ . '/../php/funcoes.php';
include('idioma.js');
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $descricao = trim($_POST['descricao'] ?? '');
    $lotacao_maxima = intval($_POST['lotacao_maxima'] ?? 0);

    // Validação simples
    if ($descricao === '') {
        $mensagem = "Por favor, informe a descrição da sala.";
    } elseif ($lotacao_maxima <= 0) {
        $mensagem = "Informe uma lotação máxima válida.";
    } else {
        // Tenta inserir no banco
        if (adicionarSala($conn, $descricao, $lotacao_maxima)) {
            // Sucesso: redireciona para página de salas
            header("Location: painel.php?page=salas");
            exit;
        } else {
            $mensagem = "Erro ao adicionar sala. Tente novamente.";
        }
    }
}
?>

<h1>Adicionar Nova Sala</h1>

<?php if ($mensagem): ?>
    <p style="color:red;"><?= htmlspecialchars($mensagem) ?></p>
<?php endif; ?>

<form method="POST" action="">
    <label>Descrição:<br>
        <input type="text" name="descricao" value="<?= htmlspecialchars($_POST['descricao'] ?? '') ?>" required>
    </label><br><br>

    <label>Lotação Máxima:<br>
        <input type="number" name="lotacao_maxima" min="1" value="<?= htmlspecialchars($_POST['lotacao_maxima'] ?? '') ?>" required>
    </label><br><br>

    <button type="submit">Adicionar Sala</button>
</form>
