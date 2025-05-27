<?php
// Evita acesso direto
if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    header("Location: ../index.php");
    exit;
}
?>

  <section id="agendamento">
  <header>Estatísticas das Salas</header>
  <nav id="agenda">
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
  </section>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
