<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deliméter - Priorize sua Alimentação</title>
    <link rel="stylesheet" href="/public/assets/styles/delimeter-modern.css">
    <script src="/public/assets/scripts/main-modern.js" defer></script>
</head>

<body>
    <nav id="sidebar" class="sidebar" aria-label="Menu lateral">
        <div class="sidebar-header">
            <button id="sidebarToggle" class="sidebar-toggle" aria-label="Abrir/fechar menu lateral" tabindex="0">
                <span class="sidebar-toggle-icon">&#9776;</span>
            </button>
            <img src="/public/assets/images/logo.png" alt="Logo Delimeter" class="sidebar-logo" />
            <span class="sidebar-title">Deliméter</span>
        </div>
        <ul class="sidebar-nav" role="menu">
            <span class="sidebar-icons" style="display: none;">
                <li><a href="/delimeter/sobre" tabindex="0"><span class="icon">ℹ️</span></a></li>
                <li><a href="/delimeter/calculo" tabindex="0"><span class="icon">🧮</span></a></li>
                <?php if (isset($_SESSION['usuario'])): ?>
                    <?php if ($_SESSION['usuario']['tipo'] === 'paciente'): ?>
                        <li><a href="/paciente" tabindex="0"><span class="icon">🧑‍🦱</span></a></li>
                    <?php elseif ($_SESSION['usuario']['tipo'] === 'nutricionista'): ?>
                        <li><a href="/nutricionista" tabindex="0"><span class="icon">🥗</span></a></li>
                    <?php elseif ($_SESSION['usuario']['tipo'] === 'medico'): ?>
                        <li><a href="/medico" tabindex="0"><span class="icon">🩺</span></a></li>
                    <?php endif; ?>
                    <li><a href="/conta" tabindex="0"><span class="icon">👤</span></a></li>
                    <li><a href="/usuario" tabindex="0"><span class="icon">🏠</span></a></li>
                <?php else: ?>
                    <li><a href="/usuario/cadastro" tabindex="0"><span class="icon">📝</span></a></li>
                    <li><a href="/usuario/login" tabindex="0"><span class="icon">🔑</span></a></li>
                <?php endif; ?>
            </span>
            <li><a href="/delimeter/sobre" tabindex="0"><span class="icon">ℹ️</span> Sobre Nós</a></li>
            <li><a href="/delimeter/calculo" tabindex="0"><span class="icon">🧮</span> Cálculo Nutricional</a></li>
            <?php if (isset($_SESSION['usuario'])): ?>
                <?php if ($_SESSION['usuario']['tipo'] === 'paciente'): ?>
                    <li><a href="/paciente" tabindex="0"><span class="icon">🧑‍🦱</span> Painel Paciente</a></li>
                <?php elseif ($_SESSION['usuario']['tipo'] === 'nutricionista'): ?>
                    <li><a href="/nutricionista" tabindex="0"><span class="icon">🥗</span> Painel Nutricionista</a></li>
                <?php elseif ($_SESSION['usuario']['tipo'] === 'medico'): ?>
                    <li><a href="/medico" tabindex="0"><span class="icon">🩺</span> Painel Médico</a></li>
                <?php endif; ?>
                <li><a href="/conta" tabindex="0"><span class="icon">👤</span> Conta</a></li>
                <li><a href="/usuario" tabindex="0"><span class="icon">🏠</span> Home</a></li>
            <?php else: ?>
                <li><a href="/usuario/cadastro" tabindex="0"><span class="icon">📝</span> Cadastrar-se</a></li>
                <li><a href="/usuario/login" tabindex="0"><span class="icon">🔑</span> Login</a></li>
            <?php endif; ?>
        </ul>
        <div class="sidebar-footer">
            <button onclick="aumentarFonte()" aria-label="Aumentar fonte" tabindex="0">A+</button>
            <button onclick="diminuirFonte()" aria-label="Diminuir fonte" tabindex="0">A-</button>
            <button onclick="toggleContraste()" id="contraste-btn" aria-pressed="false" aria-label="Alto Contraste" tabindex="0">Contraste</button>
            <button onclick="resetarAcessibilidade()" aria-label="Restaurar acessibilidade" tabindex="0">Normal</button>
        </div>
    </nav>
    <div id="main-wrapper" class="main-wrapper">