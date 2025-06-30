<h1>Cadastro de Paciente</h1>
<form id="formulario" method="POST" action="/api/paciente" style="max-width:400px;margin:0 auto;">
    <h2 style="text-align:center;margin-bottom:20px;">Cadastro de Paciente</h2>
    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf" required>
    <label for="nis">NIS:</label>
    <input type="text" id="nis" name="nis">
    <button type="submit" style="margin-top:18px;">Cadastrar</button>
</form>
<!-- <script>
document.getElementById('formulario').addEventListener('submit', function(e) {
    var senha = document.getElementById('senha').value;
    var confirmar = document.getElementById('confirmar_senha').value;
    if (senha !== confirmar) {
        alert('As senhas não coincidem!');
        e.preventDefault();
    }
});
</script> -->