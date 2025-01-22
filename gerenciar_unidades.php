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

    // Lista as unidades associadas a este curso
    $sql_unidades = "SELECT * FROM Unidade WHERE fk_Curso_id = $curso_id ORDER BY ordem";
    $result_unidades = $conn->query($sql_unidades);
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
    <title>Gerenciar Unidades - <?php echo $curso['titulo']; ?></title>
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

        .unidade-lista {
            margin-top: 20px;
        }

        .unidade-item {
            padding: 10px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .unidade-item a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        .unidade-item a:hover {
            color: #1d7a1d;
        }

        .voltar-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
            margin-top: 20px;
        }

        .voltar-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Unidades do Curso: <?php echo $curso['titulo']; ?></h1>
        
        <!-- Listando as Unidades -->
        <div class="unidade-lista">
            <?php if ($result_unidades->num_rows > 0): ?>
                <?php while ($unidade = $result_unidades->fetch_assoc()): ?>
                    <div class="unidade-item">
                        <p><strong><?php echo $unidade['titulo']; ?></strong></p>
                        <p><?php echo $unidade['descricao']; ?></p>
                        <p>Ordem: <?php echo $unidade['ordem']; ?></p>
                        <a href="editar_unidade.php?id=<?php echo $unidade['id']; ?>">Editar Unidade</a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>Não há unidades cadastradas para este curso.</p>
            <?php endif; ?>
        </div>

        <!-- Botão para Adicionar Nova Unidade -->
        <div class="button-container">
            <h2>Adicionar Nova Unidade</h2>
            <a href="adicionar_unidade.php?curso_id=<?php echo $curso['id']; ?>">Adicionar Unidade</a>
        </div>

        <!-- Botão de Voltar -->
        <div class="button-container">
            <a href="cursos_admin.php" class="voltar-btn">Voltar para Cursos</a>
        </div>
    </div>
</body>
</html>
