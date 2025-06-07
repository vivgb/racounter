<?php
// Evita acesso direto
if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    header("Location: ../index.php");
    exit;
}

require_once 'php/dashboard_dados.php';

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

</section>


<script type="module" src="idioma.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
