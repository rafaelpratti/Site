<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Quest</title>
    <link rel="stylesheet" href="css/index.css">
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
        <img src="img/what’s-the-best-programming-language-to-learn-first.png" alt="">
        <p>Aprenda programação de forma interativa <br>
            Baixe nosso aplicativo e comece sua jornada de aprendizado!</p>
    </section>

    <section class="sec2">
        <p>Como o <strong>Code Quest</strong> funciona?</p>
    </section>

    <section class="sec3">
        <div class="img">
            <div class="a"><img class="i" src="img/personalized_learning_icon.png" alt="">
                <h4>Aprendizagem personalizada</h4>
                <p>Os alunos praticam no próprio ritmo, solucionando primeiramente suas dificuldades de compreensão e, depois, acelerando o aprendizado.</p>
            </div>
        </div>
        <div class="img">
            <div class="a"><img class="i" src="img/empower_teachers_icon.png" alt="">
                <h4>Feedback instantâneo</h4>
                <p>Os alunos recebem automaticamente a correção dos exercícios, descobrindo os seus erros e acertos.</p>
            </div>
        </div>

    </section>
    <script src="js/index.js"></script>
    <footer class="footer">
        ©2024 todos os direitos reservados!
    </footer>
</body>

</html>