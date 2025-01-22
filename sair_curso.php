<?php
session_start();
include 'db.php'; // Arquivo com a conexão ao banco de dados

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

// ID do usuário logado
$user_id = $_SESSION['usuario_id'];

// Verificar se o ID do curso foi enviado
if (isset($_POST['curso_id'])) {
    $curso_id = intval($_POST['curso_id']);

    // Deletar o curso da tabela Realizacaodecurso
    $query = "
        DELETE FROM Realizacaodecurso 
        WHERE fk_Curso_id = $curso_id AND fk_Aluno_id = $user_id
    ";
    if ($conn->query($query) === TRUE) {
        echo "Curso removido com sucesso!";
    } else {
        echo "Erro ao remover o curso: " . $conn->error;
    }
}

// Redirecionar para a página de cursos
header('Location: cursos.php');
exit();
?>
