console.log("grafico.js carregado");

const grafico = document.querySelector("#grafico");

if (grafico) {
  fetch("php/dados_graficos.php")
    .then((response) => response.json())
    .then((data) => {
      console.log("Dados recebidos:", data); // debug
      const options = {
        chart: {
          type: "bar",
          height: 400,
        },
        colors: ["#3c1209"],
        series: [
          {
            name: "Agendamentos",
            data: data.data,
          },
        ],
        xaxis: {
          categories: data.labels,
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
