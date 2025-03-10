<?php include 'cabecalho_footer.php'; ?>

<?php
session_start();
include 'db.php'; // Arquivo com a conexão ao banco de dados

// Verificar se o usuário está logado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php'); // Redireciona para a página de login, caso não esteja logado
    exit();
}

// Verificar se o ID do curso foi enviado
if (!isset($_POST['curso_id'])) {
    header('Location: escolher_curso.php'); // Redireciona de volta caso não haja curso selecionado
    exit();
}

// ID do curso e do usuário logado
$curso_id = intval($_POST['curso_id']);
$user_id = $_SESSION['usuario_id'];

// Verificar se o usuário já está inscrito no curso
$query_check = "
    SELECT * FROM Realizacaodecurso
    WHERE fk_Curso_id = ? AND fk_Aluno_id = ?
";
$stmt_check = $conn->prepare($query_check);
$stmt_check->bind_param('ii', $curso_id, $user_id);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

echo "<div class='container'>";

if ($result_check->num_rows > 0) {
    // Mensagem de alerta estilizada
    echo "<div class='alert alert-warning'>";
    echo "<h3>Atenção!</h3>";
    echo "<p>Você já está inscrito neste curso.</p>";
    echo "</div>";
} else {
    // Inserir o curso escolhido na tabela Realizacaodecurso
    $query_insert = "
        INSERT INTO Realizacaodecurso (fk_Curso_id, fk_Aluno_id, progresso)
        VALUES (?, ?, 0.0)
    ";

    $stmt_insert = $conn->prepare($query_insert);
    $stmt_insert->bind_param('ii', $curso_id, $user_id);

    if ($stmt_insert->execute()) {
        // Mensagem de sucesso estilizada
        echo "<div class='alert alert-success'>";
        echo "<h3>Sucesso!</h3>";
        echo "<p>Você se inscreveu no curso com sucesso.</p>";
        echo "</div>";
    } else {
        // Mensagem de erro estilizada
        echo "<div class='alert alert-danger'>";
        echo "<h3>Erro!</h3>";
        echo "<p>Ocorreu um erro ao tentar inscrever-se no curso. Tente novamente.</p>";
        echo "</div>";
    }

    $stmt_insert->close();
}

echo "<a href='cursos.php' class='button'>Voltar para meus cursos</a>";
echo "</div>";

$stmt_check->close();
$conn->close();
?>
