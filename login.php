<?php include 'cabecalho_footer.php'; ?>
<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_SESSION['usuario_id'])) {
    header("Location: dashboard.php"); // Redireciona para o dashboard
    exit; // Garantir que o código abaixo não será executado
}

// Código de login (verificação de email e senha)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'db.php';

    // Recebe os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta para verificar o usuário no banco
    $stmt = $conn->prepare("SELECT id, nome, senha, role FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuário encontrado
        $usuario = $result->fetch_assoc();

        // Verifica a senha
        if (password_verify($senha, $usuario['senha'])) {
            // Armazena dados do usuário na sessão
            $_SESSION['usuario_id'] = $usuario['id']; // Armazena o ID
            $_SESSION['usuario_nome'] = $usuario['nome']; // Armazena o nome do usuário
            $_SESSION['role'] = $usuario['role']; // Armazena o papel do usuário (ex: 'admin', 'aluno')

            // Redireciona para o painel
            header("Location: dashboard.php");
            exit;
        } else {
            $erro = "Senha incorreta!";
        }
    } else {
        $erro = "Usuário não encontrado!";
    }
}
?>


<!-- Toast Message (não visível por padrão) -->
<div id="toast" class="toast"><?= $mensagem_sucesso ?></div>

<!-- Adicionando JavaScript para mostrar a mensagem -->
<script>
    <?php if (!empty($mensagem_sucesso)) { ?>
        var toast = document.getElementById('toast');
        toast.style.visibility = 'visible';  // Torna a mensagem visível
        setTimeout(function() {
            toast.style.opacity = '0'; // Inicia o fade-out
        }, 5000); // 5 segundos para o fade-out
        setTimeout(function() {
            toast.style.visibility = 'hidden'; // Torna invisível após o fade-out
        }, 5500); // 5.5 segundos após a animação de fade-out
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

        <!-- Formulário de Login -->
        <form id="formlogin" method="POST">
            <fieldset>
                <label for="email">Email: </label>
                <input type="email" id="email" class="text" name="email" required><br>

                <label for="senha">Senha: </label>
                <input type="password" id="senha" class="password" name="senha" required><br><br>

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
