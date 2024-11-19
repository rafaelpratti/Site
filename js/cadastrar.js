function validarFormSenha(event) {
    // Evita que o formulário seja enviado automaticamente
    event.preventDefault();

    // Pegando os valores dos campos
    var nome = document.getElementById("nome").value;
    var usuario = document.getElementById("usuario").value;
    var email = document.getElementById("email").value;
    var senha = document.getElementById("senha").value;
    var confirmarSenha = document.getElementById("confirmasenha").value;

    // Verificando se algum campo está vazio
    if (senha === "" || email === "" || nome === "" || usuario === "" || confirmarSenha === "") {
        alert("Por favor, preencha todos os campos.");
        return false; // Impede o envio do formulário se houver campos vazios
    }

    // Verificando se as senhas coincidem apenas se ambas as senhas foram digitadas
    if (senha !== "" && confirmarSenha !== "" && senha !== confirmarSenha) {
        alert("As senhas não coincidem.");
        return false; // Impede o envio do formulário se as senhas não coincidirem
    }

    // Se todos os campos estiverem preenchidos e as senhas coincidirem ou ambas estiverem vazias, o formulário será enviado
    window.location.href = 'cursos.php';
}

// Adicionando o evento de submit ao formulário
document.getElementById("formcadastro").addEventListener("submit", validarFormSenha);

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

//---------------------------------------------------------------------------------------------------------------------//

var coll = document.getElementById('collapsible');
var accessibilitybox = document.getElementById('acbox');
coll.addEventListener("click", function(){
    console.log("a")
    if (accessibilitybox.style.display === "flex") {
        accessibilitybox.style.display = "none";
      } else {
        accessibilitybox.style.display = "flex";
      }
    })
