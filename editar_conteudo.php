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

    // Verifica se o formulário foi enviado para atualização
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitiza os dados do formulário
        $titulo = $conn->real_escape_string($_POST['titulo']);
        $descricao = $conn->real_escape_string($_POST['descricao']);
        $tipo = $conn->real_escape_string($_POST['tipo']);
        $url_pdf = isset($_POST['url_pdf']) ? $conn->real_escape_string($_POST['url_pdf']) : null;
        $url_video = isset($_POST['url_video']) ? $conn->real_escape_string($_POST['url_video']) : null;

        // Atualiza os dados no banco de dados
        $sql = "UPDATE Conteudo 
                SET titulo = '$titulo', descricao = '$descricao', tipo = '$tipo', url_pdf = '$url_pdf', url_video = '$url_video'
                WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            header('Location: gerenciar_conteudos.php?id=' . $conteudo['fk_Unidade_id']); // Redireciona para a página de gerenciamento de conteúdos
            exit;
        } else {
            echo "Erro ao atualizar conteúdo: " . $conn->error;
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
    <title>Editar Conteúdo</title>
    <link rel="stylesheet" href="style.css"> <!-- Se você usar um arquivo CSS externo -->
    <style>
        /* O mesmo estilo usado nas outras páginas, já definido anteriormente */
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Editar Conteúdo: <?php echo htmlspecialchars($conteudo['titulo']); ?></h1>
        <form action="" method="POST">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($conteudo['titulo']); ?>" required>
            <br>

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" required><?php echo htmlspecialchars($conteudo['descricao']); ?></textarea>
            <br>

            <label for="tipo">Tipo de Conteúdo:</label>
            <select name="tipo" id="tipo" required>
                <option value="artigo" <?php echo $conteudo['tipo'] == 'artigo' ? 'selected' : ''; ?>>Artigo</option>
                <option value="video" <?php echo $conteudo['tipo'] == 'video' ? 'selected' : ''; ?>>Vídeo</option>
            </select>
            <br>

            <label for="url_pdf">URL do PDF (se for Artigo):</label>
            <input type="text" name="url_pdf" id="url_pdf" value="<?php echo htmlspecialchars($conteudo['url_pdf']); ?>">
            <br>

            <label for="url_video">URL do Vídeo (se for Vídeo):</label>
            <input type="text" name="url_video" id="url_video" value="<?php echo htmlspecialchars($conteudo['url_video']); ?>">
            <br>

            <button type="submit">Atualizar Conteúdo</button>
            <div class="button-container">
                <a href="gerenciar_conteudos.php?id=<?php echo $conteudo['fk_Unidade_id']; ?>">Voltar</a>
                <!-- Botão de excluir -->
                <a href="excluir_conteudo.php?id=<?php echo $conteudo['id']; ?>" class="btn-delete" onclick="return confirm('Tem certeza que deseja excluir este conteúdo?')">Excluir Conteúdo</a>
            </div>
        </form>
    </div>
</body>
</html>
