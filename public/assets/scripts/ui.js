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
function highlightInput(input, error = true) {
    if (error) input.classList.add('erro');
    else input.classList.remove('erro');
    if (error) input.setAttribute('aria-invalid', 'true');
    else input.removeAttribute('aria-invalid');
}
function clearForm(formSelector) {
    const form = document.querySelector(formSelector);
    if (form) form.reset();
}
