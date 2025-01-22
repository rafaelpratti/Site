<?php include 'cabecalho_footer.php'; ?>

<?php
session_start();
include 'db.php'; // Conexão com o banco de dados

// Verifica se o ID do curso foi passado
if (isset($_GET['curso_id'])) {
    $curso_id = (int)$_GET['curso_id'];

    // Busca os dados do curso com base no ID
    $sql = "SELECT * FROM Curso WHERE id = $curso_id";
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
        $ordem = (int)$_POST['ordem'];

        // Insere a nova unidade no banco de dados
        $sql = "INSERT INTO Unidade (titulo, descricao, fk_Curso_id, ordem) 
                VALUES ('$titulo', '$descricao', $curso_id, $ordem)";

        if ($conn->query($sql) === TRUE) {
            header('Location: gerenciar_unidades.php?curso_id=' . $curso_id); // Redireciona para a página de gerenciamento
            exit;
        } else {
            echo "Erro ao adicionar unidade: " . $conn->error;
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
    <title>Adicionar Unidade - <?php echo $curso['titulo']; ?></title>
    <style>
        .form-container {
            max-width: 500px;
            margin: 0 auto;
        }

        .button-container {
            text-align: center;
            margin-top: 30px;
        }

        .button-container a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #1d7a1d;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        .button-container a:hover {
            background-color: #155a15;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Adicionar Nova Unidade ao Curso: <?php echo $curso['titulo']; ?></h1>
        <form action="" method="POST">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" required><br>

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" required></textarea><br>

            <label for="ordem">Ordem:</label>
            <input type="number" name="ordem" id="ordem" required><br>

            <button type="submit">Adicionar Unidade</button>
        </form>

        <div class="button-container">
            <a href="gerenciar_unidades.php?curso_id=<?php echo $curso['id']; ?>">Voltar</a>
        </div>
    </div>
</body>
</html>
