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