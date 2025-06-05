<?php
    session_start();
    include("php/funcoes.php")
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style-login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

</head>
<body>



    <div class="container">
        <div class="form-box login">
            <!-- AVATAR DO GUAXINIM AQUI -->
            <div class="avatar-guaxinim">
                <img src="img/guaxinim/guaxinim.jpeg" alt="Guaxinim" id="olhos">

            </div>
            
            <form method="POST" action="php/validaLogin.php">
                <h1>Login</h1>
                <?php
               if (isset($_SESSION['erro_login'])) {
                   echo '<div class="erro">' . $_SESSION['erro_login'] . '</div>';
                   unset($_SESSION['erro_login']);
               }
               ?>
                <div class="input-box">
                    <input type="text" name="nEmail" placeholder="Usuário" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="nSenha" placeholder="Senha" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="forgot-link">
                    <a href="esqueceu-senha.php">Esqueceu a senha?</a>
                </div>
                <button type="submit" name="Bologin" class="btn">Login</button>

            </form>
        </div>
    </div>

    <script src="js/main.js"></script>
    <script>
        function validarCadastro() {
            const senha = document.getElementById('nSenha').value;
            const confirmSenha = document.getElementById('nConfirmSenha').value;
            
            if (senha !== confirmSenha) {
                alert('As senhas não coincidem!');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>