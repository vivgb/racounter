<?php
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
            <div class="btn" id="editarsala">
                <p>Editar</p>
            </div>
            <div id="controles">
                <p class="title"><?= htmlspecialchars($sala['descricao'] ?? '') ?></p>
                <div id="conteudo" data-id="<?= $id_sala ?>">
                    <div id="menos" class="acoes">
                        <i class='bx  bx-minus'  ></i> 
                    </div>
                    <div id="lotacao">
                        <p><?= $sala['lotacao_atual'] ?>/<?= $sala['lotacao_maxima'] ?></p>
                    </div>
                    <div id="mais" class="acoes">
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

        <dialog id="edit_delet">
            <form method="POST" action="php/funcoes_salas.php" id="editform">
                <h2>Editar sala</h2>

                <label for="classTitle">Descrição</label>
                <input type="text" id="classTitle" name="descricao" required>

                <label for="classLotacao">Lotação</label>
                <input type="number" id="classLotacao" name="lotacao_maxima" required>

                <label for="usuario">Usuário vinculado</label>
                <select id="usuario" name="id_usuario" required>
                <option value="">Selecione um usuário</option>
                <?php
                // Buscar usuários do banco e preencher o select
                $usuarios = buscarTodosUsuarios($conn); // vamos criar essa função
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
                // Buscar empresas do banco e preencher o select
                $empresas = buscarTodasEmpresas($conn); // Essa função precisa existir
                while ($empresa = $empresas->fetch_assoc()):
                ?>
                <option value="<?= $empresa['id_empresa'] ?>"><?= htmlspecialchars($empresa['nome']) ?></option>
                <?php endwhile; ?>
                </select>
                
                <input type="hidden" id="classId" name="classId">

                <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 15px;">
                <button type="button" class="bnt-perfil" id="cancelBtnClass">Cancelar</button>
                <button type="submit" class="bnt-perfil">Salvar</button>
                <button type="submit" class="bnt-perfil">Excluir</button>
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
