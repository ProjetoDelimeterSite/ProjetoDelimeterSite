<main>
        <div class="container-calc">
            <form id="formulario" method="POST" action="/api/nutricionista">
                <div class="container">
                    <h2 style="text-align:center;margin-bottom:20px;">Cadastro de Nutricionista</h2>
                    <div class="form-group">
                        <label for="crm_nutricionista">CRM:</label>
                        <input type="text" id="crm_nutricionista" name="crm_nutricionista" required>
                    </div>
                    <div class="form-group">
                        <label for="cpf">CPF:</label>
                        <input type="text" id="cpf" name="cpf" required>
                    </div>
                    <button type="submit" style="margin-top:18px;">Cadastrar</button>
                </div>
            </form>
        </div>
    </main>
