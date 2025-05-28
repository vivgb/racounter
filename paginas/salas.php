<!--Salas-->

<?php
// Evita acesso direto
if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    header("Location: ../index.php");
    exit;
}

require_once 'php/funcoes.php';
require_once 'php/conexao.php';
$salas = buscarTodasSalas($conn);



?>

<section id="salas">
  <h1>Salas</h1>
  <div class="grid-container">
      <div class="card" id="novaSala">
        <i class='bx bx-plus meu-icone'></i> 
    </div>
      <?php while ($sala = $salas->fetch_assoc()): ?>

      <div class="card" onclick="irParaSala(<?= $sala['id_salas'] ?>)">
        <h2><?= htmlspecialchars($sala['descricao']) ?></h2>
        <p>Lotação</p> 
        <?= $sala['lotacao_atual'] ?>/<?= $sala['lotacao_maxima'] ?></p>
        <?php if (!empty($sala['agendamento'])): ?>
          <p>agendado</p>
        <?php endif; ?>
      </div>
    <?php endwhile; ?>
     
    </div>
  
</section>