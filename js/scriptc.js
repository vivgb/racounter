const monthNames = [
  "Janeiro", "Fevereiro", "Março", "Abril",
  "Maio", "Junho", "Julho", "Agosto",
  "Setembro", "Outubro", "Novembro", "Dezembro"
];

const dayNames = ["D", "S", "T", "Q", "Q", "S", "S"];

let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();
let selectedDay = null;
let reservations = {}; // Objeto para armazenar reservas

function renderCalendar(month, year) {
  const calendar = document.getElementById("calendar");
  calendar.innerHTML = "";

  // Cabeçalhos dos dias da semana
  for (let i = 0; i < 7; i++) {
      const day = document.createElement("div");
      day.textContent = dayNames[i];
      day.style.fontWeight = "bold";
      calendar.appendChild(day);
  }

  const date = new Date(year, month, 1);
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const startDay = date.getDay();

  for (let i = 0; i < startDay; i++) {
      calendar.appendChild(document.createElement("div"));
  }

  for (let i = 1; i <= daysInMonth; i++) {
      const day = document.createElement("div");
      day.textContent = i;
      const dayKey = `${i}-${month}-${year}`;
      day.classList.add("free");

      // Verifica se o dia está reservado
      if (reservations[dayKey] && Object.keys(reservations[dayKey]).length > 0) {
          const hourCount = Object.keys(reservations[dayKey]).length;
          if (hourCount >= 24) {
              day.classList.add("reserved");
          }
      }

      day.addEventListener("click", () => showModal(i, month, year));
      calendar.appendChild(day);
  }

  document.getElementById("monthTitle").textContent = `${monthNames[month]} ${year}`;
}

function showModal(day, month, year) {
  selectedDay = { day, month, year };
  document.getElementById("eventDate").textContent = `${day} de ${monthNames[month]} ${year}`;
  populateTimeSelectors(day, month, year);
  document.getElementById("myModal").style.display = "flex";
}

function populateTimeSelectors(day, month, year) {
  const startTimeSelect = document.getElementById("startTime");
  const endTimeSelect = document.getElementById("endTime");
  startTimeSelect.innerHTML = "";
  endTimeSelect.innerHTML = "";

  const dayKey = `${day}-${month}-${year}`;
  const reservedHours = reservations[dayKey] ? Object.keys(reservations[dayKey]) : [];

  for (let h = 0; h < 24; h++) {
      const hour = `${String(h).padStart(2, '0')}:00`;
      if (!reservedHours.includes(hour)) {
          const startOption = document.createElement("option");
          startOption.value = hour;
          startOption.textContent = hour;
          startTimeSelect.appendChild(startOption);

          const endOption = document.createElement("option");
          endOption.value = hour;
          endOption.textContent = hour;
          endTimeSelect.appendChild(endOption);
      }
  }
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

function saveEvent() {
  const startTime = document.getElementById("startTime").value;
  const endTime = document.getElementById("endTime").value;
  const who = document.getElementById("whoReserved").value;
  const room = document.getElementById("room").value;
  const maxPeople = document.getElementById("maxPeople").value;

  const dayKey = `${selectedDay.day}-${selectedDay.month}-${selectedDay.year}`;
  if (startTime >= endTime) {
      alert("O horário de início deve ser anterior ao horário de término.");
      return;
  }

  if (!who || !room || !maxPeople) {
      alert("Por favor, preencha todos os campos.");
      return;
  }

  if (!reservations[dayKey]) {
      reservations[dayKey] = {};
  }

  for (let h = parseInt(startTime.split(':')[0]); h < parseInt(endTime.split(':')[0]); h++) {
      const hourKey = `${String(h).padStart(2, '0')}:00`;
      if (reservations[dayKey][hourKey]) {
          alert("Este horário já está reservado.");
          return;
      }
  }

  for (let h = parseInt(startTime.split(':')[0]); h < parseInt(endTime.split(':')[0]); h++) {
      const hourKey = `${String(h).padStart(2, '0')}:00`;
      reservations[dayKey][hourKey] = { who, room, maxPeople };
  }

  alert(`Reserva feita para ${selectedDay.day} de ${monthNames[selectedDay.month]} ${selectedDay.year} das ${startTime} às ${endTime} por ${who} na sala ${room} para ${maxPeople} pessoas.`);
  closeModal();
  renderCalendar(currentMonth, currentYear);
}

function changeMonth(diff) {
  currentMonth += diff;
  if (currentMonth < 0) {
      currentMonth = 11;
      currentYear--;
  } else if (currentMonth > 11) {
      currentMonth = 0;
      currentYear++;
  }
  renderCalendar(currentMonth, currentYear);
}

// Renderiza o calendário ao carregar a página
renderCalendar(currentMonth, currentYear);