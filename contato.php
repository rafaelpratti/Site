<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trilingo -- App para aprender programação</title>
    <link rel="stylesheet" href="css/contato.css">
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
            </ul>
        </nav>
    </header>

    <!--CONTEUDO PRINCIPAL-->
        <section class="sec1">
            <img src="img/contato.png">
            <div>
                <h1>Entre em contato conosco:</h1>
                <form id="formcontato" action="">
                    <fieldset>
                        <label for="nome">Nome: </label>
                        <input type="text" id="nome" class="text"name="fname">
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
</body>
</html>