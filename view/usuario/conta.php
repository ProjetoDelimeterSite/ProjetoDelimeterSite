<?php
if (!isset($_SESSION)) session_start();
$usuario = $_SESSION['usuario'] ?? null;
if (!$usuario) {
    header('Location: /usuario/login');
    exit;
}

$tipo = $usuario['tipo'] ?? 'usuario'; // 'usuario', 'paciente', 'nutricionista', 'medico'

// Definindo rotas conforme o tipo logado
switch ($tipo) {
    case 'paciente':
        $rotaAtualizar = '/paciente/conta/atualizar';
        $rotaDeletar   = '/paciente/conta/deletar';
        break;
    case 'nutricionista':
        $rotaAtualizar = '/nutricionista/conta/atualizar';
        $rotaDeletar   = '/nutricionista/conta/deletar';
        break;
    case 'medico':
        $rotaAtualizar = '/medico/conta/atualizar';
        $rotaDeletar   = '/medico/conta/deletar';
        break;
    case 'usuario':
    default:
        $rotaAtualizar = '/conta/atualizar';
        $rotaDeletar   = '/conta/deletar';
}

?>
<main>
    <div class="container-calc">
        <div class="container">
            <h1>Minha Conta</h1>
            <?php if (isset($_GET['atualizado'])): ?>
                <div style="color:green; margin-bottom:10px;">Dados atualizados com sucesso!</div>
            <?php elseif (isset($_GET['erro'])): ?>
                <div style="color:red; margin-bottom:10px;">Erro ao atualizar dados.</div>
            <?php endif; ?>

            <!-- Formulário para nome, email e senha -->
            <form action="<?php echo $rotaAtualizar; ?>" method="POST" id="formulario-conta">
                <div class="form-group">
                    <label for="nome_usuario">Nome:</label>
                    <input type="text" name="nome_usuario" required id="nome_usuario" value="<?php echo htmlspecialchars($usuario['nome_usuario'] ?? $usuario['nome'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label for="email_usuario">Email:</label>
                    <input type="email" name="email_usuario" required id="email_usuario" value="<?php echo htmlspecialchars($usuario['email_usuario'] ?? $usuario['email'] ?? ''); ?>">
                </div>
                <div class="form-group">
                    <label for="senha_usuario">Nova Senha:</label>
                    <input type="password" name="senha_usuario" id="senha_usuario" placeholder="Deixe em branco para não alterar">
                </div>
                <button type="submit">Atualizar Dados</button>
            </form>

            <!-- Formulário separado para dados extras -->
            <?php if ($tipo === 'paciente'): ?>
                <form action="<?php echo $rotaAtualizar; ?>" method="POST" id="formulario-paciente" style="margin-top: 24px;">
                    <h2>Dados do Paciente</h2>
                    <div class="form-group">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" id="cpf" required value="<?php echo htmlspecialchars($usuario['cpf'] ?? $usuario['cpf_paciente'] ?? ''); ?>">
                    </div>
                    <div class="form-group">
                        <label for="nis">NIS:</label>
                        <input type="text" name="nis" id="nis" value="<?php echo htmlspecialchars($usuario['nis'] ?? $usuario['nis_paciente'] ?? ''); ?>">
                    </div>
                    <button type="submit">Atualizar Dados do Paciente</button>
                </form>
            <?php elseif ($tipo === 'nutricionista'): ?>
                <form action="<?php echo $rotaAtualizar; ?>" method="POST" id="formulario-nutricionista" style="margin-top: 24px;">
                    <h2>Dados do Nutricionista</h2>
                    <div class="form-group">
                        <label for="crm_nutricionista">CRN:</label>
                        <input type="text" name="crm_nutricionista" id="crm_nutricionista" required value="<?php echo htmlspecialchars($usuario['crm_nutricionista'] ?? $usuario['crm'] ?? ''); ?>">
                    </div>
                    <button type="submit">Atualizar Dados do Nutricionista</button>
                </form>
            <?php elseif ($tipo === 'medico'): ?>
                <form action="<?php echo $rotaAtualizar; ?>" method="POST" id="formulario-medico" style="margin-top: 24px;">
                    <h2>Dados do Médico</h2>
                    <div class="form-group">
                        <label for="crm_medico">CRM:</label>
                        <input type="text" name="crm_medico" id="crm_medico" required value="<?php echo htmlspecialchars($usuario['crm_medico'] ?? $usuario['crm'] ?? ''); ?>">
                    </div>
                    <button type="submit">Atualizar Dados do Médico</button>
                </form>
            <?php endif; ?>

            <form action="<?php echo $rotaDeletar; ?>" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar sua conta? Esta ação não poderá ser desfeita!');" style="margin-top:20px;">
                <button type="submit" style="background:#c62828;">Deletar Conta</button>
            </form>
            <a href="/conta/sair" style="display:inline-block; margin-top:20px; color:#fff; background:#388e3c; padding:10px 24px; border-radius:4px; text-decoration:none;">Sair</a>
        </div>
    </div>
</main>
