// Dark Mode Switch
const switchMode = document.getElementById('switch-mode');
const logo = document.getElementById('logo');

// Função para aplicar o tema
function aplicarTema(tema) {
    if (tema === 'dark') {
        document.body.classList.add('dark');
        logo.src = 'img/logo_dark.png';   // nome exato do arquivo escuro
        switchMode.checked = true;        // Marca o switch como ativado
        
    } else {
        document.body.classList.remove('dark');
        logo.src = 'img/logo.png';
        switchMode.checked = false;       // Marca o switch como desmarcado
    }
}

// Ao carregar a página, buscar o tema do banco de dados
window.onload = function() {
    // Fazendo uma requisição para obter o tema do banco
    fetch('php/obter-tema.php')
        .then(response => response.json())
        .then(data => {
            if (data.tema) {
                aplicarTema(data.tema); // Aplica o tema do banco
            }
        });
};

// Event Listener para alternar o tema
switchMode.addEventListener('change', function () {
    if (this.checked) {
        document.body.classList.add('dark');
        logo.src = 'img/logo_dark.png';
        salvarTema('dark');  // Envia para o backend salvar o tema
    } else {
        document.body.classList.remove('dark');
        logo.src = 'img/logo.png';
        salvarTema('light'); // Envia para o backend salvar o tema
    }
});

// Função para salvar o tema no banco de dados
function salvarTema(tema) {
    fetch('php/salvar-tema.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ tema: tema })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'erro') {
            console.error('Erro ao salvar tema no banco');
        }
    });
}
