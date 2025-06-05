<div class="gordao">
  <section class="gordo">
      <center><h1>Perfil do Usuário</h1></center>
    <div class="profile-photo">
      <img src="<?php echo $_SESSION['FotoLogin']?>" alt="Foto do perfil do usuário" id="photo">
      <form method="POST" action="php/salvaUsuario.php" >
        <input type="file" id="photoInput" accept=image/* style="display:none" aria-hidden="true">
      </form>
    </div>
      
    <div  class="info-box" aria-labelledby="personalDataTitle">
      <center><h1 id="personalDataTitle">Dados Pessoais</h1></center>
      <p class="info-text"><strong>Nome:</strong><?php echo $_SESSION["NomeLogin"]?></p>
      <p class="info-text"><strong>Email:</strong><?php echo $_SESSION["E-mailLogin"]?></p>
      <p class="info-text"><strong>Data de nascimento:</strong><?php echo $_SESSION["DataN"]?></p>
    </div>
  </section>
</div>
