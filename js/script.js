const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item => {
    const li = item.parentElement;   

    item.addEventListener('click', function () {
        allSideMenu.forEach(i => {
            i.parentElement.classList.remove('active');
        })
        li.classList.add('active');
    })

});

// Alterna visibilidade do sidebar ao clicar no ícone de menu
const menuBar = document.querySelector('#content .bx.bx-menu');
const sidebar = document.getElementById('sidebar');


menuBar.addEventListener('click', function () {
    sidebar.classList.toggle('hide');
});

// Ajustar o estado do menu lateral ao carregar a página e ao redimensionar
function adjustSidebar() {
    if (window.innerWidth <= 576) {
        sidebar.classList.add('hide');   // Esconde o menu lateral para telas pequenas
        sidebar.classList.remove('show');
    } else {
        sidebar.classList.remove('hide');  // Mostra o menu lateral em telas grandes
        sidebar.classList.add('show');
    }
}

window.addEventListener('load', adjustSidebar);
window.addEventListener('resize', adjustSidebar);

// Função para verificar a visibilidade das sections
function verificarPagina() {
    const salasSection = document.querySelector('#salas');
    const usuariosSection = document.querySelector('#usuarios');
    const searchFormElement = document.querySelector('#content form');

    // Função auxiliar para checar se o elemento está visível
    function estaVisivel(elemento) {
        if (!elemento) return false;
        const estilo = window.getComputedStyle(elemento);
        return estilo.display !== 'none' && estilo.visibility !== 'hidden' && elemento.offsetHeight > 0;
    }

    const mostrarFormulario = estaVisivel(salasSection) || estaVisivel(usuariosSection);

    if (mostrarFormulario) {
        searchFormElement.style.display = 'block';
        searchFormElement.style.visibility = 'visible';
        searchFormElement.style.position = 'static';
        searchFormElement.style.pointerEvents = 'auto';
    } else {
        searchFormElement.style.display = 'none'; // Esconde completamente
        searchFormElement.style.visibility = 'hidden';
        searchFormElement.style.position = 'absolute';
        searchFormElement.style.pointerEvents = 'none';
    }
}


// Verifica a página ao carregar a página e ao redimensionar
window.addEventListener('load', verificarPagina);
window.addEventListener('resize', verificarPagina);

// Botão de Pesquisa Mobile
const searchButton = document.querySelector('#content form .form-input button');
const searchButtonIcon = document.querySelector('#content form .form-input button .bx');
const searchForm = document.querySelector('#content form');

searchButton.addEventListener('click', function (e) {
    if (window.innerWidth < 768) {
        e.preventDefault();
        searchForm.classList.toggle('show');
        if (searchForm.classList.contains('show')) {
            searchButtonIcon.classList.replace('bx-search', 'bx-x');
        } else {
            searchButtonIcon.classList.replace('bx-x', 'bx-search');
        }
    }
});


// Mostrar/Esconder Menus de Notificação e Perfil
document.querySelector('.notification').addEventListener('click', function () {
    document.querySelector('.notification-menu').classList.toggle('show');
    document.querySelector('.profile-menu').classList.remove('show'); // Fecha o perfil
});

// Profile Menu Toggle
document.querySelector('.profile').addEventListener('click', function () {
    document.querySelector('.profile-menu').classList.toggle('show');
    document.querySelector('.notification-menu').classList.remove('show'); // Fecha o menu de notificação
});

// Fechar menus ao clicar fora
window.addEventListener('click', function (e) {
    if (!e.target.closest('.notification') && !e.target.closest('.profile')) {
        document.querySelector('.notification-menu').classList.remove('show');
        document.querySelector('.profile-menu').classList.remove('show');
    }
});

// Função para alternar menus personalizados
function toggleMenu(menuId) {
    var menu = document.getElementById(menuId);
    var allMenus = document.querySelectorAll('.menu');

    allMenus.forEach(function(m) {
        if (m !== menu) {
            m.style.display = 'none';
        }
    });

    if (menu.style.display === 'none' || menu.style.display === '') {
        menu.style.display = 'block';
    } else {
        menu.style.display = 'none';
    }
}

// Mantém todos os menus fechados no início
document.addEventListener("DOMContentLoaded", function() {
    var allMenus = document.querySelectorAll('.menu');
    allMenus.forEach(function(menu) {
        menu.style.display = 'none';
    });
});

// Função de mostrar as seções
function mostrarSecao(idSecaoParaMostrar) {
    const secoes = document.querySelectorAll('.secao');
    secoes.forEach(secao => {
        if (secao.id === idSecaoParaMostrar) {
            secao.style.display = 'block';
        } else {
            secao.style.display = 'none';
        }
    });
}

// MUDAR DE PÁGINA
function irParaSala(salaId) {
    window.location.href = 'painel.php?page=contagem&id=' + salaId;
}

// Abrir e fechar o dialog de "Nova Sala"
document.addEventListener('DOMContentLoaded', () => {
    const novaSalaBtn = document.getElementById('novaSala');
    const dialog = document.getElementById('new_class');
    const cancelBtn = document.getElementById('cancelBtnClass');

    if (novaSalaBtn && dialog) {
        novaSalaBtn.addEventListener('click', () => {
            if (typeof dialog.showModal === 'function') {
                dialog.showModal();
            } else {
                alert("Este navegador não suporta <dialog>");
            }
        });
    }

    if (cancelBtn && dialog) {
        cancelBtn.addEventListener('click', () => {
            dialog.close();
        });
    }
});


//carrega o dialog que edita sala
document.addEventListener('DOMContentLoaded', () => {
    const editsalaBtn = document.getElementById('editSala');
    const dialog = document.getElementById('edit_delet');
    const cancelarBtn = document.getElementById('canceleditBtn');

    if (editsalaBtn && dialog) {
        editsalaBtn.addEventListener('click', () => {
            if (typeof dialog.showModal === 'function') {
                dialog.showModal();
            } else {
                alert("Este navegador não suporta <dialog>");
            }
        });
    }

    if (cancelarBtn && dialog) {
        cancelarBtn.addEventListener('click', () => {
            dialog.close();
        });
    }
});



/*document.addEventListener("DOMContentLoaded", () => {
    var $conteudo = document.getElementById('conteudo');
    if (!$conteudo) return;

    var $idSala = $conteudo.dataset.id;

    document.getElementById('mais')?.addEventListener('click', () => atualizarLotacao('mais', $idSala));
    document.getElementById('menos')?.addEventListener('click', () => atualizarLotacao('menos', $idSala));
});*/

function atualizarLotacao($node) {
    var $operacao = $node.id;
    var $idSala = $node.parentElement.dataset.id;

    var fd = new FormData();
    fd.append("idSala", $idSala);
    fd.append("operacao", $operacao);

    fetch('php/atualizar_lotacao.php', {
        method: 'POST',
        body: fd
    })
    .then(response => response.json())
    .then(data => {
        if (data.sucesso) {
            const lotacaoTexto = document.querySelector('#lotacao p');
            lotacaoTexto.textContent = `${data.nova_lotacao}/${lotacaoTexto.textContent.split('/')[1]}`;

            const infoLotacao = document.querySelector('#info p:nth-of-type(2)');
            infoLotacao.textContent = `Lotação atual: ${data.nova_lotacao}`;
        } else {
            alert(data.erro || 'Erro ao atualizar.');
        }
    })
    .catch(err => {
        console.error(err);
        alert('Erro de conexão com o servidor.');
    });
}

  
  