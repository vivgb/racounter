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
    <link rel="stylesheet" href="css/style_login.css">
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
                <div class="input-box">
                    <input type="text" name="nEmail" placeholder="Usuário" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="nSenha" placeholder="Senha" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="forgot-link">
                    <a href="#">Esqueceu a senha?</a>
                </div>
                <button type="submit" class="btn">Login</button>

            </form>
        </div>

        <div class="form-box register">
            <form method="POST" action="php/salvarUsuario.php?funcao=I" enctype="multipart/form-data" 
            onsubmit="return validarCadastro()">

                <h1>Registrar</h1>
                <div class="input-box">
                    <input type="text" name="nNome" placeholder="Nome" required>
                    <i class='bx bxs-user' ></i>
                </div>
                <div class="input-box">
                    <input type="email" name="nEmail" placeholder="Email" required>
                    <i class='bx bxs-envelope' ></i>
                </div>
                <div class="input-box">
                    <input type="password" name="nSenha" placeholder="Senha" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="input-box">
                    <input type="password" name="nConfirmSenha" placeholder="Confirmar senha" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="esq"> 
                    <label for="nAtivo">
                      <input type="checkbox" id="nAtivo" name="nAtivo">
                      Ativo
                    </label>
                  
                    <div class="tipo-usuario">
                      <label for="iTipo">Tipo de Usuário:</label>
                      <select name="nTipo" id="iTipo" required>
                        <option>Selecione...</option>
                        <?php echo optionTipoUsuario(0); ?>
                      </select>
                    </div>
                </div>
                  
                <button type="submit" class="btn">Register</button>
            </form>
        </div>

        <div class="toggle-box">
            <div class="toggle-panel toggle-left">
                <h1>Olá, Bem-vindo!</h1>
                <p>Não tem uma conta?</p>
                <button class="btn register-btn">Registrar</button>
            </div>

            <div class="toggle-panel toggle-right">
                <h1>Bem-vindo de volta!</h1>
                <p>Já tem uma conta?</p>
                <button class="btn login-btn">Login</button>
            </div>
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