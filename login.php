<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trilingo -- App para aprender programação</title>
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
            <div>
                <img class="img" src="img/login_img.png">
                <h1>Faça seu Login:</h1>    
            
                <form id="formlogin">
                    <fieldset>
                        <label for="email">Email/Usuário: </label>
                        <input type="email" id="email" class="text" name="email"><br>

                        <label for="senha">Senha: </label>
                        <input type="password" id="senha" class="password" name="senha"><br><br>

                        <button type="submit" id="bot_entrar" class="login">Entrar</button>
                    </fieldset>
                </form>
            </div>
        </section>

    <script src="js/login.js"></script>
    
    <footer class="footer">
        ©2024 todos os direitos reservados!
    </footer>
</body>
</html>