<main class="main-content">
    <section class="form-section container">
        <form id="formulario" method="POST" action="/api/paciente" autocomplete="on" class="form-card" aria-label="Cadastro de paciente">
            <img src="/public/assets/images/paciente.png" alt="Paciente" class="form-logo" />
            <h2 class="form-title">Cadastro de Paciente</h2>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" required placeholder="Digite seu CPF" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="nis">NIS</label>
                <input type="text" id="nis" name="nis" placeholder="Digite seu NIS (opcional)" autocomplete="off">
            </div>
            <button type="submit" class="btn-primary">Cadastrar</button>
        </form>
    </section>
</main>