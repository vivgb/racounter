<?php
  session_start();
  include("funcao.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard de Salas</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
      background-color: #947364;
      color: #000;
    }
    header {
      background-color: #3c1209;
      color: #fcf4dc;
      padding: 20px;
      text-align: center;
      font-size: 24px;
      font-weight: bold;
    }
    nav {
      background-color: #6c4434;
      padding: 10px;
      text-align: center;
    }
    nav a {
      color: #fcf4dc;
      text-decoration: none;
      margin: 0 15px;
      font-weight: bold;
    }
    .calendar-section {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
      padding: 20px;
    }
    .calendar, .chart-container, .summary-container {
      background-color: #d5c1ac;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .calendar-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 10px;
    }
    .calendar-header button {
      background-color: #6c4434;
      color: #fcf4dc;
      border: none;
      padding: 5px 10px;
      border-radius: 5px;
      cursor: pointer;
    }
    .calendar-grid {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      gap: 5px;
    }
    .day-cell {
      background-color: #fcf4dc;
      padding: 10px;
      text-align: center;
      border-radius: 5px;
      cursor: pointer;
    }
    .chart-container {
      height: 300px;
    }
    .summary {
      display: flex;
      justify-content: space-around;
      margin-bottom: 20px;
    }
    .summary div {
      text-align: center;
    }
    .summary span {
      display: block;
      font-weight: bold;
    }
    .room-summary {
      display: flex;
      justify-content: space-between;
      background-color: #fcf4dc;
      color: #000;
      padding: 10px;
      margin-top: 10px;
      border-radius: 10px;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <header>Estatísticas das Salas</header>
  <nav>
    <a href="#salas">Salas</a>
    <a href="#relatorios">Relatórios</a>
    <a href="#configuracoes">Configurações</a>
  </nav>
  <div class="calendar-section">
    <!-- Calendário -->
    <div class="calendar">
      <div class="calendar-header">
        <button onclick="prevMonth()">&lt;</button>
        <span id="monthDisplay">Maio 2025</span>
        <button onclick="nextMonth()">&gt;</button>
      </div>
      <div class="calendar-grid" id="calendarGrid"></div>
    </div>

    <!-- Gráfico -->
    <div class="chart-container">
      <canvas id="usageChart"></canvas>
    </div>

    <div class="summary-container">
      <div class="summary">
        <div>
          <span>Total de Pessoas</span>
          <p id="total">0</p>
        </div>
        <div>
          <span>Média por Dia</span>
          <p id="average">0</p>
        </div>
      </div>

      <!-- Salas -->
      <div class="room-summary">
        <span>Sala 01</span>
        <span>45 pessoas | 1.5/dia</span>
      </div>
      <div class="room-summary">
        <span>Sala 02</span>
        <span>88 pessoas | 2.9/dia</span>
      </div>
      <div class="room-summary">
        <span>Sala 03</span>
        <span>22 pessoas | 0.7/dia</span>
      </div>
      <div class="room-summary">
        <span>Sala 04</span>
        <span>57 pessoas | 1.8/dia</span>
      </div>
    </div>
  </div>

  <script>
    const usageDataBase = {
      "2025-05": Array.from({ length: 31 }, () => Math.floor(Math.random() * 11)),
      "2025-04": Array.from({ length: 30 }, () => Math.floor(Math.random() * 11)),
      "2025-03": Array.from({ length: 31 }, () => Math.floor(Math.random() * 11))
    };

    let currentDate = new Date();

    function getMonthKey(date) {
      return `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}`;
    }

    function renderCalendar(date) {
      const calendarGrid = document.getElementById("calendarGrid");
      const monthKey = getMonthKey(date);
      const data = usageDataBase[monthKey] || [];

      document.getElementById("monthDisplay").textContent = date.toLocaleString("pt-BR", {
        month: "long",
        year: "numeric"
      });

      calendarGrid.innerHTML = "";
      data.forEach((uso, i) => {
        const day = document.createElement("div");
        day.className = "day-cell";
        day.textContent = i + 1;
        day.onclick = () => renderDayChart(i + 1);
        calendarGrid.appendChild(day);
      });

      const total = data.reduce((a, b) => a + b, 0);
      const average = (total / data.length).toFixed(1);
      document.getElementById("total").textContent = total;
      document.getElementById("average").textContent = average;

      renderMonthChart(data);
    }

    function renderMonthChart(data) {
      const ctx = document.getElementById("usageChart").getContext("2d");
      if (window.usageChart) window.usageChart.destroy();
      window.usageChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: data.map((_, i) => i + 1),
          datasets: [{
            label: "Pessoas por dia",
            data,
            backgroundColor: "#a855f7"
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    }

    function renderDayChart(day) {
      const data = Array.from({ length: 24 }, () => Math.floor(Math.random() * 3));
      const ctx = document.getElementById("usageChart").getContext("2d");
      if (window.usageChart) window.usageChart.destroy();
      window.usageChart = new Chart(ctx, {
        type: "bar",
        data: {
          labels: data.map((_, i) => `${String(i).padStart(2, '0')}:00`),
          datasets: [{
            label: `Pessoas por hora - Dia ${day}`,
            data,
            backgroundColor: "#f59e0b"
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    }

    function prevMonth() {
      currentDate.setMonth(currentDate.getMonth() - 1);
      renderCalendar(currentDate);
    }

    function nextMonth() {
      currentDate.setMonth(currentDate.getMonth() + 1);
      renderCalendar(currentDate);
    }

    renderCalendar(currentDate);
  </script>
</body>
</html>