<?php
include 'cabecalho_footer.php';
session_start();
require_once 'db.php';

// Verifica se o usuário é administrador
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit;
}

if (isset($_GET['id'])) {
    $unidade_id = (int)$_GET['id'];

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $tipo = $_POST['tipo'];
        $titulo = $conn->real_escape_string($_POST['titulo']);
        $descricao = $conn->real_escape_string($_POST['descricao']);
        
        // Para o artigo, o campo PDF é opcional
        $url_pdf = isset($_POST['url_pdf']) ? $conn->real_escape_string($_POST['url_pdf']) : null;
        $url_video = isset($_POST['url_video']) ? $conn->real_escape_string($_POST['url_video']) : null;

        // Inserir novo conteúdo no banco de dados
        $sql = "INSERT INTO Conteudo (tipo, titulo, descricao, fk_Unidade_id) VALUES ('$tipo', '$titulo', '$descricao', $unidade_id)";

        if ($conn->query($sql) === TRUE) {
            // Obter o ID do conteúdo inserido
            $conteudo_id = $conn->insert_id;

            // Adicionar o artigo ou vídeo, conforme o tipo
            if ($tipo == 'artigo') {
                $sql_artigo = "INSERT INTO Artigo (fk_Conteudo_id, texto, url_pdf) VALUES ($conteudo_id, '$descricao', '$url_pdf')";
                $conn->query($sql_artigo);
            } else {
                $sql_video = "INSERT INTO Video (fk_Conteudo_id, url) VALUES ($conteudo_id, '$url_video')";
                $conn->query($sql_video);
            }

            header('Location: gerenciar_conteudos.php?id=' . $unidade_id);
            exit;
        } else {
            echo "Erro ao adicionar conteúdo: " . $conn->error;
        }
    }
} else {
    echo "ID da unidade não fornecido.";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Conteúdo</title>
</head>
<body>
    <h1>Adicionar Conteúdo</h1>
    <form action="" method="POST">
        <label for="tipo">Tipo de Conteúdo:</label>
        <select name="tipo" id="tipo" required>
            <option value="artigo">Artigo</option>
            <option value="video">Vídeo</option>
        </select>
        <br>

        <label for="titulo">Título:</label>
        <input type="text" name="titulo" id="titulo" required>
        <br>

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" id="descricao" required></textarea>
        <br>

        <label for="url_pdf">URL do PDF (apenas para Artigos):</label>
        <input type="text" name="url_pdf" id="url_pdf">
        <br>

        <label for="url_video">URL do Vídeo (apenas para Vídeos):</label>
        <input type="text" name="url_video" id="url_video">
        <br>

        <button type="submit">Adicionar Conteúdo</button>
    </form>
</body>
</html>
