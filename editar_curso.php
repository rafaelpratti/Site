<?php include 'cabecalho_footer.php'; ?>

<?php
session_start();
include 'db.php'; // Conexão com o banco de dados

// Verifica se o ID do curso foi passado
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Busca os dados do curso com base no ID
    $sql = "SELECT * FROM Curso WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $curso = $result->fetch_assoc();
    } else {
        echo "Curso não encontrado.";
        exit;
    }

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitiza os dados do formulário
        $titulo = $conn->real_escape_string($_POST['titulo']);
        $descricao = $conn->real_escape_string($_POST['descricao']);
        $dificuldade = $conn->real_escape_string($_POST['dificuldade']);
        $tempo_conclusao = (int)$_POST['tempo_conclusao'];

        // Atualiza os dados no banco de dados
        $sql = "UPDATE Curso 
                SET titulo = '$titulo', descricao = '$descricao', dificuldade = '$dificuldade', tempo_conclusao = $tempo_conclusao
                WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            header('Location: cursos_admin.php'); // Redireciona para a página de administração
            exit;
        } else {
            echo "Erro ao atualizar curso: " . $conn->error;
        }
    }
} else {
    echo "ID do curso não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso</title>
</head>
<body>
    <h1>Editar Curso: <?php echo $curso['titulo']; ?></h1>
    <form action="" method="POST">
        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo $curso['titulo']; ?>" required>
        <br>
        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" required><?php echo $curso['descricao']; ?></textarea>
        <br>
        <label for="dificuldade">Dificuldade:</label>
        <select name="dificuldade" id="dificuldade">
            <option value="Fácil" <?php echo ($curso['dificuldade'] == 'Fácil') ? 'selected' : ''; ?>>Fácil</option>
            <option value="Médio" <?php echo ($curso['dificuldade'] == 'Médio') ? 'selected' : ''; ?>>Médio</option>
            <option value="Difícil" <?php echo ($curso['dificuldade'] == 'Difícil') ? 'selected' : ''; ?>>Difícil</option>
        </select>
        <br>
        <label for="tempo_conclusao">Tempo de Conclusão (em horas):</label>
        <input type="number" name="tempo_conclusao" id="tempo_conclusao" value="<?php echo $curso['tempo_conclusao']; ?>" required>
        <br>
        <button type="submit">Atualizar Curso</button>
        <a href="cursos_admin.php">Voltar</a>
    </form>
    
</body>
</html>
