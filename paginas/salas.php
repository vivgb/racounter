<!--Salas-->
<?php
// Evita acesso direto
if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
  header("Location: ../index.php");
  exit;
}

require_once 'php/funcoes_salas.php';
require_once 'php/conexao.php';
$salas = buscarTodasSalas($conn);
?>

<section id="salas">
  <div class="head-title">
    <div class="left">
      <h1>Salas</h1>
    </div>
  </div>
  <div class="grid-container">
      <div class="card" id="novaSala">
        <i class='bx bx-plus meu-icone'></i> 
    </div>
     

		<div class="card" onclick="irParaSala(<?= $sala['id_salas'] ?>)">

    <div class="card" id="novaSala" onclick="window.location.href='painel.php?page=nova_sala'">
      <i class='bx bx-plus meu-icone'></i> 
    </div>
    <?php while ($sala = $salas->fetch_assoc()): ?>
      <div class="card" onclick="irParaSala(<?= $sala['id_salas'] ?>)">
        <h2><?= htmlspecialchars($sala['descricao']) ?></h2>
        <p>Lotação</p> 
        <?= $sala['lotacao_atual'] ?>/<?= $sala['lotacao_maxima'] ?></p>
        <?php if (!empty($sala['agendamento']) && $sala['agendamento'] == 1): ?>
  			<p class="ocupada">Agendada</p>
		<?php else: ?>
  			<p class="livre">Livre</p>
			<?php endif; ?>
      </div>
    <?php endwhile; ?>
     
    </div>
  
</section>

<dialog id="new_class">
  <form method="POST" action="php/funcoes_salas.php" id="classForm">
    <h2>Nova sala</h2>

    <label for="classTitle">Descrição</label>
    <input type="text" id="classTitle" name="descricao" required>

    <label for="classLotacao">Lotação</label>
    <input type="number" id="classLotacao" name="lotacao_maxima" required>

    <label for="empresa">Empresa</label>
    <select id="empresa" name="id_empresa" required>
	<option value="">Empresa</option>
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
      <button type="button" id="cancelBtnClass">Cancelar</button>
      <button type="submit" id="saveBtnClass">Salvar</button>
    </div>
  </form>
</dialog>

          <p class="ocupada">Ocupada</p>
        <?php else: ?>
          <p class="livre">Livre</p>
        <?php endif; ?>
      </div>
    <?php endwhile; ?>
  </div>
</section>

<script type="module" src="idioma.js"></script>
