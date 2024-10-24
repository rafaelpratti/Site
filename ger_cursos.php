<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Cursos - Code Quest</title>
    <link rel="stylesheet" href="css/ger_cursos.css">
    <link rel="stylesheet" href="css/comum.css">
    <link rel="stylesheet" href="css/acessibilidade.css">
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

    <div class="container">
        <h1>Gerenciamento de Cursos - Trilingo</h1>

        <form id="courseForm">
            <h2 id="formTitle">Adicionar Curso</h2>
            <input type="hidden" id="courseId">
            <div class="form-group">
                <label for="courseName">Nome do Curso</label>
                <input type="text" id="courseName" required>
            </div>
            <div class="form-group">
                <label for="courseDescription">Descrição do Curso</label>
                <textarea id="courseDescription" required></textarea>
            </div>
            <button type="submit" id="submitBtn">Adicionar Curso</button>
        </form>

        <h2>Cursos Existentes</h2>
        <ul id="courseList"></ul>
    </div>

    <script src="js/cadcursos.js"></script>
    <footer class="footer">
        ©2024 todos os direitos reservados!
    </footer>
</body>

</html>