
const translations = {
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

function changeLanguage(lang) {
    document.getElementById("page-title").innerText = translations[lang].title;
    document.getElementById("conta-label").innerText = translations[lang].account;
    document.getElementById("email-label").innerText = translations[lang].email;
    document.getElementById("change-password").innerText = translations[lang].changePassword;
    document.getElementById("notificacoes-label").innerText = translations[lang].notifications;
    document.getElementById("notify-gmail").innerText = translations[lang].notifyViaGmail;
    document.getElementById("idioma-label").innerText = translations[lang].language;
    document.getElementById("linguas-label").innerText = translations[lang].interfaceLanguage;
    document.getElementById("privacidade-label").innerText = translations[lang].privacy;
    document.getElementById("view-history").innerText = translations[lang].viewHistory;
    document.getElementById("clear-history").innerText = translations[lang].clearHistory;
    document.getElementById("delete-account").innerText = translations[lang].deleteAccount;
    document.getElementById("delete-button").innerText = translations[lang].delete;
}