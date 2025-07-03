<?php
if (!isset($_SESSION)) session_start();
$usuario = $_SESSION['usuario'] ?? null;
if ($usuario) {
    header('Location: /'. $_SESSION['usuario']['tipo'] .'');
    exit;
}
?>
<main class="main-content">
    <section class="container-main">
        <div class="container-main-image" style="position:relative;">
            <img src="/public/assets/images/pexels-fauxels-3184195.jpg" alt="Alimentação saudável" style="width:100%; border-radius:var(--radius); box-shadow:var(--shadow);">
            <h1 style="position:absolute; bottom:24px; left:24px; color:#fff; background:rgba(67,160,71,0.8); padding:10px 24px; border-radius:var(--radius); font-size:2.2rem;">PRIORIZAMOS A SUA ALIMENTAÇÃO</h1>
        </div>
        <div class="caixas" style="display:flex; gap:24px; flex-wrap:wrap; margin-top:32px;">
            <div class="form-card" style="flex:1; min-width:220px;">
                <h2>Bem-vindo ao Delimeter</h2>
                <p>Plataforma inteligente para saúde nutricional, conectando você a profissionais e recursos confiáveis.</p>
            </div>
            <div class="form-card" style="flex:1; min-width:220px;">
                <img src="/public/assets/images/persefone-feliz.png" alt="Assistente Virtual Perséfone" class="img-small" style="width:48px;">
                <p>Conte com a Perséfone, nossa assistente virtual, para dicas e cálculos personalizados.</p>
            </div>
            <div class="form-card" style="flex:1; min-width:220px;">
                <img src="/public/assets/images/nutricionista.jpg" alt="Nutricionista" class="img-small" style="width:48px;">
                <p>Encontre nutricionistas e médicos parceiros para acompanhamento completo.</p>
            </div>
        </div>
        <div class="parceiros logos" style="display:flex; gap:24px; justify-content:center; margin:32px 0;">
            <img src="/public/assets/images/sus.jpeg" alt="SUS" style="height:48px;">
            <img src="/public/assets/images/crn3.png" alt="CRN3" style="height:48px;">
            <img src="/public/assets/images/cremesp.png" alt="CREMESP" style="height:48px;">
        </div>
    </section>
    <section class="funcionalidades">
        <h2 style="color:var(--primary); font-size:1.5rem;">FUNCIONALIDADES</h2>
        <div class="caixas" style="display:flex; gap:24px; flex-wrap:wrap;">
            <div class="form-card" style="flex:1; min-width:220px;">
                <img src="/public/assets/images/almoço.jpg" alt="Cálculo Nutricional" style="width:48px; border-radius:50%;">
                <h3>Cálculo Nutricional</h3>
                <p>Calcule seu IMC, necessidades energéticas e distribuição de macronutrientes de forma simples e rápida.</p>
            </div>
            <div class="form-card" style="flex:1; min-width:220px;">
                <img src="/public/assets/images/persefone-feliz.png" alt="Assistente Virtual" style="width:48px; border-radius:50%;">
                <h3>Assistente Virtual</h3>
                <p>Receba orientações automáticas e dicas de saúde com a Perséfone, nossa IA exclusiva.</p>
            </div>
            <div class="form-card" style="flex:1; min-width:220px;">
                <img src="/public/assets/images/nutricionista.jpg" alt="Profissionais" style="width:48px; border-radius:50%;">
                <h3>Profissionais Parceiros</h3>
                <p>Conecte-se a nutricionistas e médicos para acompanhamento personalizado.</p>
            </div>
        </div>
    </section>
</main>