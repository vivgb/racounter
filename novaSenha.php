<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova senha</title>

    <!-- Fontes e ícones -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Estilo -->
    <link rel="stylesheet" href="css/style_recSenha.css">
</head>
<body>

    <div class="container">
        <div class="form-box login">
            <form method="POST" action="php/salvarSenhaNova.php">
                <h2>Nova senha</h2>

                <!-- Mensagem de erro -->
                <?php if (isset($_SESSION['erro_senha'])): ?>
                    <div class="erro"><?php echo $_SESSION['erro_senha']; unset($_SESSION['erro_senha']); ?></div>
                <?php endif; ?>

                <div class="input-box">
                    <input type="password" name="nSenha" placeholder="Digite sua nova senha" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <div class="input-box">
                    <input type="password" name="nConfSenha" placeholder="Confirme a nova senha" required>
                    <i class='bx bxs-lock-alt'></i>
                </div>

                <button type="submit" class="btn">Salvar</button>
            </form>
        </div>
    </div>

</body>
</html>
