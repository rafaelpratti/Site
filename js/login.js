function validarForm(event) {
    // Evita que o formulário seja enviado automaticamente
    event.preventDefault();

    // Pegando os valores dos campos
    var email = document.getElementById("email").value;
    var senha = document.getElementById("senha").value;

    // Verificando se algum campo está vazio
    if (senha === "" || email === "") {
        alert("Por favor, preencha todos os campos.");
    } else {
        // Se todos os campos estiverem preenchidos, redireciona para a página 'cursos.html'
        window.location.href = 'ger_cursos.php';
    }
}

// Adicionando o evento de submit ao formulário
document.getElementById("formlogin").addEventListener("submit", validarForm);

// Adicionando eventos aos botões
document.getElementById('increase-font').addEventListener('click', increaseFont);
document.getElementById('decrease-font').addEventListener('click', decreaseFont);
document.getElementById('reset').addEventListener('click', resetFontAndContrast);

document.getElementById('contrast-normal').addEventListener('click', () => setContrast(''));
document.getElementById('contrast-yellow').addEventListener('click', () => setContrast('contrast-yellow'));
document.getElementById('contrast-blue').addEventListener('click', () => setContrast('contrast-blue'));
document.getElementById('contrast-black').addEventListener('click', () => setContrast('contrast-black'));

// Carregar configurações ao iniciar
window.onload = loadSettings;