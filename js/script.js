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
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

// Sidebar toggle işlemi
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

// Ajustar o estado do menu lateral ao carregar a página e ao redimensionar
window.addEventListener('load', adjustSidebar);
window.addEventListener('resize', adjustSidebar);


const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

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
})

// Dark Mode Switch
const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
    if (this.checked) {
        document.body.classList.add('dark');
    } else {
        document.body.classList.remove('dark');
    }
})

// Mostrar/Esconder Menus de Notificação e Perfil
document.querySelector('.notification').addEventListener('click', function () {
    document.querySelector('.notification-menu').classList.toggle('show');
    document.querySelector('.profile-menu').classList.remove('show'); // Fecha o perfil
});

// Profile Menu Toggle
document.querySelector('.profile').addEventListener('click', function () {
    document.querySelector('.profile-menu').classList.toggle('show');
    document.querySelector('.notification-menu').classList.remove('show'); // Close notification menu if open
});

//  Fechar menus ao clicar fora
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

      // Fecha todos os outros menus
      allMenus.forEach(function(m) {
        if (m !== menu) {
          m.style.display = 'none';
        }
      });

      // Mostra ou esconde o menu clicado
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

