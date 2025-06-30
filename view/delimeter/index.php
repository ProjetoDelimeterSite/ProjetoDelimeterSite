<?php
if (!isset($_SESSION)) session_start();
$usuario = $_SESSION['usuario'] ?? null;
if ($usuario) {
    header('Location: /'. $_SESSION['usuario']['tipo'] .'');
    exit;
}
?>  
    <main>
        <section class="container-main">
            <div class="container-main-image">
                <img src="/public/assets/images/pexels-fauxels-3184195.jpg" alt="Alimentação saudável">
                <h1>PRIORIZAMOS A SUA ALIMENTAÇÃO</h1>
            </div>
            <div class="caixas">
                <div class="caixaAlfa caixaRelativa">
                    <h2>Sobre o Delímiter</h2>
                    <p>Uma plataforma nova voltada à alimentação</p>
                    <a href="about.php" class="link">Saiba mais</a>
                </div>
                <div class="caixaAlfa caixaRelativa">
                    <h2>Dados métricos</h2>
                    <p>Calcule o seu gasto energético basal</p>
                    <a href="calculo_landpage.php" class="link">Saiba mais</a>
                </div>
            </div>
            <div class="parceiros">
                <h2>PARCERIAS</h2>
                <p>Conheça nossos parceiros</p>
                <div class="logos">
                    <a href="#"><img src="/public/assets/images/sus.jpeg" alt="SUS" class="caixaRelativa"></a>
                    <a href="#"><img src="/public/assets/images/crn3.jpeg" alt="CRN3" class="caixaRelativa"></a>
                    <a href="#"><img src="/public/assets/images/cremesp.jpeg" alt="CREMESP" class="caixaRelativa"></a>
                </div>
            </div>
        </section>
        <section class="funcionalidades">
            <h2>FUNCIONALIDADES</h2>
            <div class="caixas">
                <div class="caixa">
                    <a href="#"><img src="/public/assets/images/nutricionista.jpg" alt="Nutricionista" class="caixaRelativa"></a>
                    <h3>Marque uma consulta com uma nutricionista</h3>
                    <p>Para acompanhar sua alimentação.</p>
                </div>
                <div class="caixa">
                    <a href="#"><img src="/public/assets/images/dieta.jpg" alt="Dieta" class="caixaRelativa"></a>
                    <h3>Dietas focadas no seu perfil</h3>
                    <p>Através do mapeamento de dados.</p>
                </div>
                <div class="caixa">
                    <a href="#"><img src="/public/assets/images/crianca.jpg" alt="Criança" class="caixaRelativa"></a>
                    <h3>Plano alimentar junto ao cadúnico</h3>
                    <p>Associar famílias de baixa renda a fornecedores de alimentos.</p>
                </div>
            </div>
        </section>
    </main>