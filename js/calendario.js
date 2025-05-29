document.addEventListener("DOMContentLoaded", () => {
    const dialog = document.getElementById("eventDialog");
    const form = document.getElementById("eventForm");
    const eventTitle = document.getElementById("eventTitle");
    const eventDate = document.getElementById("eventDate");
    const startTime = document.getElementById("startTime");
    const endTime = document.getElementById("endTime");
    const cancelBtn = document.getElementById("cancelBtn");
    
    let selectedDate = null;
    
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
    
    // Adiciona eventos de clique aos dias válidos
    document.querySelectorAll(".dias li:not(.inativo)").forEach((li) => {
        li.addEventListener("click", () => {
            const dia = li.textContent.padStart(2, '0');
            const mes = (mesAt + 1).toString().padStart(2, '0');
            const dataCompleta = `${anoAt}-${mes}-${dia}`;
            
            console.log("Clicou no dia:", dataCompleta); // ← ADICIONE AQUI
            
            selectedDate = dataCompleta;
            eventDate.value = dataCompleta;
            dialog.showModal();
        });
    });
    
    
};
//Inicializa o calendario
rendCalendario();

// Navegação entre os meses
prevNextIcon.forEach(icon => {
    icon.addEventListener("click", () => {
        mesAt = icon.id === "prev" ? mesAt - 1 : mesAt + 1;
        
        if (mesAt < 0) {
            mesAt = 11;
            anoAt--;
        } else if (mesAt > 11) {
            mesAt = 0;
            anoAt++;
        }
        
        rendCalendario();
    });
});

// Botão Cancelar do dialog
cancelBtn.addEventListener("click", () => {
    dialog.close();
});

// Salvamento do formulário
form.addEventListener("submit", (e) => {
    e.preventDefault();
    
    const title = eventTitle.value;
    const start = startTime.value;
    const end = endTime.value;
    
    console.log("Novo evento:", {
        title,
        date: selectedDate,
        start,
        end,
        color: "selecionado" // aqui você pode implementar captura da cor selecionada
    });
    
    dialog.close();
    form.reset();
});

});

