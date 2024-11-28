<?php
session_start();

include 'cabecalho_footer.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$erros = []; // Array para armazenar mensagens de erro
$nome = $email = $senha = $confirmasenha = ""; // Inicializa variáveis para manter os valores preenchidos

if (isset($_SESSION['usuario_id'])) {
    header("Location: dashboard.php"); // Redireciona para o dashboard
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'db.php';

    // Recebe os dados do formulário e remove espaços extras
    $nome = htmlspecialchars(trim($_POST['nome']), ENT_QUOTES, 'UTF-8'); // Sanitiza o nome
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL); // Sanitiza o e-mail
    $senha = trim($_POST['senha']);
    $confirmasenha = trim($_POST['confirmar']);

    // Validações
    if (!$nome || strlen($nome) < 3) {
        $erros[] = "O nome deve ter pelo menos 3 caracteres.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "Insira um email válido.";
    }

    if ($senha !== $confirmasenha) {
        $erros[] = "As senhas não coincidem!";
    }

    if (strlen($senha) < 6) {
        $erros[] = "A senha deve ter pelo menos 6 caracteres.";
    }

    // Se não houver erros, processa o cadastro
    if (empty($erros)) {
        // Criptografa a senha
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Verifica se o email já existe no banco
        $emailCheckSql = "SELECT id FROM usuario WHERE email = ?";
        $stmt = $conn->prepare($emailCheckSql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $erros[] = "O email já está em uso. Por favor, utilize outro.";
        } else {
            // Insere o usuário no banco de dados
            $insertSql = "INSERT INTO usuario (nome, email, senha, role) VALUES (?, ?, ?, 'aluno')";
            $stmtInsert = $conn->prepare($insertSql);
            $stmtInsert->bind_param("sss", $nome, $email, $senhaHash);

            if ($stmtInsert->execute()) {
                // Cadastro bem-sucedido
                $_SESSION['usuario_id'] = $conn->insert_id;
                $_SESSION['usuario_nome'] = $nome;
                $_SESSION['mensagem_sucesso'] = "Cadastro realizado com sucesso!";
                header("Location: dashboard.php");
                exit;
            } else {
                $erros[] = "Erro ao cadastrar: " . $conn->error;
            }

            $stmtInsert->close();
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<section class="sec1">
    <img src="img/cadastro_img.png">
    <div>
        <h1>Faça seu Cadastro:</h1>
        <!-- Exibe erros, se houver -->
        <?php if (!empty($erros)): ?>
            <div id="erro" style="color: red; font-weight: bold;">
                <?php foreach ($erros as $erro): ?>
                    <p><?= $erro ?></p>
                <?php endforeach; ?>
            </div>
            <script>
                alert("Existem erros no formulário! Verifique os campos destacados.");
            </script>
        <?php endif; ?>

        <form id="formcadastro" method="POST" action="">
            <fieldset>
                <label for="nome">Nome Completo: </label>
                <input type="text" id="nome" class="text" name="nome" value="<?= htmlspecialchars($nome) ?>" required><br>
                <label for="email">Email: </label>
                <input type="email" id="email" class="text" name="email" value="<?= htmlspecialchars($email) ?>" required><br>
                <label for="senha">Senha: </label>
                <input type="password" id="senha" class="text" name="senha" required><br>
                <label for="confirmasenha">Confirmar Senha: </label>
                <input type="password" id="confirmasenha" class="confsenha" name="confirmar" required><br><br>
                <button type="submit" class="cadastrar">Cadastrar</button>
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

<script src="js/cadastrar.js"></script>

</body>
</html>
