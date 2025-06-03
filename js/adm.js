const dialog = document.getElementById('dialogUsuario');
const form = document.getElementById('formUsuario');
const senhaInfo = document.getElementById('senhaInfo');
const fotoPreview = document.getElementById('fotoPreview');
const btnCriar = document.getElementById('btnCriarUsuario');
const btnCancelar = document.getElementById('btnCancelar');

btnCriar.onclick = () => {
    form.reset();
    form.action = '../php/salvarUsuario.php?funcao=I';
    document.getElementById('funcao').value = 'I';
    document.getElementById('usuarioId').value = '';
    senhaInfo.textContent = 'Senha obrigatória para novo usuário.';
    fotoPreview.style.display = 'none';
    fotoPreview.src = '';
    dialog.showModal();
}

btnCancelar.onclick = () => {
    dialog.close();
}

document.querySelectorAll('.btnEditar').forEach(btn => {
    btn.onclick = () => {
        const id = btn.getAttribute('data-id');
        fetch(`../php/formUsuario.php?id=${id}`)
            .then(resp => resp.json())
            .then(data => {
                if(data.success) {
                    document.getElementById('funcao').value = 'A';
                    document.getElementById('usuarioId').value = data.usuario.id_usuario;
                    document.getElementById('nNome').value = data.usuario.nome;
                    document.getElementById('nEmail').value = data.usuario.email;
                    document.getElementById('nTipoUsuario').value = data.usuario.id_tipo_usuario;
                    document.getElementById('nAtivo').checked = (data.usuario.flg_ativos === 'S');
                    senhaInfo.textContent = 'Deixe em branco para manter a senha atual.';
                    
                    if(data.usuario.foto){
                        fotoPreview.src = '../' + data.usuario.foto;
                        fotoPreview.style.display = 'block';
                    } else {
                        fotoPreview.style.display = 'none';
                    }

                    // Remove valor do input file para poder escolher outra imagem
                    document.getElementById('nFoto').value = '';

                    form.action = `../php/salvarUsuario.php?funcao=A&id=${id}`;
                    dialog.showModal();
                } else {
                    alert('Erro ao carregar usuário.');
                }
            })
            .catch(() => alert('Erro na requisição.'));
    }
});