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
