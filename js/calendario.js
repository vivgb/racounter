const dataAtual = document.querySelector(".data_atual"),
diasTag = document.querySelector(".dias"),
prevNextIcon = document.querySelectorAll(".icons span");


// Pega a data atual
let data = new Date(),
mesAt = data.getMonth(),
anoAt = data.getFullYear();

const meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
               "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];

const rendCalendario = () => {
    let primeiroDiaMes = new Date(anoAt, mesAt, 1).getDay(); // dia da semana do primeiro dia do mês
    let ultimaDataMes = new Date(anoAt, mesAt + 1, 0).getDate(); // último dia do mês atual
    let ultimoDiaMes = new Date(anoAt, mesAt, ultimaDataMes).getDay(); // dia da semana do último dia
    let ultimoDataUltimoMes = new Date(anoAt, mesAt, 0).getDate(); // último dia do mês anterior

    let liTag = "";

    // Dias do mês anterior
    for (let i = primeiroDiaMes; i > 0; i--) {
        liTag += `<li class="inativo">${ultimoDataUltimoMes - i + 1}</li>`;
    }

    // Dias do mês atual
    for (let i = 1; i <= ultimaDataMes; i++) {
               let hj = i === data.getDate() && mesAt === new Date().getMonth() 
                     && anoAt === new Date().getFullYear() ? "ativo" : "";
        liTag += `<li class="${hj}">${i}</li>`;
    }

    // Dias do próximo mês para completar a grade
    for (let i = ultimoDiaMes; i < 6; i++) {
        liTag += `<li class="inativo">${i - ultimoDiaMes + 1}</li>`;
    }

    dataAtual.innerText = `${meses[mesAt]} ${anoAt}`;
    diasTag.innerHTML = liTag;
};

rendCalendario();

prevNextIcon.forEach(icon => {
    icon.addEventListener("click", () => {
        // Se o ícone for "prev", diminui o mês, senão aumenta
        mesAt = icon.id === "prev" ? mesAt - 1 : mesAt + 1;

        // Se o mês for menor que 0, volta para dezembro do ano anterior
        if (mesAt < 0) {
            mesAt = 11;
            anoAt--;
        }
        // Se o mês for maior que 11, volta para janeiro do próximo ano
        else if (mesAt > 11) {
            mesAt = 0;
            anoAt++;
        }

        rendCalendario();
    });
})
