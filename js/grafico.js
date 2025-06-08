
console.log("grafico.js carregado");

document.addEventListener("DOMContentLoaded", function () {
  const grafico = document.querySelector("#grafico");

  if (grafico) {
  fetch("php/dados_graficos.php")

      .then((response) => response.json())
      .then((data) => {
        console.log("Dados recebidos:", data); // debug

          // Criar arrays separados para labels e valores
        const labels = data.map(item => item.sala);
        const valores = data.map(item => item.total);

        const options = {
          chart: {
            type: "bar",
            height: "100%",
            width: "100%",
          },
          plotOptions: {
            bar: {
              horizontal: true,
              barHeight: '25%' 
            },
          },
          colors: ["#3c1209"],
          series: [
            {
              name: "Movimentações",
              data: valores,
            },
          ],
          xaxis: {
            categories: labels,
          },
        };

        const chart = new ApexCharts(grafico, options);
        chart.render();
      })
      .catch((error) => {
        console.error("Erro ao carregar dados do gráfico:", error);
      });
  } else {
    console.warn("Elemento #grafico não encontrado na página.");
  }
});
