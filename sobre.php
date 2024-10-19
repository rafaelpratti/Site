<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Quest</title>
    <link rel="stylesheet" href="css/sobre.css">
    <style> @import url('https://fonts.googleapis.com/css2?family=Days+One&display=swap'); </style>
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

    <aside id="accessibility-bar">
        <div class="accessibility-box">
            <h2>Acessibilidade</h2>
            <div class="font-size-control">
                <button id="decrease-font" class="square-button">A-</button>
                <button id="default-font" class="square-button" disabled>A</button>
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
        <div>
            <h4>Conheça o Trilingo: O App para Aprender Programação!</h1>
                <p>Bem-vindo ao Trilingo, sua plataforma confiável para aprender programação de forma eficaz e gratificante. No Trilingo, acreditamos que todos têm o potencial de se tornarem habilidosos programadores, e nosso objetivo é fornecer as ferramentas e recursos necessários para ajudá-lo a alcançar seus objetivos.</p>
        </div>

    </section>

    <section class="sec2">
        <div>
            <h4>Quem Somos</h4>
            <p>Nós, do Trilingo, somos um grupo de alunos de programação entusiasmados em compartilhar nosso conhecimento com outros aspirantes a programadores. Como estudantes que já passaram pelas trilhas tortuosas do aprendizado de programação, entendemos as dificuldades e desafios que os novatos enfrentam.</p>
        </div>

        <div>
            <h4>Nossa Missão</h4>
            <p>Nosso objetivo é tornar a aprendizagem de programação acessível, envolvente e eficaz para todos os interessados. Ao oferecer uma plataforma que compreende as lutas reais dos aprendizes, estamos comprometidos em proporcionar uma experiência de aprendizado mais suave e gratificante.</p>
        </div>

        <div>
            <h4>O Que Oferecemos</h4>
            <p>No Trilingo, desenvolvemos uma variedade de recursos e cursos de programação que refletem nossa compreensão íntima das dificuldades enfrentadas pelos alunos. Nossos cursos são cuidadosamente estruturados e incluem uma mistura de instruções claras, exercícios práticos e desafios desenhados para superar as barreiras comuns no caminho do aprendizado.</p>
        </div>
    </section>

    <section class="sec3">
        <h4>Nossa Equipe</h4>
        <div class="equipe">
            <div><img src="img/Rafael Pratti.png" alt="">Rafael Pratti</div>
            <div><img src="img/Arthur Coutinho.png" alt="">Arthur Coutinho</div>
            <div><img src="img/Kalebe Souza.png" alt="">Kalebe Olegario</div>
            <div><img src="img/Kalebe Pereira.png" alt="">Kalebe Pereira</div>
        </div>

    </section>

    <script src="js/sobre.js"></script>

    <footer class="footer">
        ©2024 todos os direitos reservados!
    </footer>
</body>

</html>