<main class="main-content">
    <section class="form-section container">
        <form action="/api/usuario" method="POST" id="formulario" autocomplete="on" class="form-card" aria-label="Cadastro de usuário">
            <img src="/public/assets/images/logo.png" alt="Logo Delimeter" class="form-logo" />
            <h1 class="form-title">Cadastro de Usuário</h1>
            <div class="form-group">
                <label for="nome_usuario">Nome</label>
                <input type="text" name="nome_usuario" required id="nome_usuario" placeholder="Digite seu nome completo" autocomplete="name">
            </div>
            <div class="form-group">
                <label for="email_usuario">Email</label>
                <input type="email" name="email_usuario" required id="email_usuario" placeholder="Digite seu email" autocomplete="email">
            </div>
            <div class="form-group">
                <label for="senha_usuario">Senha</label>
                <input type="password" name="senha_usuario" required id="senha_usuario" placeholder="Crie uma senha" autocomplete="new-password">
            </div>
            <div class="form-group">
                <label for="confirmar_senha">Confirmar Senha</label>
                <input type="password" name="confirmar_senha" required id="confirmar_senha" placeholder="Repita a senha" autocomplete="new-password">
            </div>
            <button type="submit" class="btn-primary">Cadastrar</button>
            <a href="/usuario/login" class="btn-link">Já tem conta? Entrar</a>
        </form>
    </section>
</main>