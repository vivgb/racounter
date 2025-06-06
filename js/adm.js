console.log("adm.js carregado");

const dialog = document.getElementById('dialogUsuario');
const form = document.getElementById('formUsuario');
const senhaInfo = document.getElementById('senhaInfo');
const fotoPreview = document.getElementById('fotoPreview');
const btnCriar = document.getElementById('btnCriarUsuario');
const btnCancelar = document.getElementById('btnCancelar');

btnCriar.onclick = () => {
    console.log("Criar novo usuário");
    form.reset();
    form.action = 'php/salvarUsuario.php?funcao=I';
    document.getElementById('funcao').value = 'I';
    document.getElementById('usuarioId').value = '';
    senhaInfo.textContent = 'Senha obrigatória para novo usuário.';
    fotoPreview.style.display = 'none';
    fotoPreview.src = '';
    dialog.showModal();
};

btnCancelar.onclick = () => {
    dialog.close();
};

// ✅ ADICIONE ISSO AQUI
form.addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(form);
    const url = form.action;

    fetch(url, {
        method: 'POST',
        body: formData
    })
    .then(resp => resp.json())
    .then(data => {
        if (data.success) {
            console.log("Usuário salvo com sucesso!");
            dialog.close();
            location.reload(); // recarrega a lista ou tabela de usuários
        } else {
            console.log("Erro ao salvar: " + (data.error || "desconhecido"));
        }
    })
    .catch(() => console.log("Erro na requisição."));
});

// Continuação: lógica para editar usuário
document.querySelectorAll('.btnEditar').forEach(btn => {
    btn.onclick = () => {
        const id = btn.getAttribute('data-id');
        console.log("Editar usuário ID:", id);

        fetch(`php/formUsuario.php?id=${id}`)
            .then(resp => resp.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('funcao').value = 'A';
                    document.getElementById('usuarioId').value = data.usuario.id_usuario;
                    document.getElementById('nNome').value = data.usuario.nome;
                    document.getElementById('nEmail').value = data.usuario.email;
                    document.getElementById('nTipoUsuario').value = data.usuario.id_tipo_usuario;
                    document.getElementById('nAtivo').checked = (data.usuario.flg_ativos === 'S');
                    senhaInfo.textContent = 'Deixe em branco para manter a senha atual.';

                    if (data.usuario.foto) {
                        fotoPreview.src = '/racounter/' + data.usuario.foto;
                        fotoPreview.style.display = 'block';
                    } else {
                        fotoPreview.style.display = 'none';
                    }

                    document.getElementById('nFoto').value = '';
                    form.action = `php/salvarUsuario.php?funcao=A&id=${id}`;
                    dialog.showModal();
                } else {
                    alert('Erro ao carregar usuário.');
                }
            })
            .catch(() => alert('Erro na requisição.'));
    };
});
