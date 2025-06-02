document.addEventListener("DOMContentLoaded", () => {
    const dialog = document.getElementById("eventDialog");
    const form = document.getElementById("eventForm");
    const eventTitle = document.getElementById("eventTitle");
    const eventDate = document.getElementById("eventDate");
    const startTime = document.getElementById("startTime");
    const endTime = document.getElementById("endTime");
    const cancelBtn = document.getElementById("cancelBtn");
    
    let selectedDate = null;
    
    let eventoSelecionado = null;  
    
    const dataAtual = document.querySelector(".data_atual"),
    diasTag = document.querySelector(".dias"),
    prevNextIcon = document.querySelectorAll(".icons span");
    
    
    // Pega a data atual
    let data = new Date(),
    mesAt = data.getMonth(),
    anoAt = data.getFullYear();

    
    const meses = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
        "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];
        
    let eventosDoMes = []; // guardar os eventos recebidos

    const renderizarCalendario = () => {
        fetch('php/carregarAgendamentos.php')
            .then(res => res.json())
            .then(eventos => {
                eventosDoMes = eventos;
                rendCalendario();
            });
            
    };

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

        // Verifica se o dia tem evento
        
        let dataFormatada = `${anoAt}-${String(mesAt + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
        let eventosDoDia = eventosDoMes.filter(ev => ev.start.startsWith(dataFormatada));
        let classeExtra = eventosDoDia.length > 0 ? 'tem-evento' : '';

        let eventosHTML = '';
        
        if (eventosDoDia.length > 0) {
            eventosHTML = '<div class="eventos-dia">';
            eventosDoDia.forEach(ev => {
                eventosHTML += `<span class="evento" 
                    data-id="${ev.id}"
                    data-titulo="${ev.titulo}"
                    data-start="${ev.start}"
                    data-end="${ev.end}"
                    data-sala="${ev.sala}"
                    data-cor="${ev.color}"
                    style="background-color:${ev.color};"
                >${ev.title}</span>`;
            });
            eventosHTML += '</div>';
        }

        liTag += `
        <li class="${hj} ${classeExtra}" data-dia="${dataFormatada}">
            <div class="numero-dia">${i}</div>
            ${eventosHTML}
        </li>`;

    }
    
    // Dias do próximo mês para completar a grade
    for (let i = ultimoDiaMes; i < 6; i++) {
        liTag += `<li class="inativo">${i - ultimoDiaMes + 1}</li>`;
    }
    dataAtual.innerText = `${meses[mesAt]} ${anoAt}`;
    diasTag.innerHTML = liTag;

    // ⚠️ Agora sim os elementos estão no DOM, e podemos adicionar o clique!
    document.querySelectorAll(".evento").forEach(eventoEl => {
        eventoEl.addEventListener("click", e => {
            e.stopPropagation();

            eventoSelecionado = {
                id: eventoEl.dataset.id,
                titulo: eventoEl.dataset.titulo,
                start: eventoEl.dataset.start,
                end: eventoEl.dataset.end,
                sala: eventoEl.dataset.sala,
                cor: eventoEl.dataset.cor
            };

            console.log("Evento clicado:", eventoSelecionado);

            // Preenche o popup
            const dataObj = new Date(eventoSelecionado.start);
            const inicio = eventoSelecionado.start.slice(11, 16);
            const fim = eventoSelecionado.end.slice(11, 16);

            document.getElementById("popup-titulo").textContent = eventoSelecionado.titulo;
            document.getElementById("popup-data").textContent = dataObj.toLocaleDateString("pt-BR", {
                weekday: "short", year: "numeric", month: "long", day: "numeric"
            });
            document.getElementById("popup-horario").textContent = `${inicio} - ${fim}`;
            document.getElementById("popup-sala").textContent = `Sala: ${eventoSelecionado.sala}`;
            document.getElementById("popup-barracor").style.backgroundColor = eventoSelecionado.cor;

            document.getElementById("popup-evento").style.display = "block";
        });
    });

    // Fecha o popup ao clicar fora dele
    document.addEventListener("click", (e) => {
        const popup = document.getElementById("popup-evento");
        if (popup.style.display === "block" && !popup.contains(e.target)) {
            popup.style.display = "none";
        }
    });
    // Fecha o popup ao clicar no botão de fechar
    document.getElementById("fecharPopup").addEventListener("click", () => {
        document.getElementById("popup-evento").style.display = "none";
        
    });
    
    // Botao de edição de evento
    document.getElementById("editarEventoBtn").addEventListener("click", () => {
        if (!eventoSelecionado) return;   // segurança

        eventTitle.value              = eventoSelecionado.titulo;
        eventDate.value               = eventoSelecionado.start.slice(0, 10);
        startTime.value               = eventoSelecionado.start.slice(11, 16);
        endTime.value                 = eventoSelecionado.end.slice(11, 16);
        document.getElementById("corSelecionada").value = eventoSelecionado.cor;
        document.getElementById("eventId").value        = eventoSelecionado.id;
        document.getElementById("salaSelect").value     = eventoSelecionado.sala;

        dialog.showModal();
        });

    // Botao de exclusão de evento
    document.getElementById("excluirAgen").addEventListener("click", () => {
        if (!eventoSelecionado) return;

        if (confirm("Tem certeza que deseja excluir este agendamento?")) {
            fetch("php/excluirAgendamento.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `id=${encodeURIComponent(eventoSelecionado.id)}`
            })
            .then(res => res.text())
            .then(msg => {
            if (msg.trim() === "OK") {
                document.getElementById("popup-evento").style.display = "none";
                renderizarCalendario();            // recarrega o mês
            } else {
                alert("Erro ao excluir.");
            }
            });
        }
        });




    
    // Adiciona eventos de clique aos dias válidos
    document.querySelectorAll(".dias li:not(.inativo)").forEach((li) => {
        li.addEventListener("click", () => {
            const dia = li.textContent.padStart(2, '0');
            const mes = (mesAt + 1).toString().padStart(2, '0');
            const dataCompleta = `${anoAt}-${mes}-${dia}`;
            
            console.log("Clicou no dia:", dataCompleta); 
            
            selectedDate = dataCompleta;
            eventDate.value = dataCompleta;
            dialog.showModal();
        });
    });
    
        
    };
    //Inicializa o calendario
    renderizarCalendario();

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
            
            renderizarCalendario();
        });
    });

    // Botão Cancelar do dialog
    cancelBtn.addEventListener("click", () => {
        dialog.close();
    });

    form.addEventListener("submit", () => {
        console.log("Enviando formulário");
        dialog.close();
    });



    document.querySelectorAll(".color-option").forEach(input => {
        input.addEventListener("input", () => {
            document.getElementById("corSelecionada").value = input.value;
        });
    });


});
