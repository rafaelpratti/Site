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

    // Listar conteúdos da unidade
    $sql = "SELECT * FROM Conteudo WHERE fk_Unidade_id = $unidade_id";
    $result = $conn->query($sql);

    // Verificar se há conteúdos para exibir
    if ($result->num_rows > 0) {
        echo "<h1>Conteúdos da Unidade</h1>";
        echo "<table>";
        echo "<tr><th>Título</th><th>Tipo</th><th>Ações</th></tr>";

        while ($conteudo = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($conteudo['titulo']) . "</td>";
            echo "<td>" . ucfirst($conteudo['tipo']) . "</td>";
            echo "<td>
                    <a href='editar_conteudo.php?id=" . $conteudo['id'] . "'>Editar</a> |
                    <a href='excluir_conteudo.php?id=" . $conteudo['id'] . "' onclick='return confirm(\"Tem certeza que deseja excluir este conteúdo?\")'>Excluir</a>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum conteúdo encontrado.";
    }

    // Adicionar novo conteúdo
    echo "<a href='adicionar_conteudo.php?id=$unidade_id'>Adicionar Conteúdo</a>";
} else {
    echo "ID da unidade não fornecido.";
}
?>
