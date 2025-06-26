<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deliméter - Priorize sua Alimentação</title>
    <link rel="stylesheet" href="/public/assets/styles/styles.css">
</head>

<body>
    <?php
    session_start();
    ?>
    <header>
        <div class="logo">
            <a href="/"><img src="/public/assets/images/logo.png" alt="Logo Delímiter"></a>
        </div>
        <div class="menu-hamburguer">
            <input type="checkbox" id="menu-toggle">
            <label for="menu-toggle" class="menu-icon">
                <div class="linha"></div>
                <div class="linha"></div>
                <div class="linha"></div>
            </label>
            <div class="overlay">
                <nav>
                    <ul aria-label="Acessibilidade" class="acessibilidade">
                        <li><a href="/delimeter/sobre" class="link">Sobre Nós</a></li>
                        <li><a href="/delimeter/calculo" class="link">Cálculo nutricional</a></li>
                        <?php if (isset($_SESSION['usuario'])): ?>
                            <li><a href="/conta" class="link">Conta</a></li>
                        <?php else: ?>
                            <li><a href="/usuario/cadastro" class="link">Cadastrar-se</a></li>
                            <li><a href="/usuario/login" class="link">Login</a></li>
                        <?php endif; ?>
                        <li><p>Modificar tamanho da fonte</p></li>
                        <li><button onclick="aumentarFonte()" id="aumentar-fonte-btn" aria-label="Aumentar tamanho da fonte" accesskey="2" tabindex="2">A+</button></li>
                        <li><button onclick="diminuirFonte()" id="diminuir-fonte-btn" aria-label="Diminuir tamanho da fonte" accesskey="3" tabindex="3">A-</button></li>
                        <li><p>Modificar estilo da exibição</p></li>
                        <li><button onclick="toggleContraste()" id="contraste-btn" aria-pressed="false" aria-label="Ativar ou desativar alto contraste">Alto Contraste</button></li>
                        <li><button onclick="toggleDaltonismo('protanopia')" aria-label="Simular protanopia">Protanopia</button></li>
                        <li><button onclick="toggleDaltonismo('deuteranopia')" aria-label="Simular deuteranopia">Deuteranopia</button></li>
                        <li><button onclick="toggleDaltonismo('tritanopia')" aria-label="Simular tritanopia">Tritanopia</button></li>
                        <button onclick="resetarAcessibilidade()" aria-label="Restaurar configurações de acessibilidade">Voltar ao normal</button>
                    </ul>
                </nav>
            </div>
        </div>
    </header>