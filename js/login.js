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
        // Se todos os campos estiverem preenchidos, o formulário será enviado
        event.target.submit();
    }
}

// Adicionando o evento de submit ao formulário
document.getElementById("formlogin").addEventListener("submit", validarForm);

document.getElementById('bot_entrar').addEventListener('submit', function() {
    window.location.href = 'cursos.html'; // Direciona para a página 'cursos.html'
})