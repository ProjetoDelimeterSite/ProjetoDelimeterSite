<main class="main-content" tabindex="-1">
    <section class="form-section container" aria-label="Área de login">
        <form action="/login/usuario" method="POST" id="formulario" autocomplete="on" class="form-card" aria-label="Formulário de login">
            <img src="/public/assets/images/logo.png" alt="Logo Delimeter" class="form-logo" />
            <h1 class="form-title">Entrar</h1>
            <div class="form-group">
                <label for="email_usuario">Email</label>
                <input type="email" name="email_usuario" required id="email_usuario" placeholder="Digite seu email" autocomplete="username">
            </div>
            <div class="form-group">
                <label for="senha_usuario">Senha</label>
                <input type="password" name="senha_usuario" required id="senha_usuario" placeholder="Digite sua senha" autocomplete="current-password">
            </div>
            <button type="submit" class="btn-primary">Entrar</button>
            <a href="/usuario/cadastro" class="btn-link">Não tem conta? Cadastre-se</a>
        </form>
    </section>
</main>