<main class="main-content">
    <section class="form-section container">
        <form action="select_usuario.php" method="POST" id="formulario" class="form-card" aria-label="Formulário de login">
            <h1 class="form-title">Entrar</h1>
            <div class="form-group">
                <label for="email_usuario">Email:</label>
                <input type="email" name="email_usuario" required id="email_usuario" autocomplete="username">
            </div>
            <div class="form-group">
                <label for="senha_usuario">Senha:</label>
                <input type="password" name="senha_usuario" required id="senha_usuario" autocomplete="current-password">
            </div>
            <button type="submit" class="btn-primary">Entrar</button>
        </form>
    </section>
</main>