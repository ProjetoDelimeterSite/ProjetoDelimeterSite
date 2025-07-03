<main class="main-content">
    <section class="form-section container">
        <form id="formulario" method="POST" action="/api/nutricionista" autocomplete="on" class="form-card" aria-label="Cadastro de nutricionista">
            <img src="/public/assets/images/nutricionista.jpg" alt="Nutricionista" class="form-logo" />
            <h2 class="form-title">Cadastro de Nutricionista</h2>
            <div class="form-group">
                <label for="crm_nutricionista">CRN</label>
                <input type="text" id="crm_nutricionista" name="crm_nutricionista" required placeholder="Digite seu CRN" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" required placeholder="Digite seu CPF" autocomplete="off">
            </div>
            <button type="submit" class="btn-primary">Cadastrar</button>
        </form>
    </section>
</main>
    </div>
</main>
