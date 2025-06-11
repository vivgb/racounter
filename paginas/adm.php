<?php
include("php/conexao.php");


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
                    <?php 
                    $contador = 1;
                    while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td class="id-coluna"><?= $contador ?></td>
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
                                <button class="btnEditar" data-id="<?= $row['id_usuario'] ?>" title="Editar" style="background:none; border:none; cursor:pointer;">
                                    <i class='bx bx-pencil' style="font-size: 20px; color: #4caf50;"></i>
                                </button>
                                <button class="btnExcluir" 
                                        data-id="<?= $row['id_usuario'] ?>" 
                                        data-nome="<?= htmlspecialchars($row['nome']) ?>" 
                                        title="Excluir" 
                                        style="background:none; border:none; cursor:pointer;">
                                    <i class='bx bx-trash' style="font-size: 20px; color: #f44336;"></i>
                                </button>
                            </td>
                        </tr>
                    <?php 
                        $contador++;
                    endwhile; 
                    ?>
                </tbody>
            </table>
        </div>
    </div>


<dialog id="dialogUsuario">
    <h1 id="tituloform"></h1>
    <form id="formUsuario" action="php/salvarUsuario.php?funcao=I" method="post" enctype="multipart/form-data">
        <input type="hidden" name="funcao" id="funcao" value="">
        <input type="hidden" name="id" id="usuarioId" value="">
        
        <label for="nNome">Nome:</label>
        <input type="text" name="nNome" id="nNome" required>
        
        <label for="nNome">Email:</label>
        <input type="email" name="nEmail" id="nEmail" required>
        
        <label for="nSenha">Senha:</label><br>
        <input type="password" name="nSenha" id="nSenha">
        <small id="senhaInfo"></small>
    
        
        <label for="nTipoUsuario">Tipo de Usuário:</label><br>
        <select name="nTipoUsuario" id="nTipoUsuario" required>
            <option value="">Selecione</option>
            <?php
            $tipos = mysqli_query($conn, "SELECT * FROM tipo_usuario");
            while ($tipo = mysqli_fetch_assoc($tipos)) {
                echo "<option value='{$tipo['id_tipo_usuario']}'>{$tipo['descricao']}</option>";
            }
            ?>
        </select>
        
        <div class="checkbox-container">
            <input type="checkbox" name="nAtivo" id="nAtivo">
            <label for="nAtivo">Ativo</label>
        </div>
        
        
        <label>Foto:</label>
        <img id="fotoPreview" src="" alt="Foto do usuário" width="80" style="display:none;"><br>
        <input type="file" name="nFoto" id="nFoto"><br><br>
        
        <div class="button-row">
            <button class="bnt-perfil" id="btnSalvar" type="submit">Salvar</button>
            <button class="bnt-perfil" type="button" id="btnCancelar">Cancelar</button>
        </div>
        
    </form>
</dialog>
<dialog id="confirmExcluirDialog">
    <form method="dialog" style="text-align: center;">
        <p id="mensagemExcluir" style="margin-bottom: 20px;"></p> 
        <div style="margin-top: 15px; display: flex; justify-content: center; gap: 10px;">
            <a id="confirmExcluirBtn" class="bnt-perfil" style="background-color: #d9534f;">Sim, Excluir</a>
            <button class="bnt-perfil" id="cancelarExcluir" type="button">Cancelar</button>
        </div>
    </form>
</dialog>


</section>