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

form.addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(form);
    const url = form.action;

    console.log("Enviando para:", url);
    console.log("FormData:");
    for (let pair of formData.entries()) {
        console.log(pair[0]+ ': ' + pair[1]);
    }

    fetch(url, {
        method: 'POST',
        body: formData
    })
    .then(async resp => {
        console.log("Resposta bruta do servidor:", resp);

        const contentType = resp.headers.get("content-type");

        if (!resp.ok) {
            const texto = await resp.text();
            console.error("Erro HTTP:", resp.status, texto);
            throw new Error("Erro HTTP");
        }

        if (contentType && contentType.includes("application/json")) {
            return resp.json();
        } else {
            const texto = await resp.text();
            console.error("Resposta não é JSON válida:", texto);
            throw new Error("Resposta inválida");
        }
    })
    .then(data => {
        console.log("Resposta JSON do servidor:", data);
        if (data.success) {
            console.log("Usuário salvo com sucesso!");
            dialog.close();
            location.reload();
        } else {
            console.error("Erro ao salvar:", data.error || "Erro desconhecido");
        }
    })
    .catch(error => {
        console.error("Erro na requisição:", error);
    });
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
