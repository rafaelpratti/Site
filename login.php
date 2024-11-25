<?php include 'cabecalho_footer.php'; ?>
<?php
session_start(); // Inicia a sessão

// Verifica se existe uma mensagem de sucesso na sessão
if (isset($_SESSION['mensagem_sucesso'])) {
    // Armazena a mensagem na variável JavaScript
    $mensagem_sucesso = $_SESSION['mensagem_sucesso'];
    // Remove a mensagem de sucesso após exibi-la
    unset($_SESSION['mensagem_sucesso']);
} else {
    $mensagem_sucesso = "";
}
?>

<!-- Toast Message (não visível por padrão) -->
<div id="toast" class="toast"><?= $mensagem_sucesso ?></div>

<!-- Adicionando JavaScript para mostrar a mensagem -->
<script>
    <?php if (!empty($mensagem_sucesso)) { ?>
        // Exibe a mensagem toast
        var toast = document.getElementById('toast');
        toast.style.visibility = 'visible';  // Torna a mensagem visível

        // Faz a mensagem desaparecer após 5 segundos (com efeito de fade-out)
        setTimeout(function() {
            toast.style.opacity = '0'; // Começa o fade-out
        }, 5000); // 5000 milissegundos = 5 segundos para o fade-out

        // Após o fade-out terminar, esconde o elemento completamente
        setTimeout(function() {
            toast.style.visibility = 'hidden'; // Torna invisível após a animação
        }, 5500); // Isso ocorre depois de 5.5 segundos, para completar a animação de fade-out
    <?php } ?>
</script>

<!-- Adicionando JavaScript para mostrar a mensagem no console -->
<script>
    <?php if (!empty($mensagem_sucesso)) { ?>
        console.log("<?= $mensagem_sucesso ?>"); // Exibe a mensagem no console
    <?php } ?>
</script>

    <section class="sec1">
        <div>
            <img class="img" src="img/login_img.png">
            <h1>Faça seu Login:</h1>

            <form id="formlogin">
                <fieldset>
                    <label for="email">Email: </label>
                    <input type="email" id="email" class="text" name="email"><br>

                    <label for="senha">Senha: </label>
                    <input type="password" id="senha" class="password" name="senha"><br><br>

                    <button type="submit" id="bot_entrar" class="login">Entrar</button>
                </fieldset>
            </form>
        </div>
    </section>

    <section>
            <div id="acbox" class="accessibility-box">
        
                <div class="font-size-control">
                    <button id="decrease-font" class="square-button">A-</button>
                    <button id="increase-font" class="square-button">A+</button>
                </div>
                <div class="contrast-control">
                    <button id="contrast-normal" class="square-button">A</button>
                    <button id="contrast-yellow" class="square-button" style="background-color: yellow;">A</button>
                    <button id="contrast-blue" class="square-button" style="background-color: blue; color: white;">A</button>
                    <button id="contrast-black" class="square-button" style="background-color: black; color: yellow;">A</button>
                </div>
                <button id="reset" class="reset-button">Redefinir</button>
            </div>
        <button type="button" class="collapsible" id="collapsible">Acessibilidade</button>
    </section>

    <script src="js/login.js"></script>
    
</body>

</html>