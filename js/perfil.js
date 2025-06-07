function initPerfil() {
  const inputFoto = document.getElementById('fotoPerfil');
  const imgPreview = document.getElementById('photo');
  const icons = document.querySelectorAll('.icon-option');
  const botaoSalvar = document.querySelector('.bnt-editperfil');

  // Preview ao escolher arquivo
  inputFoto.addEventListener('change', () => {
    const file = inputFoto.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = (e) => {
        imgPreview.src = e.target.result;
        icons.forEach(icon => icon.classList.remove('selected'));
      };
      reader.readAsDataURL(file);
    }
  });

  // Seleção de ícones
  icons.forEach(icon => {
    icon.addEventListener('click', () => {
      const selectedSrc = icon.getAttribute('data-src');
      imgPreview.src = selectedSrc;
      icons.forEach(i => i.classList.remove('selected'));
      icon.classList.add('selected');
      inputFoto.value = ''; // limpa input para evitar conflito
    });
  });

  // Função para enviar dados
  async function salvarFoto() {
    const formData = new FormData();
    const file = inputFoto.files[0];
    const selectedIcon = document.querySelector('.icon-option.selected');

    if (file) {
      formData.append('nFoto', file);
    } else if (selectedIcon) {
      formData.append('fotoIcone', selectedIcon.getAttribute('data-src'));
    } else {
      alert('Selecione uma imagem ou ícone para continuar.');
      return;
    }

    formData.append('id', idLogin); 

    try {
      const response = await fetch('php/salvarFotoPerfil.php', {
        method: 'POST',
        body: formData
      });
      const result = await response.json();

      alert(result.mensagem);
      if (result.status === 'sucesso') {
        window.location.reload(); // Atualiza para refletir nova imagem
      }
    } catch (err) {
      alert('Erro ao enviar imagem.');
      console.error(err);
    }
  }

  // Evento do botão salvar
  botaoSalvar.addEventListener('click', (e) => {
    e.preventDefault();
    salvarFoto();
  });
}

// Chama a função quando o DOM estiver pronto
document.addEventListener('DOMContentLoaded', () => {
  initPerfil();
});
