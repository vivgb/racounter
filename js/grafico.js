
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
        foreColor: "#ffffff", // cor dos textos gerais
      },
      plotOptions: {
        bar: {
          horizontal: true,
          barHeight: '25%',
        },
      },
      colors: ["#3c1209"], // cor das barras
      series: [
        {
          name: "Agendamentos",
          data: valores,
        },
      ],
      xaxis: {
        categories: labels,
        labels: {
          style: {
            colors: "#ffffff",
            fontSize: '14px'
          }
        }
      },
      yaxis: {
        labels: {
          style: {
            colors: "#ffffff",
            fontSize: '14px'
          }
        }
      }
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
