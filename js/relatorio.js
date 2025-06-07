document.addEventListener('DOMContentLoaded', function () {
    const btnRelatorios = document.getElementById('btnRelatorios');
    const menuRelatorios = document.getElementById('menuRelatorios');
    const abrirFiltro = document.getElementById('abrirFiltro');
    const filtrosRelatorio = document.getElementById('filtrosRelatorio');

    btnRelatorios.addEventListener('click', function (e) {
        e.preventDefault();
        menuRelatorios.style.display = 
            menuRelatorios.style.display === 'block' ? 'none' : 'block';
    });

    abrirFiltro.addEventListener('click', function (e) {
        e.preventDefault();
        filtrosRelatorio.style.display =
            filtrosRelatorio.style.display === 'block' ? 'none' : 'block';
    });

    document.addEventListener('click', function (e) {
        if (!e.target.closest('.relatorios-dropdown')) {
            menuRelatorios.style.display = 'none';
            filtrosRelatorio.style.display = 'none';
        }
    });

    document.getElementById('formFiltroRelatorio').addEventListener('submit', function (e) {
        e.preventDefault();
        // Aqui você pode enviar via fetch, ou redirecionar com query strings
        alert("Filtro aplicado!"); // Troque isso por envio real
    });
});

function exportar(formato) {
    alert("Exportar como " + formato.toUpperCase());
    // Aqui você pode redirecionar ou usar AJAX para gerar o arquivo
}