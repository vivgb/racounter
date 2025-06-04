<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Tela de Perfil</title>
</head>
<body>
  <main class="container" role="main" aria-label="Tela de Perfil de Usuário">
    <h1>Perfil do Usuário</h1>
    <section class="profile-photo" aria-label="Foto do perfil">
      <img src="https://i.pravatar.cc/140" alt="Foto do perfil do usuário" id="photo" />
      <input type="file" id="photoInput" accept="image/*" style="display:none" aria-hidden="true" />
      <button id="changePhotoBtn" aria-label="Alterar foto do perfil">Alterar Foto</button>
    </section>

    <section class="info-section" aria-label="Informações do usuário">
      <div class="info-box" aria-labelledby="emailTitle">
        <h2 id="emailTitle">E-mail</h2>
        <p class="info-text" id="email">usuario@gmail.com</p>
      </div>
      <div class="info-box" aria-labelledby="addressTitle">
        <h2 id="addressTitle">Endereço</h2>
        <p class="info-text" id="address">Rua Exemplo, 123, Bairro Centro, São Paulo - SP</p>
      </div>
      <div class="info-box" aria-labelledby="personalDataTitle" style="grid-column: span 2;">
        <h2 id="personalDataTitle">Dados Pessoais</h2>
        <p class="info-text"><strong>Nome:</strong> João da Silva</p>
        <p class="info-text"><strong>Telefone:</strong> (11) 91234-5678</p>
        <p class="info-text"><strong>Data de Nascimento:</strong> 10/03/1985</p>
      </div>
      <div class="info-box" aria-labelledby="passwordChangeTitle" style="grid-column: span 2;">
        <h2 id="passwordChangeTitle">Alterar Senha</h2>
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
    </section>
  </main>

<script>
  // Photo change handling
  const changePhotoBtn = document.getElementById('changePhotoBtn');
  const photoInput = document.getElementById('photoInput');
  const photo = document.getElementById('photo');

  changePhotoBtn.addEventListener('click', () => {
    photoInput.click();
  });

  photoInput.addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function(e) {
        photo.src = e.target.result;
      }
      reader.readAsDataURL(file);
    }
  });

  // Password change form validation and simulation
  const passwordForm = document.getElementById('passwordForm');
  const passwordMsg = document.getElementById('passwordMsg');

  passwordForm.addEventListener('submit', function(e) {
    e.preventDefault();
    passwordMsg.textContent = '';
    passwordMsg.classList.remove('error-msg');

    const currentPassword = passwordForm.currentPassword.value.trim();
    const newPassword = passwordForm.newPassword.value.trim();
    const confirmPassword = passwordForm.confirmPassword.value.trim();

    if (newPassword.length < 6) {
      passwordMsg.textContent = 'A nova senha deve ter pelo menos 6 caracteres.';
      passwordMsg.classList.add('error-msg');
      return;
    }

    if (newPassword !== confirmPassword) {
      passwordMsg.textContent = 'A confirmação da senha não coincide.';
      passwordMsg.classList.add('error-msg');
      return;
    }

    if (currentPassword === newPassword) {
      passwordMsg.textContent = 'A nova senha deve ser diferente da atual.';
      passwordMsg.classList.add('error-msg');
      return;
    }

    // Simulate password change success
    passwordMsg.textContent = 'Senha alterada com sucesso!';
    passwordForm.reset();
  });
</script>
</body>
</html>