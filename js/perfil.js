
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
