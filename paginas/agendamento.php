<?php
// Evita acesso direto
if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    header("Location: ../index.php");
    exit;
}
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
            <form method="dialog" id="eventForm">
                <h2>Agendamento</h2>

                <label for="eventTitle">Titulo</label>
                <input type="text" id="eventTitle" placeholder="Meu evento!" required>

                <label for="eventDate">Data</label>
                <input type="date" id="eventDate" required>

                <div style="display: flex; gap: 10px; margin-top: 10px;">
                <div>
                    <label for="startTime">Início</label>
                    <input type="time" id="startTime" required>
                </div>
                <div>
                    <label for="endTime">Fim</label>
                    <input type="time" id="endTime" required>
                </div>
                </div>

                <label style="margin-top: 10px;">Cor</label>
                <div style="display: flex; gap: 10px; margin: 5px 0;">
                <input type="color" value="#3b82f6" class="color-option" />
                <input type="color" value="#f59e0b" class="color-option" />
                <input type="color" value="#10b981" class="color-option" />
                <input type="color" value="#a855f7" class="color-option" />
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 15px;">
                <button type="button" id="cancelBtn">Cancelar</button>
                <button type="submit" id="saveBtn">Salvar</button>
                </div>
            </form>
        </dialog>


    </div>
