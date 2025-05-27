<!-- MAIN -->
<?php
// Evita acesso direto
if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    header("Location: ../index.php");
    exit;
}
?>

<section>
    <div class="head-title">
        <div class="left">
            <h1>Configurações</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Configurações</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="settings-section">
        <h3>Visualização</h3>
        <label for="visualizacao">Ativar/Desativar:</label>
        <input type="checkbox" id="visualizacao" name="visualizacao">

        <h3>Alterar Foto de Perfil</h3>
        <input type="file" id="foto-perfil" name="foto-perfil">

        <h3>Dados Pessoais</h3>
        <label for="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" placeholder="Seu endereço">

        <label for="gmail">Gmail:</label>
        <input type="email" id="gmail" name="gmail" placeholder="Seu email">

        <h3>Modo</h3>
        <label for="modo">Escolha um modo:</label>
        <select id="modo" name="modo">
            <option value="claro">Claro</option>
            <option value="escuro">Escuro</option>
            <option value="demoniaco">Demoniaco</option>
        </select>

        <h3>Segurança</h3>
        <button onclick="window.location.href='mudar_senha.php'">Mudar Senha</button>
        <button onclick="window.location.href='mudar_email.php'">Mudar Email</button>

        <h4>Verificação de Duas Etapas</h4>
        <label for="verificacao">Ativar:</label>
        <input type="checkbox" id="verificacao" name="verificacao">
    </div>
</section>
<!-- MAIN -->