<section class="container" role="main" aria-label="Tela de Perfil de Usuário">
    <h1>Perfil do Usuário</h1>
    <div class="profile-photo" aria-label="Foto do perfil">
      <img src="https://i.pravatar.cc/140" alt="Foto do perfil do usuário" id="photo" />
      <form action="Post">
        <input type="file" id="photoInput" accept="image/*" style="display:none" aria-hidden="true" />
        <button id="changePhotoBtn" aria-label="Alterar foto do perfil">Alterar Foto</button>
      </form>
    </div>

    <div class="info-section" aria-label="Informações do usuário">
      <div class="info-box" aria-labelledby="emailTitle">
        <h2o id="emailTitle">E-mail</h2o>
        <p class="info-text" id="email">usuario@gmail.com</p>
      </div>
      <div class="info-box" aria-labelledby="addressTitle">
        <h2o id="addressTitle">Endereço</h2o>
        <p class="info-text" id="address">Rua Exemplo, 123, Bairro Centro, São Paulo - SP</p>
      </div>
      <div class="info-box" aria-labelledby="personalDataTitle" style="grid-column: span 2;">
        <h2o id="personalDataTitle">Dados Pessoais</h2o>
        <p class="info-text"><strong>Nome:</strong> João da Silva</p>
        <p class="info-text"><strong>Telefone:</strong> (11) 91234-5678</p>
        <p class="info-text"><strong>Data de Nascimento:</strong> 10/03/1985</p>
      </div>
      <div class="info-box" aria-labelledby="passwordChangeTitle" style="grid-column: span 2;">
        <h2o id="passwordChangeTitle">Alterar Senha</h2o>
        <form id="passwordForm" aria-describedby="passwordMsg">
          <label for="currentPassword">Senha Atual</label>
          <input type="password" id="currentPassword" name="currentPassword" required autocomplete="current-password"/>
          <label for="newPassword">Nova Senha</label>
          <input type="password" id="newPassword" name="newPassword" required autocomplete="new-password" />
          <label for="confirmPassword">Confirmar Nova Senha</label>
          <input type="password" id="confirmPassword" name="confirmPassword" required autocomplete="new-password" />
          <button type="submit">Salvar Nova Senha</button>
          <p id="passwordMsg" class="msg" role="alert" aria-live="polite"></p>
        </form>
      </div>
    </div>
  </saction>