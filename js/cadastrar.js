function validarForm(event) {
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

    if (senha !== confirmarSenha) {
        alert("As senhas não coincidem.");
        return false; // Impede o envio do formulário se as senhas não coincidirem
    }

    // Se todos os campos estiverem preenchidos e as senhas coincidirem, o formulário será enviado
    event.target.submit();
}

// Adicionando o evento de submit ao formulário
document.getElementById("formcadastro").addEventListener("submit", validarForm);