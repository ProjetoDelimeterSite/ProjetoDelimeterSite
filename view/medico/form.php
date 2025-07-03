<main class="main-content">
    <section class="form-section container">
        <form id="formulario" method="POST" action="/api/medico" autocomplete="on" class="form-card" aria-label="Cadastro de médico">
            <img src="/public/assets/images/medico.png" alt="Médico" class="form-logo" />
            <h2 class="form-title">Cadastro de Médico</h2>
            <div class="form-group">
                <label for="crm_medico">CRM</label>
                <input type="text" id="crm_medico" name="crm_medico" required placeholder="Digite seu CRM" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" required placeholder="Digite seu CPF" autocomplete="off">
            </div>
            <button type="submit" class="btn-primary">Cadastrar</button>
        </form>
    </section>
</main>