<?php
// Evita acesso direto
if (basename(__FILE__) === basename($_SERVER['SCRIPT_FILENAME'])) {
    header("Location: ../index.php");
    exit;
}
?>    
    
    <section class="config">
        <h1>Configurações</h1>

        <section aria-labelledby="conta-label">
            <h2 id="conta-label">Conta</h2>
            <div class="field-group">
                <label for="email" class="field-label">Email</label>
                <input type="email" id="email" value="usuario@email.com" />
            </div>
            <div class="field-group">
                <span class="field-label">Alterar senha</span>
                <button type="button" aria-label="Trocar senha">Trocar</button>
            </div>
        </section>

        <section aria-labelledby="notificacoes-label">
            <h2 id="notificacoes-label">Notificações</h2>
            <label class="checkbox-label" for="notificar-gmail">
                <input type="checkbox" id="notificar-gmail" />
                Notificar via Gmail?
            </label>
        </section>

        <section aria-labelledby="idioma-label">
            <h2 id="idioma-label">Idioma</h2>
            <div class="field-group">
                <label for="linguas" class="field-label">Idioma da interface</label>
                <select id="linguas" aria-describedby="linguas-desc">
                    <option>Português</option>
                    <option>Inglês</option>
                    <option>Espanhol</option>
                </select>
            </div>
        </section>

        <section aria-labelledby="privacidade-label">
            <h2 id="privacidade-label">Privacidade</h2>
            <div class="field-group">
                <span class="field-label">Histórico de visualização</span>
                <button type="button" aria-label="Limpar histórico">Limpar</button>
            </div>
            <div class="field-group">
                <span class="field-label">Deletar conta</span>
                <button type="button" aria-label="Excluir conta" style="background:#e74c3c;">Excluir</button>
            </div>
        </section>
</section>

