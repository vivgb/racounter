<?php
include("php/conexao.php");

if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    header("Location: ../index.php");
    exit;
  }
  

$sql = "SELECT id_usuario, nome, email, senha, Foto FROM usuarios";
$result = $conn->query($sql);
?>
<section id="usuarios">

    <h1 class="title-adm">Tela exclusiva adm</h1>
    
    <button class="bnt-perfil" id="btnCriarUsuario">Criar Novo Usuário</button>
    <div class="table-data">
        <div class="order order-usuarios">
            <table>
                
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Senha</th>
                        <th>Foto</th>
                        <th>Ações</th>
                    </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td class="id-coluna"><?= htmlspecialchars($row['id_usuario']) ?></td>
                        <td><?= htmlspecialchars($row['nome']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['senha']) ?></td>
                        <td>
                            <?php if (!empty($row['Foto'])): ?>
                                <img src="<?= htmlspecialchars($row['Foto']) ?>" alt="Foto do usuário" width="40" height="40" style="border-radius: 50%;">
                            <?php else: ?>
                                <img src="img/guaxinim/default.jpeg" alt="Sem foto" width="40" height="40" style="border-radius: 50%;">
                            <?php endif; ?>
                        </td>


                        <td>
                            <button class="btnEditar" data-id="<?= $row['id_usuario'] ?>">Editar</button>
                            <a href="/racounter/php/excluir_usuario.php?id=<?= $row['id_usuario'] ?>" onclick="return confirm('Tem certeza que deseja excluir?');">
                                <button>Excluir</button>
                            </a>
                            
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <div class="head"></div>
    </div>
</div>

<dialog id="dialogUsuario">
    <form id="formUsuario" action="php/salvarUsuario.php?funcao=I" method="post" enctype="multipart/form-data">
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
        
        <div class="checkbox-container">
            <input type="checkbox" name="nAtivo" id="nAtivo">
            <label for="nAtivo">Ativo</label>
        </div>
        
        
        <label>Foto:</label><br>
        <img id="fotoPreview" src="" alt="Foto do usuário" width="80" style="display:none;"><br>
        <input type="file" name="nFoto" id="nFoto"><br><br>
        
        <div class="button-row">
            <button class="bnt-perfil" type="submit">Salvar</button>
            <button class="bnt-perfil" type="button" id="btnCancelar">Cancelar</button>
        </div>
        
    </form>
</dialog>

</section>