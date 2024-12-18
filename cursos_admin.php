<?php include 'cabecalho_footer.php'; ?>

<?php
include 'db.php';
// Verifica se o usuário é administrador
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit;
}

// Busca os cursos
$sql = "SELECT id, titulo, descricao, dificuldade, tempo_conclusao FROM Curso";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração de Cursos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Administração de Cursos</h1>
    <a href="adicionar_curso.php" class="btn">Adicionar Novo Curso</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Dificuldade</th>
                <th>Tempo de Conclusão</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($curso = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($curso['id']) ?></td>
                        <td><?= htmlspecialchars($curso['titulo']) ?></td>
                        <td><?= htmlspecialchars($curso['descricao']) ?></td>
                        <td><?= htmlspecialchars($curso['dificuldade']) ?></td>
                        <td><?= htmlspecialchars($curso['tempo_conclusao']) ?> horas</td>
                        <td>
                            <a href="editar_curso.php?id=<?= $curso['id'] ?>">Editar</a>
                            <a href="excluir_curso.php?id=<?= $curso['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este curso?')">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Nenhum curso disponível.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>