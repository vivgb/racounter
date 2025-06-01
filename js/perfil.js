document.addEventListener('DOMContentLoaded', () => {
  const editBtn = document.getElementById('editaPerfil');
  const dialog = document.getElementById('dialogPerfil');
  const closeDialog = document.getElementById('fecharDialog');
  const inputHidden = document.getElementById('imagemEscolhida');

  if (editBtn && dialog && closeDialog) {
    editBtn.addEventListener('click', () => {
      if (typeof dialog.showModal === "function") {
        dialog.showModal();
      } else {
        alert("Este navegador não suporta <dialog>");
      }
    });

    closeDialog.addEventListener('click', () => {
      dialog.close();
    });
  }

  // Seleção de imagens pré-definidas
  const iconOptions = document.querySelectorAll('.icon-option');

  iconOptions.forEach(img => {
    img.addEventListener('click', () => {
      const src = img.getAttribute('data-src');

      if (inputHidden) {
        inputHidden.value = src;
      }

      // Destaque visual
      iconOptions.forEach(i => i.classList.remove('selected'));
      img.classList.add('selected');
    });
  });
});
