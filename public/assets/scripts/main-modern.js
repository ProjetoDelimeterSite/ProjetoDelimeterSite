document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const mainWrapper = document.getElementById('main-wrapper');
    let isMobile = window.innerWidth <= 600;

    function updateSidebar() {
        isMobile = window.innerWidth <= 600;
        if (isMobile) {
            sidebar.classList.remove('collapsed');
            if (!sidebar.classList.contains('open')) {
                sidebar.style.left = '-100vw';
            }
        } else {
            sidebar.classList.remove('open');
            sidebar.style.left = '';
        }
    }

    sidebarToggle.addEventListener('click', function () {
        if (isMobile) {
            sidebar.classList.toggle('open');
            sidebar.style.left = sidebar.classList.contains('open') ? '0' : '-100vw';
        } else {
            sidebar.classList.toggle('collapsed');
            mainWrapper.style.marginLeft = sidebar.classList.contains('collapsed') ? '64px' : '260px';
        }
        // Atualiza exibição dos ícones
        atualizarSidebarIcons();
    });

    function atualizarSidebarIcons() {
        const icons = sidebar.querySelector('.sidebar-icons');
        if (!icons) return;
        if (!sidebar.classList.contains('open') && !sidebar.classList.contains('collapsed')) {
            icons.style.display = 'flex';
        } else {
            icons.style.display = 'none';
        }
    }

    window.addEventListener('resize', function() {
        updateSidebar();
        atualizarSidebarIcons();
    });
    updateSidebar();
    atualizarSidebarIcons();

    // Fechar menu mobile ao clicar fora
    document.addEventListener('click', function (e) {
        if (isMobile && sidebar.classList.contains('open')) {
            if (!sidebar.contains(e.target) && e.target !== sidebarToggle) {
                sidebar.classList.remove('open');
                sidebar.style.left = '-100vw';
            }
        }
    });

    // Acessibilidade: fechar menu mobile com ESC
    document.addEventListener('keydown', function (e) {
        if (isMobile && sidebar.classList.contains('open') && e.key === 'Escape') {
            sidebar.classList.remove('open');
            sidebar.style.left = '-100vw';
        }
    });

    // Acessibilidade: foco visível nos links
    const links = sidebar.querySelectorAll('a, button');
    links.forEach(link => {
        link.addEventListener('focus', () => link.classList.add('focus-visible'));
        link.addEventListener('blur', () => link.classList.remove('focus-visible'));
    });
});

// Acessibilidade: aumentar/diminuir fonte e contraste
window.aumentarFonte = function () {
    document.body.style.fontSize = (parseFloat(getComputedStyle(document.body).fontSize) + 2) + 'px';
};
window.diminuirFonte = function () {
    let atual = parseFloat(getComputedStyle(document.body).fontSize);
    if (atual > 12) document.body.style.fontSize = (atual - 2) + 'px';
};
window.toggleContraste = function () {
    document.body.classList.toggle('alto-contraste');
    const btn = document.getElementById('contraste-btn');
    if (btn) {
        btn.setAttribute('aria-pressed', document.body.classList.contains('alto-contraste'));
    }
};
window.resetarAcessibilidade = function () {
    document.body.style.fontSize = '';
    document.body.classList.remove('alto-contraste');
    const btn = document.getElementById('contraste-btn');
    if (btn) btn.setAttribute('aria-pressed', 'false');
};
