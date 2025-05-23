      <!--Salas-->

      <?php
// Evita acesso direto
if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    header("Location: ../index.php");
    exit;
}
?>

<section id="salas">
  <h1>Salas</h1>
  <div class="grid-container">
    <div class="card" id="novaSala">
      <i class='bxr  bx-plus'></i> 
    </div>
    <div class="card">
      <h2>Sala 101</h2>
      <p>Lotação 2/30</p>
      <p>agendado</p>
    </div>
  <div class="grid-container">
    <div class="card">
      <h2>Sala 102</h2>
      <p>Lotação 5/30</p>
    </div>
  <div class="grid-container">
    <div class="card">
      <h2>Sala 103</h2>
      <p>Lotação 2/30</p>
    </div>
  <div class="grid-container">
    <div class="card">
      <h2>Sala 104</h2>
      <p>Lotação 8/35</p>
      <p>agendado</p>
    </div>
    </div>
  
</section>

