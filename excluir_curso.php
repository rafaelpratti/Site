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
        
        // Verifica se a ação de exclusão foi confirmada
        if (isset($_POST['confirmar'])) {
            // Deleta o curso
            $sql = "DELETE FROM Curso WHERE id = $id";
            if ($conn->query($sql) === TRUE) {
                header('Location: cursos_admin.php'); // Redireciona para a página de administração
                exit;
            } else {
                echo "Erro ao excluir curso: " . $conn->error;
            }
        }
    } else {
        echo "Curso não encontrado.";
        exit;
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
    <title>Excluir Curso</title>
</head>
<body>
    <h1>Tem certeza que deseja excluir o curso: <?php echo $curso['titulo']; ?>?</h1>
    <form action="" method="POST">
        <button type="submit" name="confirmar">Sim, excluir</button>
        <a href="cursos_admin.php">Cancelar</a>
    </form>
</body>
</html>
