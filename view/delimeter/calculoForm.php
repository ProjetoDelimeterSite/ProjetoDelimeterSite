<link rel="stylesheet" href="/public/assets/styles/global.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/public/assets/scripts/global.js"></script>
<script src="/public/assets/scripts/acessibilidade.js"></script>
<main class="main-content">
    <section class="container-main">
        <div class="container-main-image">
            <img src="/public/assets/images/almoço.jpg" alt="Alimentação saudável" class="responsive">
            <h1>PRIORIZAMOS A SUA ALIMENTAÇÃO</h1>
        </div>
    </section>
    <section class="form-section container">
        <div class="form-card">
            <h1 class="form-title">Cálculo de Gasto Energético</h1>
            <form id="formulario" autocomplete="off" onsubmit="event.preventDefault(); if (validarFormulario()) enviarDados();" aria-label="Cálculo nutricional">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>
                </div>
                <div class="form-group">
                    <label for="idade">Idade</label>
                    <input type="number" id="idade" name="idade" min="1" max="120" placeholder="Ex: 25" required>
                </div>
                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <select id="sexo" name="sexo" required>
                        <option value="">Selecione</option>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="peso">Peso (kg)</label>
                    <input type="number" id="peso" name="peso" step="0.1" min="20" max="300" placeholder="Ex: 68.5" required>
                </div>
                <div class="form-group">
                    <label for="altura">Altura (cm)</label>
                    <input type="number" id="altura" name="altura" step="1" min="100" max="250" placeholder="Ex: 175" required>
                </div>
                <div class="form-group">
                    <label for="atividade">Atividade Física</label>
                    <select id="atividade" name="atividade" required>
                        <option value="">Selecione</option>
                        <option value="sedentário">Sedentário</option>
                        <option value="moderadamente ativo">Moderadamente Ativo</option>
                        <option value="ativo">Ativo</option>
                    </select>
                </div>
                <button type="submit" class="btn-primary">Calcular</button>
            </form>
        </div>
        <div class="form-card" id="resultado"></div>
    </section>
</main>