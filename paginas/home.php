<!-- MAIN -->
<?php
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
            <span class="text">Get PDF</span>
        </a>
    </div>

    <ul class="box-info">
        <li>
            <i class='bx bxs-calendar-check' ></i>
            <span class="text">
                <h3>2/3</h3>
                <p>EM uso</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-group' ></i>
            <span class="text">
                <h3>12</h3>
                <p>Pessoas</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-dollar-circle' ></i>
            <span class="text">
                <h3>56</h3>
                <p>Total diario</p>
            </span>
        </li>
    </ul>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Salas mais usadas</h3>
                <i class='bx bx-search' ></i>
                <i class='bx bx-filter' ></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>quantidade</th>
                        <th>Lotação</th>
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
        <div class="todo">
            <div class="head">
                <h3>Todos</h3>
                <i class='bx bx-plus icon'></i>
                <i class='bx bx-filter' ></i>

            </div>
            <ul class="todo-list">
                <li class="completed">
                    <p>Check Inventory</p>
                    <i class='bx bx-dots-vertical-rounded' ></i>
                </li>
                <li class="completed">
                    <p>Manage Delivery Team</p>
                    <i class='bx bx-dots-vertical-rounded' ></i>
                </li>
                <li class="not-completed">
                    <p>Contact Selma: Confirm Delivery</p>
                    <i class='bx bx-dots-vertical-rounded' ></i>
                </li>
                <li class="completed">
                    <p>Update Shop Catalogue</p>
                    <i class='bx bx-dots-vertical-rounded' ></i>
                </li>
                <li class="not-completed">
                    <p>Count Profit Analytics</p>
                    <i class='bx bx-dots-vertical-rounded' ></i>
                </li>
            </ul>
        </div>
    </div>
    

    <!-- MAIN -->
    <!-- CONTENT -->

</section>
