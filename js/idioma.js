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
  
  function changeLangAndSave(lang) {
    localStorage.setItem("lang", lang);
    changeLanguage(lang);
  }
  
  document.addEventListener("DOMContentLoaded", () => {
    const savedLang = localStorage.getItem("lang") || "pt-BR";
    document.getElementById("linguas").value = savedLang;
    changeLanguage(savedLang);
  });
  
  export { translationsSettings, translationsFull, changeLanguage, changeLangAndSave };