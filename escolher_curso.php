<?php include 'cabecalho_footer.php'; ?>

<?php
session_start();
include 'db.php'; // Arquivo com a conexão ao banco de dados

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php'); // Redireciona para a página de login, caso não esteja logado
    exit();
}

// ID do usuário logado
$user_id = $_SESSION['usuario_id'];

// Consulta para listar todos os cursos disponíveis
$query = "SELECT id, titulo, descricao, dificuldade, tempo_conclusao FROM Curso";
$result = $conn->query($query);

echo "<h1>Escolher um Curso</h1>";

if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "
            <li>
                <h2>{$row['titulo']}</h2>
                <p>{$row['descricao']}</p>
                <p>Dificuldade: {$row['dificuldade']}</p>
                <p>Tempo estimado: {$row['tempo_conclusao']} horas</p>
                <form action='inscrever_curso.php' method='POST'>
                    <input type='hidden' name='curso_id' value='" . $row['id'] . "'>
                    <button type='submit'>Inscrever-se</button>
                </form>
            </li>
        ";
    }
    echo "</ul>";
} else {
    echo "<p>Nenhum curso disponível no momento.</p>";
}

// Fechar conexão
$conn->close();
?>
