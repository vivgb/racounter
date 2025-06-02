<!--Salas-->
<?php
// Evita acesso direto
if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
  header("Location: ../index.php");
  exit;
}

include('idioma.js');
require_once 'php/funcoes.php';
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
      <div class="card" id="novaSala" onclick="window.location.href='painel.php?page=nova_sala'">
        <i class='bx bx-plus meu-icone'></i> 
    </div>
      <?php while ($sala = $salas->fetch_assoc()): ?>

      <div class="card" onclick="irParaSala(<?= $sala['id_salas'] ?>)">
        <h2><?= htmlspecialchars($sala['descricao']) ?></h2>
        <p>Lotação</p> 
        <?= $sala['lotacao_atual'] ?>/<?= $sala['lotacao_maxima'] ?></p>
        <?php if (!empty($sala['agendamento']) && $sala['agendamento'] == 1): ?>
  			<p class="ocupada">Ocupada</p>
		<?php else: ?>
  			<p class="livre">Livre</p>
			<?php endif; ?>
      </div>
    <?php endwhile; ?>
     
    </div>
  
</section>