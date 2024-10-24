<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Quest</title>
    <link rel="stylesheet" href="css/cadastrar-login.css">
    <link rel="stylesheet" href="css/comum.css">
    <link rel="stylesheet" href="css/painel_acessibilidade.css">
    <style> @import url('https://fonts.googleapis.com/css2?family=Days+One&display=swap'); </style>
</head>

<body>
    <header>
        <nav>
            <ul class="menu">
                <li><a href="index.php" class="logo"><img src="img/loguin.png" alt=""></a></li>
        
            </ul>
        </nav>

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

    <aside id="accessibility-bar">
        <div class="accessibility-box">
            <h2>Acessibilidade</h2>
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
    </aside>

    <section class="sec1">
        <img src="img/cadastro_img.png">
        <div>
            <h1>Faça seu Cadastro:</h1>
            <form id="formcadastro">
                <fieldset>
                    <label for="nome">Nome Completo: </label>
                    <input type="text" id="nome" class="text" name="fname"><br>
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