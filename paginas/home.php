<?php
// Evita acesso direto
if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    header("Location: ../index.php");
    exit;
}

require_once 'conexao.php';

$entradas = $saidas = $salas_ativas = 0;

// Entradas do dia
$res = $conn->query("SELECT COUNT(*) AS total FROM movimentacao WHERE tipo = 1 AND DATE(data_hora) = CURDATE()");
$entradas = $res->fetch_assoc()['total'] ?? 0;

// Saídas do dia
$res = $conn->query("SELECT COUNT(*) AS total FROM movimentacao WHERE tipo = 0 AND DATE(data_hora) = CURDATE()");
$saidas = $res->fetch_assoc()['total'] ?? 0;

// Salas ativas
$res = $conn->query("SELECT COUNT(*) AS total FROM salas WHERE lotacao_atual > 0 AND ativo = 1");
$salas_ativas = $res->fetch_assoc()['total'] ?? 0;

// Total do dia
$total = $entradas + $saidas;

// Salas agendadas recentes
$agendamentos = [];
$sql = "
    SELECT 
        a.data, 
        a.hora_inicio,
        a.hora_fim,
        s.descricao AS nome_sala, 
        u.nome AS nome_usuario,
        a.titulo
    FROM agendamentos a
    JOIN salas s ON a.id_sala = s.id_salas
    JOIN usuarios u ON a.id_usuario = u.id_usuario
    ORDER BY a.data DESC
    LIMIT 5
";

$res = $conn->query($sql);
while ($row = $res->fetch_assoc()) {
    $agendamentos[] = $row;
}
?>


<section>
    
    <div class="head-title">
        <div class="left">
            <h1>Raccounter</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
                <li>
                    <a class="active" href="#">Home</a>
                </li>
            </ul>
        </div>
        <a href="#" class="btn-download">
            <i class='bx bxs-cloud-download bx-fade-down-hover' ></i>
            <span class="text">Relatórios</span>
        </a>
    </div>

    <ul class="box-info">
        <li>
            <i class='bx bx-door-open'></i>
            <span class="text">
                <h3 id="salas_ativas"><?= $salas_ativas ?></h3>
                <p>Salas Ativas</p>
            </span>
        </li>
        <li>
            <i class='bx bx-log-in'></i>      
            <span class="text">
                <h3 id="entradas"><?= $entradas ?></h3>
                <p>Entrada</p>
            </span>
        </li>
        <li>
            <i class='bx bx-log-out'></i>      
            <span class="text">
                <h3 id="saidas"><?= $saidas ?></h3>
                <p>Saída</p>
            </span>
        </li>
        <li>
            <i class='bx bx-group'></i>       
            <span class="text">
                <h3 id="total"><?= $total ?></h3>
                <p>Total</p>
            </span>
        </li>
    </ul>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Salas Agendadas</h3>
                <i class='bx bx-search' ></i>
                <i class='bx bx-filter' ></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Sala</th>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>Usuário</th>
                        <th>Evento</th>
                    </tr>
                </thead>
                <tbody id="tabela-agendamentos">
                <?php foreach ($agendamentos as $ag): ?>
                    <tr>
                        <td><p><?= htmlspecialchars($ag['nome_sala']) ?></p></td>
                        <td><?= date('d/m/Y', strtotime($ag['data'])) ?></td>
                        <td><?= date('H:i', strtotime($ag['hora_inicio'])) ?> - <?= date('H:i', strtotime($ag['hora_fim'])) ?></td>
                        <td><?= htmlspecialchars($ag['nome_usuario']) ?></td>
                        <td><?= htmlspecialchars($ag['titulo']) ?></td>
                    </tr>
                <?php endforeach; ?>

                </tbody>


            </table>
        </div>

        <div class="grafico">
            <div class="head">
                <h3>Gráfico de Agendamentos</h3>
            </div>
            <div id="grafico"></div>
       </div>

    </div>

    <script type="module" src="idioma.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
function atualizarDashboard() {
    fetch('dashboard_dados.php')
        .then(res => res.json())
        .then(dados => {
            document.getElementById('entradas').textContent = dados.entradas;
            document.getElementById('saidas').textContent = dados.saidas;
            document.getElementById('salas_ativas').textContent = dados.salas_ativas;
            document.getElementById('total').textContent = dados.total;

            const tbody = document.getElementById('tabela-agendamentos');
            tbody.innerHTML = '';

            dados.agendamentos.forEach(ag => {
                const tr = document.createElement('tr');

                const tdSala = document.createElement('td');
                tdSala.innerHTML = `<p>${ag.nome_sala}</p>`;
                tr.appendChild(tdSala);

                const tdData = document.createElement('td');
                const dataFormatada = new Date(ag.data_hora).toLocaleString('pt-BR');
                tdData.textContent = dataFormatada;
                tr.appendChild(tdData);

                const tdUsuario = document.createElement('td');
                tdUsuario.textContent = ag.nome_usuario;
                tr.appendChild(tdUsuario);

                tbody.appendChild(tr);
            });
        });
}


atualizarDashboard();
</script>


</section>