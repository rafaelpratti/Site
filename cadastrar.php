
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="css/cadastrar-login.css">
</head>
<body>
    <header>
        <a href="index.php" class="logo"><img src="img/loguin.png" alt=""></a>
        <nav>       
            <ul class="menu">
                <li><a href="login.php">Login</a></li>
                <li><a href="cadastrar.php">Cadastrar</a></li>
                <li><a href="sobre.php">Sobre</a></li>
                <li><a href="contato.php">Contato</a></li>
                <li><a href="download.php">Download</a></li>
            </ul>
        </nav>
    </header>

    <section class="sec1">
        <img src="img/cadastro_img.png">
        <div>
            <h1>Faça seu Cadastro:</h1>
            <form id="formcadastro">
                <fieldset>
                    <label for="nome">Nome Completo: </label>
                    <input type="text" id="nome" class="text"name="fname"><br>
                    <label for="usuario">Usuário: </label>
                    <input type="text" id="usuario" class="text" name="user"><br>
                    <label for="email">Email: </label>
                    <input type="email" id="email" class="text" name="email"><br>
                    <label for="senha">Senha: </label>
                    <input type="password" id="senha" class="text" name="senha"><br>
                    <label for="confirmasenha">Confirmar Senha: </label>
                    <input type="password" id="confirmasenha" class="confsenha" name="confirmar"><br><br>
                    <button type="submit" class="cadastrar">Cadastrar</button>
                </fieldset>
            </form>
        </div>
    </section>

    <script src="js/cadastrar.js"></script>

    <footer class="footer">
        ©2024 todos os direitos reservados!
    </footer>
</body>
</html>