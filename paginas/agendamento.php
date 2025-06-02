<?php
include('php/conexao.php'); 
$sqlSalas = "SELECT id_salas, descricao FROM salas WHERE ativo = '1'";
$resultSalas = mysqli_query($conn, $sqlSalas);
const translationsSettings = {
    "pt-BR": {
      title: "Configurações",
      account: "Conta",
      email: "Email",
      changePassword: "Alterar senha",
      notifications: "Notificações",
      notifyViaGmail: "Notificar via Gmail?",
      language: "Idioma",
      interfaceLanguage: "Idioma da interface",
      privacy: "Privacidade",
      viewHistory: "Histórico de visualização",
      clearHistory: "Limpar",
      deleteAccount: "Deletar conta",
      delete: "Excluir"
    },
    "en": {
      title: "Settings",
      account: "Account",
      email: "Email",
      changePassword: "Change Password",
      notifications: "Notifications",
      notifyViaGmail: "Notify via Gmail?",
      language: "Language",
      interfaceLanguage: "Interface Language",
      privacy: "Privacy",
      viewHistory: "Viewing History",
      clearHistory: "Clear",
      deleteAccount: "Delete Account",
      delete: "Delete"
    },
    "es": {
      title: "Configuraciones",
      account: "Cuenta",
      email: "Correo electrónico",
      changePassword: "Cambiar contraseña",
      notifications: "Notificaciones",
      notifyViaGmail: "¿Notificar por Gmail?",
      language: "Idioma",
      interfaceLanguage: "Idioma de la interfaz",
      privacy: "Privacidad",
      viewHistory: "Historial de visualización",
      clearHistory: "Limpiar",
      deleteAccount: "Eliminar cuenta",
      delete: "Eliminar"
    }
  };
  
  const translationsFull = {
    "pt-BR": {
      agendamento: "Agendamento",
      titulo: "Título",
      meuEvento: "Meu evento!",
      data: "Data",
      sala: "Sala",
      inicio: "Início",
      fim: "Fim",
      cor: "Cor",
      cancelar: "Cancelar",
      salvar: "Salvar",
      detalhes: "Detalhes",
      excluir: "Excluir",
      editar: "Editar",
      fechar: "Fechar",
      diasSemana: ["Dom", "Seg", "Ter", "Qua", "Qui", "Sex", "Sab"],
      pageTitle: "Contagem de Pessoas na Sala",
      currentCapacity: "Lotação atual",
      maxCapacity: "Lotação máxima",
      status: "Status",
      occupied: "Ocupada",
      free: "Livre",
      roomNotFound: "Sala não encontrada.",
      noRoomId: "ID da sala não fornecido.",
      raccounter: "Raccounter",
      dashboard: "Dashboard",
      home: "Home",
      getPDF: "Baixar PDF",
      inUse: "EM uso",
      people: "Pessoas",
      dailyTotal: "Total diário",
      mostUsedRooms: "Salas mais usadas",
      code: "Código",
      quantity: "Quantidade",
      capacity: "Lotação",
      completed: "Concluído",
      pending: "Pendente",
      process: "Em processo",
      todos: "Tarefas",
      checkInventory: "Checar estoque",
      manageDelivery: "Gerenciar equipe de entrega",
      contactSelma: "Contato com Selma: Confirmar entrega",
      updateCatalogue: "Atualizar catálogo da loja",
      countProfit: "Contar análise de lucro",
      salas: "Salas",
      lotacao: "Lotação",
      ocupada: "Ocupada",
      livre: "Livre",
      novaSala: "Nova Sala"
    },
    "en": {
      agendamento: "Scheduling",
      titulo: "Title",
      meuEvento: "My event!",
      data: "Date",
      sala: "Room",
      inicio: "Start",
      fim: "End",
      cor: "Color",
      cancelar: "Cancel",
      salvar: "Save",
      detalhes: "Details",
      excluir: "Delete",
      editar: "Edit",
      fechar: "Close",
      diasSemana: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
      pageTitle: "Room Occupancy Count",
      currentCapacity: "Current Capacity",
      maxCapacity: "Maximum Capacity",
      status: "Status",
      occupied: "Occupied",
      free: "Free",
      roomNotFound: "Room not found.",
      noRoomId: "Room ID not provided.",
      raccounter: "Raccounter",
      dashboard: "Dashboard",
      home: "Home",
      getPDF: "Get PDF",
      inUse: "In Use",
      people: "People",
      dailyTotal: "Daily Total",
      mostUsedRooms: "Most Used Rooms",
      code: "Code",
      quantity: "Quantity",
      capacity: "Capacity",
      completed: "Completed",
      pending: "Pending",
      process: "Process",
      todos: "Todos",
      checkInventory: "Check Inventory",
      manageDelivery: "Manage Delivery Team",
      contactSelma: "Contact Selma: Confirm Delivery",
      updateCatalogue: "Update Shop Catalogue",
      countProfit: "Count Profit Analytics",
      salas: "Rooms",
      lotacao: "Capacity",
      ocupada: "Occupied",
      livre: "Free",
      novaSala: "New Room"
    },
    "es": {
      agendamento: "Agendamiento",
      titulo: "Título",
      meuEvento: "¡Mi evento!",
      data: "Fecha",
      sala: "Sala",
      inicio: "Inicio",
      fim: "Fin",
      cor: "Color",
      cancelar: "Cancelar",
      salvar: "Guardar",
      detalhes: "Detalles",
      excluir: "Eliminar",
      editar: "Editar",
      fechar: "Cerrar",
      diasSemana: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
      pageTitle: "Conteo de Personas en la Sala",
      currentCapacity: "Capacidad actual",
      maxCapacity: "Capacidad máxima",
      status: "Estado",
      occupied: "Ocupada",
      free: "Libre",
      roomNotFound: "Sala no encontrada.",
      noRoomId: "ID de sala no proporcionado.",
      raccounter: "Raccounter",
      dashboard: "Panel",
      home: "Inicio",
      getPDF: "Descargar PDF",
      inUse: "En uso",
      people: "Personas",
      dailyTotal: "Total diario",
      mostUsedRooms: "Salas más usadas",
      code: "Código",
      quantity: "Cantidad",
      capacity: "Capacidad",
      completed: "Completado",
      pending: "Pendiente",
      process: "En proceso",
      todos: "Tareas",
      checkInventory: "Verificar inventario",
      manageDelivery: "Gestionar equipo de entrega",
      contactSelma: "Contactar a Selma: Confirmar entrega",
      updateCatalogue: "Actualizar catálogo de tienda",
      countProfit: "Contar análisis de ganancias",
      salas: "Salas",
      lotacao: "Capacidad",
      ocupada: "Ocupada",
      livre: "Libre",
      novaSala: "Nueva Sala"
    }
  };
  
  function changeLanguage(lang) {
    document.getElementById("page-title").innerText = translationsSettings[lang].title;
    document.getElementById("conta-label").innerText = translationsSettings[lang].account;
    document.getElementById("email-label").innerText = translationsSettings[lang].email;
    document.getElementById("change-password").innerText = translationsSettings[lang].changePassword;
    document.getElementById("notificacoes-label").innerText = translationsSettings[lang].notifications;
    document.getElementById("notify-gmail").innerText = translationsSettings[lang].notifyViaGmail;
    document.getElementById("idioma-label").innerText = translationsSettings[lang].language;
    document.getElementById("linguas-label").innerText = translationsSettings[lang].interfaceLanguage;
    document.getElementById("privacidade-label").innerText = translationsSettings[lang].privacy;
    document.getElementById("view-history").innerText = translationsSettings[lang].viewHistory;
    document.getElementById("clear-history").innerText = translationsSettings[lang].clearHistory;
    document.getElementById("delete-account").innerText = translationsSettings[lang].deleteAccount;
    document.getElementById("delete-button").innerText = translationsSettings[lang].delete;
  }
  
  export { translationsSettings, translationsFull, changeLanguage };
  
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

