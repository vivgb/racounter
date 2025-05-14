<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="css/style_inicial.css">
  <title>Calendário Interativo</title>
  
</head>
<body>
  <div class="calendar-wrapper">
    <div class="month-header">
      <button class="nav-btn" onclick="changeMonth(-1)">←</button>
      <div class="month-title" id="monthTitle"></div>
      <button class="nav-btn" onclick="changeMonth(1)">→</button>
    </div>

    <div class="calendar" id="calendar"></div>

    <div class="hours-box" id="hoursBox">
      <h4 id="selectedDay"></h4>
      <div id="hoursList"></div>
    </div>
  </div>

  <script>
    const monthNames = [
      "Janeiro", "Fevereiro", "Março", "Abril",
      "Maio", "Junho", "Julho", "Agosto",
      "Setembro", "Outubro", "Novembro", "Dezembro"
    ];

    const dayNames = ["D", "S", "T", "Q", "Q", "S", "S"];

    let currentMonth = new Date().getMonth();
    let currentYear = new Date().getFullYear();

    const calendar = document.getElementById("calendar");
    const monthTitle = document.getElementById("monthTitle");
    const hoursBox = document.getElementById("hoursBox");
    const selectedDay = document.getElementById("selectedDay");
    const hoursList = document.getElementById("hoursList");

    function renderCalendar(month, year) {
      calendar.innerHTML = "";

      // Cabeçalhos dos dias da semana
      for (let i = 0; i < 7; i++) {
        const day = document.createElement("div");
        day.textContent = dayNames[i];
        day.classList.add("day-name");
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
        day.addEventListener("click", () => showHours(i, month, year));
        calendar.appendChild(day);
      }

      monthTitle.textContent = `${monthNames[month]} ${year}`;
    }

    function showHours(day, month, year) {
      selectedDay.textContent = `Horários de ${day} de ${monthNames[month]} ${year}`;
      hoursList.innerHTML = "";
      for (let h = 0; h < 24; h++) {
        const time = document.createElement("div");
        time.classList.add("hour");
        time.textContent = `${String(h).padStart(2, '0')}:00`;
        hoursList.appendChild(time);
      }
      hoursBox.style.display = "block";
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
      hoursBox.style.display = "none";
    }

    renderCalendar(currentMonth, currentYear);
  </script>
</body>
</html>
