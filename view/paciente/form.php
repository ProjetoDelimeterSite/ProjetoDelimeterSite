<h1>Cadastro de Paciente</h1>
<form id="formulario" method="POST" action="/api/paciente" style="max-width:400px;margin:0 auto;">
    <h2 style="text-align:center;margin-bottom:20px;">Cadastro de Paciente</h2>
    <label for="nome_usuario">Nome:</label>
    <input type="text" id="nome_usuario" name="nome_usuario" required>
    <label for="email_usuario">E-mail:</label>
    <input type="email" id="email_usuario" name="email_usuario" required>
    <label for="senha_usuario">Senha:</label>
    <input type="password" id="senha_usuario" name="senha_usuario" required>
    <label for="confirmar_senha">Confirmar Senha:</label>
    <input type="password" id="confirmar_senha" name="confirmar_senha" required>
    <button type="submit" style="margin-top:18px;">Cadastrar</button>
</form>
<script>
document.getElementById('formulario').addEventListener('submit', function(e) {
    var senha = document.getElementById('senha_usuario').value;
    var confirmar = document.getElementById('confirmar_senha').value;
    if (senha !== confirmar) {
        alert('As senhas não coincidem!');
        e.preventDefault();
    }
});
</script>