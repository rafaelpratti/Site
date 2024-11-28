<?php 
session_start();
include 'cabecalho_footer.php'; 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    // Caso não esteja logado, redireciona para a página de login
    header("Location: login.php");
    exit;
}

// Captura o nome do usuário logado (supondo que o nome foi armazenado na sessão durante o login)
$nomeUsuario = isset($_SESSION['usuario_nome']) ? $_SESSION['usuario_nome'] : 'Usuário';
?>

<?php
// Verifica se há alguma mensagem de sucesso (ex: após o cadastro)
if (isset($_SESSION['mensagem_sucesso'])) {
    $mensagem_sucesso = $_SESSION['mensagem_sucesso'];
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

<section class="sec1">
    <div>
        <h1>Olá, <?= $nomeUsuario ?>!</h1>
        <p>Bem-vindo ao seu painel!</p>
        <p>Aqui você pode acessar suas informações e gerenciar sua conta.</p>
    </div>
</section>

<!-- Botões de navegação -->
<section>
    <div class="dashboard-buttons-container">
        <form action="cursos.php" method="get">
            <button type="submit" class="dashboard-button">Meus Cursos</button>
        </form>
        
        <form action="editar_perfil.php" method="get">
            <button type="submit" class="dashboard-button">Editar Perfil</button>
        </form>
        
        <form action="logout.php" method="post">
            <button type="submit" class="dashboard-button">Encerrar Sessão</button>
        </form>
    </div>
</section>


<!-- Configurações de Acessibilidade -->
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


</body>
</html>
