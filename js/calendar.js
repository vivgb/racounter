for (let i = 1; i <= daysInMonth; i++) {
    const day = document.createElement('div');
    day.textContent = i;
  
    // Adiciona evento de clique
    day.addEventListener('click', () => {
      const fullDate = `${i.toString().padStart(2, '0')}/${(month + 1).toString().padStart(2, '0')}/${year}`;
      alert(`Você clicou no dia ${fullDate} para o mês ${monthNames[month]}`);
      // Aqui você pode abrir um modal ou enviar a data para agendamento
    });
  
    container.appendChild(day);
  }
  