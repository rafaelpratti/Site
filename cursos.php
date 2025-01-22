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

// Consulta para listar os cursos aos quais o usuário está inscrito
$query = "
    SELECT Curso.id, Curso.titulo, Curso.descricao, Curso.dificuldade, Curso.tempo_conclusao 
    FROM Curso
    JOIN Realizacaodecurso ON Realizacaodecurso.fk_Curso_id = Curso.id
    WHERE Realizacaodecurso.fk_Aluno_id = $user_id
";
$result = $conn->query($query);

echo "<h1>Meus Cursos</h1>";

if ($result->num_rows > 0) {
    // Exibir cursos aos quais o usuário está inscrito
    echo "<div class='courses'>";
    while ($row = $result->fetch_assoc()) {
        echo "
            <div class='course'>
                <div>
                    <h2>{$row['titulo']}</h2>
                    <p>Descrição: {$row['descricao']}</p>
                    <p>Dificuldade: {$row['dificuldade']}</p>
                    <p>Tempo estimado: {$row['tempo_conclusao']} horas</p>
                </div>
                <div class='course-actions'>
                    <!-- Formulário para excluir curso -->
                    <form action='sair_curso.php' method='POST' style='display: inline;'>
                        <input type='hidden' name='curso_id' value='{$row['id']}'>
                        <button type='submit' class='button delete'>Excluir Curso</button>
                    </form>
                </div>
            </div>
        ";
    }
    echo "</div>";
} else {
}

// Fechar conexão
$conn->close();
?>

<!-- Botão para adicionar novo curso -->
<section class="add-course">
    <a href="escolher_curso.php" class="button">Escolher um Curso</a>
</section>
