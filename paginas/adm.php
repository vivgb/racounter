<?php
include("php/conexao.php");

if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    header("Location: ../index.php");
    exit;
  }
  

$sql = "SELECT id_usuario, nome, email, senha FROM usuarios";
$result = $conn->query($sql);
?>

<h1>Tela exclusiva adm</h1>

<div class="usuario">
    <button id="btnCriarUsuario">Criar Novo Usuário</button>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th><th>Nome</th><th>Email</th><th>Senha Criptografada</th><th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['id_usuario']) ?></td>
                    <td><?= htmlspecialchars($row['nome']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['senha']) ?></td>
                    <td>
                        <button class="btnEditar" data-id="<?= $row['id_usuario'] ?>">Editar</button>
                        <a href="../php/excluir_usuario.php?id=<?= $row['id_usuario'] ?>" onclick="return confirm('Tem certeza que deseja excluir?');">
                            <button>Excluir</button>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<dialog id="dialogUsuario" style="padding: 20px; border: none; border-radius: 8px; width: 500px; max-width: 90%;">
    <form id="formUsuario" action="../php/salvarUsuario.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="funcao" id="funcao" value="">
        <input type="hidden" name="id" id="usuarioId" value="">

        <label>Nome:</label><br>
        <input type="text" name="nNome" id="nNome" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="nEmail" id="nEmail" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="nSenha" id="nSenha"><br>
        <small id="senhaInfo"></small><br><br>

        <label>Tipo de Usuário:</label><br>
        <select name="nTipoUsuario" id="nTipoUsuario" required>
            <option value="">Selecione</option>
            <?php
            $tipos = mysqli_query($conn, "SELECT * FROM tipo_usuario");
            while ($tipo = mysqli_fetch_assoc($tipos)) {
                echo "<option value='{$tipo['id_tipo_usuario']}'>{$tipo['descricao']}</option>";
            }
            ?>
        </select><br><br>

        <label>Ativo:</label>
        <input type="checkbox" name="nAtivo" id="nAtivo"><br><br>

        <label>Foto:</label><br>
        <img id="fotoPreview" src="" alt="Foto do usuário" width="80" style="display:none;"><br>
        <input type="file" name="nFoto" id="nFoto"><br><br>

        <button type="submit">Salvar</button>
        <button type="button" id="btnCancelar">Cancelar</button>
    </form>
</dialog>
