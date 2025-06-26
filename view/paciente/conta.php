<?php
// ...existing code for header include...
?>
<div class="usuario-container" style="background: linear-gradient(120deg, #f4f4f4 60%, #e0f7fa 100%); min-height: 100vh;">
    <main class="usuario-main-content" style="max-width: 600px; margin: 0 auto; padding-bottom: 40px;">
        <div class="usuario-header" style="margin-bottom: 30px; background: linear-gradient(90deg, #ff9800 70%, #f57c00 100%); border-radius: 14px;">
            <h1 style="font-size:2rem; color:#fff;">🧑‍🦱 Minha Conta - Paciente</h1>
        </div>
        <form method="POST" action="/conta/atualizar">
            <label for="nome_usuario">Nome:</label>
            <input type="text" id="nome_usuario" name="nome_usuario" value="<?php echo htmlspecialchars($_SESSION['usuario']['nome_usuario'] ?? ''); ?>" required>
            <label for="email_usuario">E-mail:</label>
            <input type="email" id="email_usuario" name="email_usuario" value="<?php echo htmlspecialchars($_SESSION['usuario']['email_usuario'] ?? ''); ?>" required>
            <label for="senha_usuario">Nova Senha:</label>
            <input type="password" id="senha_usuario" name="senha_usuario" placeholder="Deixe em branco para não alterar">
            <button type="submit" style="background:#ff9800;">Atualizar Dados</button>
        </form>
        <form method="POST" action="/conta/deletar" style="margin-top:20px;">
            <button type="submit" style="background:#d32f2f;">Excluir Conta</button>
        </form>
        <form method="GET" action="/conta/sair" style="margin-top:20px;">
            <button type="submit" style="background:#757575;">Sair</button>
        </form>
    </main>
</div>
<?php
// ...existing code for footer include...
?>
