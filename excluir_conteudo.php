<?php
include 'cabecalho_footer.php';
session_start();
require_once 'db.php'; // Conexão com o banco de dados

// Verifica se o usuário é administrador
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit;
}

// Verifica se o ID do conteúdo foi passado
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Busca os dados do conteúdo com base no ID
    $sql = "SELECT * FROM Conteudo WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $conteudo = $result->fetch_assoc();
    } else {
        echo "Conteúdo não encontrado.";
        exit;
    }

    // Verifica se a exclusão foi confirmada
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Exclui o conteúdo do banco de dados
        $sql = "DELETE FROM Conteudo WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            header('Location: gerenciar_conteudos.php?id=' . $conteudo['fk_Unidade_id']); // Redireciona para a página de gerenciamento de conteúdos
            exit;
        } else {
            echo "Erro ao excluir conteúdo: " . $conn->error;
        }
    }
} else {
    echo "ID do conteúdo não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Conteúdo</title>
    <link rel="stylesheet" href="style.css"> <!-- Se você usar um arquivo CSS externo -->
    <style>
        /* O mesmo estilo usado nas outras páginas */
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Excluir Conteúdo: <?php echo htmlspecialchars($conteudo['titulo']); ?></h1>
        <p>Você tem certeza de que deseja excluir este conteúdo?</p>
        <form action="" method="POST">
            <button type="submit">Sim, Excluir</button>
            <div class="button-container">
                <a href="gerenciar_conteudos.php?id=<?php echo $conteudo['fk_Unidade_id']; ?>">Voltar</a>
            </div>
        </form>
    </div>
</body>
</html>
