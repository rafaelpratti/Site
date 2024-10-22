<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Quest</title>
    <link rel="stylesheet" href="css/contato.css">
    <style> @import url('https://fonts.googleapis.com/css2?family=Days+One&display=swap'); </style>
</head>

<body>
    <!--CABEÇALHO-->
    <header>

        <a href="index.php" class="logo"><img src="img/loguin.png" alt=""></a>
        <nav>
            <ul class="menu">
                <li><a href="login.php">Entrar</a></li>
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


    <!--CONTEUDO PRINCIPAL-->
    <section class="sec1">
        <img src="img/contato.png">
        <div>
            <h1>Entre em contato conosco:</h1>
            <form id="formcontato" action="">
                <fieldset>
                    <label for="nome">Nome: </label>
                    <input type="text" id="nome" class="text" name="fname">
                    <label for="email">Email: </label>
                    <input type="email" id="email" class="text" name="email">
                    <label for="contato">Contato: </label>
                    <input type="text" id="contato" class="text" name="contato">
                    <label for="mensagem">Mensagem: </label>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                    <button type="submit" class="Enviar">Enviar</button>
                </fieldset>
            </form>
        </div>
    </section>

    <!--RODAPE-->
    <footer class="footer">
        ©2024 todos os direitos reservados!
    </footer>
    <script src="js/contato.js"></script>
</body>

</html>