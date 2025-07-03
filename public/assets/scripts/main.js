// Menu responsivo
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menuToggle');
    const mainNav = document.getElementById('mainNav');
    menuToggle.addEventListener('click', function() {
        mainNav.classList.toggle('open');
    });
    // Fecha menu ao clicar fora
    document.addEventListener('click', function(e) {
        if (!mainNav.contains(e.target) && !menuToggle.contains(e.target)) {
            mainNav.classList.remove('open');
        }
    });
});

// Validação de formulário genérica
function validarFormulario(formId) {
    const formulario = document.getElementById(formId);
    if (!formulario) return false;
    let valido = true;
    formulario.querySelectorAll('[required]').forEach(campo => {
        if (!campo.value.trim()) {
            campo.classList.add('erro');
            if (!campo.nextElementSibling || !campo.nextElementSibling.classList.contains('mensagem-erro')) {
                const erro = document.createElement('span');
                erro.className = 'mensagem-erro';
                erro.textContent = 'Campo obrigatório';
                campo.parentNode.insertBefore(erro, campo.nextSibling);
            }
            valido = false;
        } else {
            campo.classList.remove('erro');
            if (campo.nextElementSibling && campo.nextElementSibling.classList.contains('mensagem-erro')) {
                campo.nextElementSibling.remove();
            }
        }
    });
    return valido;
}

// Feedback visual
function showMessage(msg, type = 'erro', target = '#formulario') {
    const form = document.querySelector(target);
    if (!form) return;
    let msgDiv = form.querySelector('.mensagem-feedback');
    if (!msgDiv) {
        msgDiv = document.createElement('div');
        msgDiv.className = 'mensagem-feedback';
        form.prepend(msgDiv);
    }
    msgDiv.textContent = msg;
    msgDiv.className = 'mensagem-feedback ' + (type === 'sucesso' ? 'sucesso' : 'mensagem-erro');
    setTimeout(() => { msgDiv.textContent = ''; }, 4000);
}

// Menu lateral responsivo e acessível
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');
    const mainContent = document.querySelector('.main-content');
    // Toggle sidebar
    if (toggleBtn) {
        toggleBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            sidebar.classList.toggle('open');
            document.body.classList.toggle('sidebar-open');
            if (sidebar.classList.contains('open')) {
                sidebar.querySelector('a,button').focus();
            }
        });
    }
    // Fecha menu ao clicar fora
    document.addEventListener('click', function(e) {
        if (window.innerWidth <= 700 && sidebar.classList.contains('open')) {
            if (!sidebar.contains(e.target) && !toggleBtn.contains(e.target)) {
                sidebar.classList.remove('open');
                document.body.classList.remove('sidebar-open');
            }
        }
    });
    // Navegação por teclado (Tab e Shift+Tab)
    sidebar.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && sidebar.classList.contains('open')) {
            sidebar.classList.remove('open');
            document.body.classList.remove('sidebar-open');
            toggleBtn.focus();
        }
    });
    // Atalho: Alt+M para abrir menu
    document.addEventListener('keydown', function(e) {
        if (e.altKey && e.key.toLowerCase() === 'm') {
            sidebar.classList.toggle('open');
            document.body.classList.toggle('sidebar-open');
            if (sidebar.classList.contains('open')) {
                sidebar.querySelector('a,button').focus();
            }
        }
    });
});
