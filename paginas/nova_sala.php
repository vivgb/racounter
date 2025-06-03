<?php
require_once __DIR__ . '/../php/conexao.php';
require_once __DIR__ . '/../php/funcoes.php';

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = trim($_POST['descricao'] ?? '');
    $lotacao_maxima = intval($_POST['lotacao_maxima'] ?? 0);

    if ($descricao === '') {
        $mensagem = "Por favor, informe a descrição da sala.";
    } elseif ($lotacao_maxima <= 0) {
        $mensagem = "Informe uma lotação máxima válida.";
    } else {
        if (adicionarSala($conn, $descricao, $lotacao_maxima)) {
            header("Location: painel.php?page=salas");
            exit;
        } else {
            $mensagem = "Erro ao adicionar sala. Tente novamente.";
        }
    }
}
?>

<h1 id="titulo-add-sala">Adicionar Nova Sala</h1>

<?php if ($mensagem): ?>
    <p style="color:red;"><?= htmlspecialchars($mensagem) ?></p>
<?php endif; ?>

<form method="POST" action="">
    <label id="label-descricao">Descrição:<br>
        <input type="text" name="descricao" value="<?= htmlspecialchars($_POST['descricao'] ?? '') ?>" required>
    </label><br><br>

    <label id="label-lotacao">Lotação Máxima:<br>
        <input type="number" name="lotacao_maxima" min="1" value="<?= htmlspecialchars($_POST['lotacao_maxima'] ?? '') ?>" required>
    </label><br><br>

    <button type="submit" id="botao-adicionar">Adicionar Sala</button>
</form>

<script type="module" src="idioma.js"></script>
