<?php
include 'cabecalho_footer.php';
session_start();
require_once 'db.php'; // Conexão com o banco de dados

// Verifica se o usuário é administrador
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit;
}

// Verifica se o ID da unidade foi passado
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Busca os dados da unidade com base no ID
    $sql = "SELECT * FROM Unidade WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $unidade = $result->fetch_assoc();
    } else {
        echo "Unidade não encontrada.";
        exit;
    }

    // Verifica se o formulário foi enviado para atualização
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Sanitiza os dados do formulário
        $titulo = $conn->real_escape_string($_POST['titulo']);
        $descricao = $conn->real_escape_string($_POST['descricao']);
        $ordem = (int)$_POST['ordem'];
        $fk_Curso_id = (int)$_POST['fk_Curso_id'];

        // Atualiza os dados no banco de dados
        $sql = "UPDATE Unidade 
                SET titulo = '$titulo', descricao = '$descricao', ordem = $ordem, fk_Curso_id = $fk_Curso_id
                WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            header('Location: gerenciar_unidades.php?curso_id=' . $fk_Curso_id); // Redireciona para a página de gerenciamento de unidades
            exit;
        } else {
            echo "Erro ao atualizar unidade: " . $conn->error;
        }
    }
} else {
    echo "ID da unidade não fornecido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Unidade</title>
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

        .button-container .btn-delete {
            background-color: #e74c3c;
            color: white;
            font-weight: bold;
        }

        .button-container .btn-delete:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Editar Unidade: <?php echo htmlspecialchars($unidade['titulo']); ?></h1>
        <form action="" method="POST">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" value="<?php echo htmlspecialchars($unidade['titulo']); ?>" required>
            <br>
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" required><?php echo htmlspecialchars($unidade['descricao']); ?></textarea>
            <br>
            <label for="ordem">Ordem:</label>
            <input type="number" name="ordem" id="ordem" value="<?php echo $unidade['ordem']; ?>" required>
            <br>
            <label for="fk_Curso_id">Curso:</label>
            <select name="fk_Curso_id" id="fk_Curso_id" required>
                <?php
                // Obtém os cursos disponíveis
                $sql_cursos = "SELECT id, titulo FROM Curso";
                $result_cursos = $conn->query($sql_cursos);
                while ($curso = $result_cursos->fetch_assoc()) {
                    echo '<option value="' . $curso['id'] . '"' . ($unidade['fk_Curso_id'] == $curso['id'] ? ' selected' : '') . '>' . htmlspecialchars($curso['titulo']) . '</option>';
                }
                ?>
            </select>
            <br>
            <button type="submit">Atualizar Unidade</button>
            <div class="button-container">
                <!-- Botões para gerenciar conteúdos e exercícios -->
                <a href="gerenciar_conteudos.php?id=<?php echo $unidade['id']; ?>" class="btn-manage">Gerenciar Conteúdos</a>
                <a href="gerenciar_exercicios.php?id=<?php echo $unidade['id']; ?>" class="btn-manage">Gerenciar Exercícios</a>
                <a href="gerenciar_unidades.php?curso_id=<?php echo $unidade['fk_Curso_id']; ?>">Voltar</a>
                <!-- Botão de excluir -->
                <a href="excluir_unidade.php?id=<?php echo $unidade['id']; ?>" class="btn-delete" onclick="return confirm('Tem certeza que deseja excluir esta unidade?')">Excluir Unidade</a>
                    

            </div>
        </form>
    </div>

</div>
</body>
</html>
