

////////////////////barra de acessibilidade///////////////////////////////



// Definindo valores padrões
let fontSize = 12;
const body = document.body;

// Funções para mudar o tamanho da fonte
function increaseFont() {
    fontSize += 2;
    body.style.fontSize = fontSize + 'px';
    saveSettings();
}

function decreaseFont() {
    fontSize -= 2;
    body.style.fontSize = fontSize + 'px';
    saveSettings();
}

function resetFontAndContrast() {
    fontSize = 22;
    body.style.fontSize = '22px';
    body.className = ''; // Remove todas as classes de contraste
    saveSettings(); // Salva o estado padrão no localStorage
}

// Funções para mudar o contraste
function setContrast(className) {
    body.className = className;
    saveSettings();
}

// Função para salvar as configurações no localStorage
function saveSettings() {
    localStorage.setItem('fontSize', fontSize);
    localStorage.setItem('contrast', body.className);
}

// Função para carregar as configurações ao carregar a página
function loadSettings() {
    if (localStorage.getItem('fontSize')) {
        fontSize = parseInt(localStorage.getItem('fontSize'));
        body.style.fontSize = fontSize + 'px';
    }

    if (localStorage.getItem('contrast')) {
        body.className = localStorage.getItem('contrast');
    }
}

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




//////////////////////////////////////////////////////////////////////////





function validarForm(event) {
    // Evita que o formulário seja enviado automaticamente
    event.preventDefault();

    // Pegando os valores dos campos
    var nome = document.getElementById("nome").value;
    var email = document.getElementById("email").value;
    var contato = document.getElementById("contato").value;
    var mensagem = document.getElementById("mensagem").value;

    // Verificando se algum campo está vazio
    if (nome === "" || email === "" || contato === "" || mensagem === "") {
        alert("Por favor, preencha todos os campos.");
    } else {
        // Se todos os campos estiverem preenchidos, o formulário será enviado
        event.target.submit();
    }
}

// Adicionando o evento de submit ao formulário
document.getElementById("formcontato").addEventListener("submit", validarForm);

