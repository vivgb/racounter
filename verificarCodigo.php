<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>

    <!-- Fonte + Boxicons -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Estilo -->
    <link rel="stylesheet" href="css/style_recSenha.css">
</head>
<body>

    <div class="container">
        <div class="form-box login">
            <form method="POST" action="php/email-rec.php">
                <h2>Código de verificação</h2>
                <div class="input-box">
                    <input type="number" name="nCode" placeholder="Digite o código enviado" autocomplete="off" required>
                </div>

                <button type="submit" name="nbutton_code" class="btn">Enviar</button>

                <div class="registrar">
                    <a href="esqueceu-senha.php">Voltar</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>

