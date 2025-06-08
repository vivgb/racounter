<?php
if (!isset($_SESSION)) {
  session_start();
}
// Mostra os erros para facilitar depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Inclui arquivos de conexão e funções com caminho relativo correto
require_once __DIR__ . '/../php/conexao.php';
require_once __DIR__ . '/../php/funcoes_salas.php';

// Pega o ID da sala pela URL, se existir
$id_sala = $_GET['id'] ?? null;

if ($id_sala) {
    // Busca dados completos da sala pelo ID
    $sala = buscarSalaPorId($conn, $id_sala);

    if ($sala):
?>

        <section id="contagem">
            <h1 class="bigtitle">
                Controle de movimentação
                <i class='bx  bx-chevron-left' onclick="window.location.href='./painel.php?page=salas'"></i> 
            </h1>



            <div id="controles">
                <?php if($_SESSION['idTipoUsuario'] == 1){?>

                    <div class="icones-controle">
                        <div class="btn" id="editarsala"
                            data-id="<?= $sala['id_salas'] ?>"
                            data-descricao="<?= htmlspecialchars($sala['descricao'], ENT_QUOTES) ?>"
                            data-lotacao="<?= $sala['lotacao_maxima'] ?>"
                            data-idusuario="<?= $sala['id_usuario'] ?>"
                            data-idempresa="<?= $sala['id_empresa'] ?>">
                            <i class='bx bx-pencil' style="font-size: 20px; color: #4caf50; cursor: pointer;"></i>
                        </div>
                        <div class="btn" id="excluirsala"
                            data-id="<?= $sala['id_salas'] ?>"
                            data-nome="<?= htmlspecialchars($sala['descricao'], ENT_QUOTES) ?>">
                            <i class='bx bx-trash' style="font-size: 20px; color: #f44336; cursor: pointer;"></i>
                        </div>
                    </div>
                <?php }?>

                <p class="title"><?= htmlspecialchars($sala['descricao'] ?? '') ?></p>
                <div id="conteudo" data-id="<?= $id_sala ?>">
                    <div id="menos" class="acoes" onclick="atualizarLotacao(this)">
                        <i class='bx  bx-minus'  ></i> 
                    </div>
                    <div id="lotacao">
                        <p><?= $sala['lotacao_atual'] ?>/<?= $sala['lotacao_maxima'] ?></p>
                    </div>
                    <div id="mais" class="acoes" onclick="atualizarLotacao(this)">
                        <i class='bx bx-plus meu-icone'></i>
                    </div>
                </div>

            </div>
            <div id="info">
                <p class="subtitle">Informações</p>
                <p>Lotação atual: <?= htmlspecialchars($sala['lotacao_atual'] ?? 0) ?></p>
                <p>Lotação máxima: <?= htmlspecialchars($sala['lotacao_maxima'] ?? 0) ?></p>
                <p>Status: <?= (!empty($sala['agendamento']) && $sala['agendamento'] == 1) ? 'Agendada' : 'Sem agendamentos' ?></p>
                <p>Usuário vinculado: <?= htmlspecialchars($sala['nome_usuario'] ?? 'Nenhum') ?></p>
            </div>
            
        </section>

        <!--aq eu tirei o botao de delete de dentro do edicao-->
        <dialog id="edit_delet" class="dialog">
            <form method="POST" action="php/funcoes_salas.php" id="editform">
                <h2>Editar sala</h2>
                <input type="hidden" name="classId" value="<?= htmlspecialchars($sala['id_salas']) ?>">


                <label for="classTitle">Descrição</label>
                <input type="text" id="classTitle" name="descricao" required>

                <label for="classLotacao">Lotação</label>
                <input type="number" id="classLotacao" name="lotacao_maxima" required>

                <label for="usuario">Usuário vinculado</label>
                <select id="usuario" name="id_usuario" required>
                <option value="">Selecione um usuário</option>
                <?php

                $usuarios = buscarTodosUsuarios($conn); 
                if (!$usuarios) {
                    echo '<option value="">Erro ao buscar usuários</option>';
                } elseif ($usuarios->num_rows === 0) {
                    echo '<option value="">Nenhum usuário encontrado</option>';
                } else {
                    while ($usuario = $usuarios->fetch_assoc()):
                ?>
                    <option value="<?= $usuario['id_usuario'] ?>"><?= htmlspecialchars($usuario['nome']) ?></option>
                <?php
                    endwhile;
                }
                ?>
                </select>
                <label for="empresa">Empresa</label>
                <select id="empresa" name="id_empresa" required>
                <option value=""></option>
                <?php
                $empresas = buscarTodasEmpresas($conn);
                while ($empresa = $empresas->fetch_assoc()):
                ?>
                <option value="<?= $empresa['id_empresa'] ?>"><?= htmlspecialchars($empresa['nome']) ?></option>
                <?php endwhile; ?>
                </select>
                
                <input type="hidden" id="classId" name="classId">

                <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 15px;">
                <button type="button" class="bnt-perfil" id="cancelBtnClass">Cancelar</button>
                <button type="submit" class="bnt-perfil">Salvar</button>
                </div>
            </form>
        </dialog>
        
        <!--o dialog de confirmação de exclusão-->
        <dialog id="confirmExcluirDialog" class="dialog">
            <form method="dialog" style="text-align: center;">
                <p id="confirmMessage">Tem certeza que deseja excluir esta sala?</p>
                <div style="margin-top: 15px; display: flex; justify-content: center; gap: 10px;">
                    <button id="confirmExcluirBtn" class="bnt-perfil" style="background-color: #d9534f;">Sim, Excluir</button>
                    <button class="bnt-perfil" id="cancelarExcluir">Cancelar</button>
                </div>
            </form>
        </dialog>


<?php
    else:
        echo "<p>Sala não encontrada.</p>";
    endif;
} else {
    echo "<p>ID da sala não fornecido.</p>";
}
?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const botaoEditar = document.getElementById('editarsala');
    const dialog = document.getElementById('edit_delet');

    botaoEditar.addEventListener('click', function () {
        // Preenche os campos do formulário
        document.getElementById('classId').value = botaoEditar.dataset.id;
        document.getElementById('classTitle').value = botaoEditar.dataset.descricao;
        document.getElementById('classLotacao').value = botaoEditar.dataset.lotacao;
        document.getElementById('usuario').value = botaoEditar.dataset.idusuario;
        document.getElementById('empresa').value = botaoEditar.dataset.idempresa;

        // Abre o dialog
        dialog.showModal();
    });

    // Fecha o dialog ao clicar em "Cancelar"
    document.getElementById('cancelBtnClass').addEventListener('click', () => {
        dialog.close();
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // ... (já existente)

    const botaoExcluir = document.getElementById('excluirsala');
    const dialogExcluir = document.getElementById('confirmExcluirDialog');

    botaoExcluir.addEventListener('click', function () {
        const idSala = this.dataset.id;
        const nomeSala = this.dataset.nome;

        // Atualiza a mensagem com o nome da sala
        document.getElementById('confirmMessage').innerText =
            `Tem certeza que deseja excluir a sala "${nomeSala}"?`;

        // Salva o ID da sala para uso posterior
        dialogExcluir.dataset.idSala = idSala;
        dialogExcluir.showModal();
    });

    document.getElementById('confirmExcluirBtn').addEventListener('click', () => {
        const idSala = dialogExcluir.dataset.idSala;

        fetch('php/funcoes_salas.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `acao=excluir&id_sala=${encodeURIComponent(idSala)}`
        })
        .then(response => {
            if (response.ok) {
                window.location.href = "painel.php?page=salas"; // Volta para a listagem
            } else {
                alert("Erro ao excluir a sala.");
            }
        });
    });

    document.getElementById('cancelarExcluir').addEventListener('click', () => {
        dialogExcluir.close();
    });
});
</script>
