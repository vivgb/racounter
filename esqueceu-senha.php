<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>

    <!-- Fonte + Boxicons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Estilo -->
    <link rel="stylesheet" href="css/style_recSenha.css">
</head>
<body>

    <div class="container">
        <div class="form-box login">

            <!-- Avatar Guaxinim com círculo -->
            <div class="avatar-guaxinim">
                <img src="img/guaxinim/guaxinim.jpeg" alt="Guaxinim" id="olhos">
            </div>

            <form method="POST" action="php/email-rec.php">
                <h2>Recuperar Senha</h2>
                <?php
                session_start();
                if (isset($_SESSION['erro_email'])) {
                   echo '<div class="erro">' . $_SESSION['erro_email'] . '</div>';
                   unset($_SESSION['erro_email']);
               }
                ?>
                <div class="input-box">
                    <input type="email" name="nEmail" placeholder="Digite seu e-mail" required>
                    <i class='bx bxs-envelope'></i>
                </div>

                <button type="submit" class="btn">Enviar</button>

                <div class="registrar">
                    <a href="index.php">Voltar para Login</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
