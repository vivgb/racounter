<?php
session_start();
if (!isset($_SESSION['cod_recuperacao'])) {
    header('Location: esqueceu-senha.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Verificar Código</title>
</head>
<body>
    <h2>Digite o código enviado para o seu e-mail</h2>

    <?php if (isset($_SESSION['msg'])): ?>
        <p><?php echo $_SESSION['msg']; unset($_SESSION['msg']); ?></p>
    <?php endif; ?>

    <form method="POST" action="verificarCodigo.php">
        <input type="text" name="codigo" placeholder="Código de verificação" required>
        <button type="submit">Verificar</button>
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['codigo'] == $_SESSION['codigo_recuperacao']) {
        // Código correto - redirecionar para trocar senha
        header('Location: novaSenha.php');
        exit();
    } else {
        $_SESSION['msg'] = "Código incorreto. Tente novamente.";
        header('Location: verificarCodigo.php');
        exit();
    }
}
?>
