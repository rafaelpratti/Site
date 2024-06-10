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