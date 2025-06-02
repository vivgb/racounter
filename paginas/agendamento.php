<?php
include('php/conexao.php'); 
$sqlSalas = "SELECT id_salas, descricao FROM salas WHERE ativo = '1'";
$resultSalas = mysqli_query($conn, $sqlSalas);
?>

    <div class="agendamento">
        <h1 class="titulo-agendamento">Agendamento</h1>
        <div class="geral">
            <header>
                <p class="data_atual"></p>
                <div class="icons">
                    <span id="prev" class="material-symbols-rounded">chevron_left</span>
                    <span id="next" class="material-symbols-rounded">chevron_right</span> 
                </div>
            </header>
            <div class="calendario">
                <ul class="semanas">
                    <li>Dom</li>
                    <li>Seg</li>
                    <li>Ter</li>
                    <li>Qua</li>
                    <li>Qui</li>
                    <li>Sex</li>
                    <li>Sab</li>
                </ul>
                <ul class="dias"></ul>    
            </div>
        </div>
        <dialog id="eventDialog" >
            <form method="POST" action="php/salvarAgendamento.php" id="eventForm">
                <h2>Agendamento</h2>

                <label for="eventTitle">Titulo</label>
                <input type="text" id="eventTitle" name="eventTitle" placeholder="Meu evento!" required>
                
                <input type="hidden" id="eventId" name="eventId">


                <label for="eventDate">Data</label>
                <input type="date" id="eventDate" name="eventDate" required>

                <label for="salaSelect">Sala</label>
                <select name="sala" id="salaSelect" required>
                    <?php while ($sala = mysqli_fetch_assoc($resultSalas)) : ?>
                        <option value="<?= $sala['id_salas'] ?>"><?= htmlspecialchars($sala['descricao']) ?></option>
                    <?php endwhile; ?>
                </select> 

                <div style="display: flex; gap: 10px; margin-top: 10px;">
                <div>
                    <label for="startTime">Início</label>
                    <input type="time" id="startTime" name="startTime" required>
                </div>
                <div>
                    <label for="endTime">Fim</label>
                    <input type="time" id="endTime" name="endTime" required>
                </div>
                </div>

                <label style="margin-top: 10px;">Cor</label>
                <div style="display: flex; gap: 10px; margin: 5px 0;">
                <input type="color" value="#3b82f6" class="color-option" />
                <input type="color" value="#f59e0b" class="color-option" />
                <input type="color" value="#10b981" class="color-option" />
                <input type="color" value="#a855f7" class="color-option" />
                </div>

                <input type="hidden" name="cor" id="corSelecionada" value="#3b82f6">


                <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 15px;">
                <button type="button" id="cancelBtn">Cancelar</button>
                <button type="submit" id="saveBtn">Salvar</button>
                </div>
            </form>
        </dialog>


    </div>
    <div id="popup-evento" class="popup-evento">
        <div class="popup-cabecalho">
            <strong>Detalhes</strong>
            <div class="popup-acoes">
            <button class="btn-icon" title="Excluir" id="excluirAgen"><i class="fa-solid fa-trash"></i></button>
            <button class="btn-icon" title="Editar" id="editarEventoBtn"><i class="fa-solid fa-pen"></i></button>
            <button class="btn-icon" title="Fechar" id="fecharPopup"><i class="fa-solid fa-x"></i></button>
            </div>
        </div>
        <div class="popup-detalhes">
            <div class="barra-cor" id="popup-barracor"></div>
            <div>
            <p id="popup-titulo" class="titulo-evento">Título do evento</p>
            <p id="popup-data" class="data-evento">Data</p>
            <p id="popup-horario" class="horario-evento">Horário</p>
            <p id="popup-sala" class="sala-evento">Sala</p>
            </div>
        </div>
    </div>

