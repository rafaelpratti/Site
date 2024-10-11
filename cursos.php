<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha de Cursos</title>
    <link rel="stylesheet" href="css/cursos.css">
</head>
<body>

    <header>
        <a href="index.html" class="logo"><img src="img/loguin.png" alt=""></a>
        <nav>       
            <ul class="menu">
                <li><a href="login.php">Login</a></li>
                <li><a href="cadastrar.php">Cadastrar</a></li>
                <li><a href="sobre.php">Sobre</a></li>
                <li><a href="contato.php">Contato</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1>Escolha de Cursos</h1>
        <div class="course-list">
            <h2>Lista de Cursos</h2>
            <ul id="available-courses">
                <li>Curso de Lógica <button class="add-course" onclick="addCourse('Curso de Lógica')">➔</button></li>
                <li>Curso de Python <button class="add-course" onclick="addCourse('Curso de Python')">➔</button></li>
            </ul>
        </div>

        <div class="my-courses">
            <h2>Meus Cursos</h2>
            <ul id="my-courses">
                <!-- Os cursos adicionados aparecerão aqui -->
            </ul>
        </div>
    </div>
    

    <script src="js/cursos.js"></script>
    <footer class="footer">
        ©2024 todos os direitos reservados!
    </footer>
</body>
</html>
