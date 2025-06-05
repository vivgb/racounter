<section class="container" role="main" aria-label="Tela de Perfil de Usuário">
    <h1>Perfil do Usuário</h1>
    <div class="profile-photo" aria-label="Foto do perfil">
      <img src="https://i.pravatar.cc/140" alt="Foto do perfil do usuário" id="photo" />
      <input type="file" id="photoInput" accept="image/*" style="display:none" aria-hidden="true" />
      <button id="changePhotoBtn" aria-label="Alterar foto do perfil">Alterar Foto</button>
    </div>

    <div class="info-section" aria-label="Informações do usuário">
      <div class="info-box" aria-labelledby="emailTitle">
        <h2o id="emailTitle">E-mail</h2o>
        <p class="info-text" id="email"><?php echo $_SESSION['E-mailLogin']?></p>
      </div>

      <div class="info-box" aria-labelledby="personalDataTitle" style="grid-column: span 2;">
        <h2o id="personalDataTitle">Dados Pessoais</h2o>
        <p class="info-text"><strong>Nome:</strong><?php echo $_SESSION['NomeLogin']?></p>
        <p class="info-text"><strong>Telefone:</strong><?php echo $_SESSION['telLogin']?></p>
        <p class="info-text"><strong><?php echo $_SESSION['dataNascLogin']?></strong> 10/03/1985</p>

  </saction>