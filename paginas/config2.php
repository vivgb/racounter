<?php include('idioma.js');?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Configurações</title>
    <link rel="stylesheet" href="css/config.css">
</head>
<body>
    <main class="container" role="main" aria-label="Configurações do Usuário">
        <h1 id="page-title">Configurações</h1>

        <section aria-labelledby="conta-label">
            <h2 id="conta-label">Conta</h2>
            <div class="field-group">
                <label for="email" class="field-label" id="email-label">Email</label>
                <input type="email" id="email" value="usuario@email.com" />
            </div>
            <div class="field-group">
                <span class="field-label" id="change-password">Alterar senha</span>
                <button type="button" aria-label="Trocar senha">Trocar</button>
            </div>
        </section>

        <section aria-labelledby="notificacoes-label">
            <h2 id="notificacoes-label">Notificações</h2>
            <label class="checkbox-label" for="notificar-gmail">
                <input type="checkbox" id="notificar-gmail" />
                <span id="notify-gmail">Notificar via Gmail?</span>
            </label>
        </section>

        <section aria-labelledby="idioma-label">
            <h2 id="idioma-label">Idioma</h2>
            <div class="field-group">
                <label for="linguas" class="field-label" id="linguas-label">Idioma da interface</label>
                <select id="linguas" aria-describedby="linguas-desc" onchange="changeLangAndSave(this.value)">
                    <option value="pt-BR">Português</option>
                    <option value="en">Inglês</option>
                    <option value="es">Espanhol</option>
                    </select>
            </div>
        </section>

        <section aria-labelledby="privacidade-label">
            <h2 id="privacidade-label">Privacidade</h2>
            <div class="field-group">
                <span class="field-label" id="view-history">Histórico de visualização</span>
                <button type="button" aria-label="Limpar histórico" id="clear-history">Limpar</button>
            </div>
            <div class="field-group">
                <span class="field-label" id="delete-account">Deletar conta</span>
                <button type="button" aria-label="Excluir conta" id="delete-button" style="background:#e74c3c;">Excluir</button>
            </div>
        </section>
    </main>
</body>
</html>
