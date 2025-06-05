<!-- MAIN -->
<i?php
// Evita acesso direto
if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    header("Location: ../index.php");
    exit;
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
                <h3>2/3</h3>
                <p>Salas Ativas</p>
            </span>
        </li>
        <li>
            <i class='bx bx-log-in'></i>      
            <span class="text">
                <h3>12</h3>
                <p>Entrada</p>
            </span>
        </li>
        <li>
            <i class='bx bx-log-out'></i>      
            <span class="text">
                <h3>56</h3>
                <p>Saída</p>
            </span>
        </li>
        <li>
            <i class='bx bx-group'></i>       
            <span class="text">
                <h3>56</h3>
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
                        <th>Data/Hora</th>
                        <th>Usuário</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="https://placehold.co/600x400/png">
                            <p>Micheal John</p>
                        </td>
                        <td>18-10-2021</td>
                        <td><span class="status completed">Completed</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="https://placehold.co/600x400/png">
                            <p>Ryan Doe</p>
                        </td>
                        <td>01-06-2022</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="https://placehold.co/600x400/png">
                            <p>Tarry White</p>
                        </td>
                        <td>14-10-2021</td>
                        <td><span class="status process">Process</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="https://placehold.co/600x400/png">
                            <p>Selma</p>
                        </td>
                        <td>01-02-2023</td>
                        <td><span class="status pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td>
                            <img src="https://placehold.co/600x400/png">
                            <p>Andreas Doe</p>
                        </td>
                        <td>31-10-2021</td>
                        <td><span class="status completed">Completed</span></td>
                    </tr>
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


</section>