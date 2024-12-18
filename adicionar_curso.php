<?php include 'cabecalho_footer.php'; ?>

<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Sanitiza os dados do formulário para evitar SQL Injection
    $titulo = $conn->real_escape_string($_POST['titulo']);
    $descricao = $conn->real_escape_string($_POST['descricao']);
    $dificuldade = $conn->real_escape_string($_POST['dificuldade']);
    $tempo_conclusao = (int)$_POST['tempo_conclusao'];

    // Cria a consulta SQL para inserir os dados
    $sql = "INSERT INTO Curso (titulo, descricao, dificuldade, tempo_conclusao) 
            VALUES ('$titulo', '$descricao', '$dificuldade', $tempo_conclusao)";

    // Executa a consulta
    if ($conn->query($sql) === TRUE) {
        // Redireciona para a página de administração de cursos após inserir
        header('Location: cursos_admin.php');
        exit;
    } else {
        // Exibe o erro caso a inserção falhe
        echo "Erro ao adicionar curso: " . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Curso</title>
</head>
<body>
    <h1>Adicionar Novo Curso</h1>
    <form action="" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required>
        <br>
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" required></textarea>
        <br>
        <label for="dificuldade">Dificuldade:</label>
        <select name="dificuldade" id="dificuldade">
            <option value="Fácil">Fácil</option>
            <option value="Médio">Médio</option>
            <option value="Difícil">Difícil</option>
        </select>
        <br>
        <label for="tempo_conclusao">Tempo de Conclusão (em horas):</label>
        <input type="number" name="tempo_conclusao" id="tempo_conclusao" required>
        <br>
        <button type="submit">Adicionar Curso</button>
        <a href="cursos_admin.php">Voltar</a>
    </form>
    
</body>
</html>
