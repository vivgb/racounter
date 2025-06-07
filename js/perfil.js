document.addEventListener('DOMContentLoaded', () => {
  const icons = document.querySelectorAll('.icon-option');
  const campoIcone = document.getElementById('fotoIconeSelecionado');

  icons.forEach(icon => {
    icon.addEventListener('click', () => {
      const src = icon.getAttribute('data-src');
      campoIcone.value = src;

      // Atualiza preview
      document.getElementById('photo').src = src;

      // Estética
      icons.forEach(i => i.classList.remove('selected'));
      icon.classList.add('selected');
    });
  });

  document.getElementById('fotoPerfil').addEventListener('change', (event) => {
    if (event.target.files.length > 0) {
      campoIcone.value = '';
      icons.forEach(i => i.classList.remove('selected'));
    }
  });

});
