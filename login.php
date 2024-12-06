<?php include 'cabecalho_footer.php'; ?>
<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$erro = ""; // Variável para armazenar mensagens de erro

if (isset($_SESSION['usuario_id'])) {
    header("Location: dashboard.php"); // Redireciona para o dashboard
    exit; // Garantir que o código abaixo não será executado
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'db.php';

    // Validação e sanitização dos dados recebidos
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Validar o email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = "O email informado não é válido. Verifique e tente novamente.";
    } else {
        // Consulta ao banco de dados
        $stmt = $conn->prepare("SELECT id, nome, senha, role FROM aluno WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Usuário encontrado
            $usuario = $result->fetch_assoc();

            // Verifica a senha
            if (password_verify($senha, $usuario['senha'])) {
                // Armazena dados do usuário na sessão
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                $_SESSION['role'] = $usuario['role'];

                // Redirecionar com base no papel
                if ($_SESSION['role'] === 'admin') {
                    header("Location: cursos_admin.php");
                } elseif ($_SESSION['role'] === 'aluno') {
                    header("Location: dashboard.php");
                } else {
                    $erro = "Papel de usuário desconhecido. Entre em contato com o suporte.";
                }
                exit;
            } else {
                $erro = "Senha incorreta! Por favor, tente novamente.";
            }
        } else {
            $erro = "Usuário não encontrado! Verifique o email informado.";
        }
    }
}
?>


<section class="sec1">
    <div>
        <img class="img" src="img/login_img.png">
        <h1>Faça seu Login:</h1>

        <!-- Formulário de Login -->
        <form id="formlogin" method="POST">
            <fieldset>
                <?php if (!empty($erro)) { ?>
                    <p style="color: red; font-size: 11px"><?= htmlspecialchars($erro) ?></p>
                <?php } ?>
                <label for="email">Email: </label>
                <input type="email" id="email" class="text" name="email" required value="<?= isset($email) ? htmlspecialchars($email) : '' ?>"><br>

                <label for="senha">Senha: </label>
                <input type="password" id="senha" class="password" name="senha" required><br><br>

                <button type="submit" id="bot_entrar" class="login">Entrar</button>
            </fieldset>
        </form>
    </div>
</section>
