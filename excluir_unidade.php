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

    // Verifica se a unidade existe
    $sql = "SELECT * FROM Unidade WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $unidade = $result->fetch_assoc();

        // Deleta a unidade
        $sql_delete = "DELETE FROM Unidade WHERE id = $id";
        if ($conn->query($sql_delete) === TRUE) {
            // Redireciona para a página de gerenciamento de unidades após a exclusão
            header('Location: gerenciar_unidades.php?curso_id=' . $unidade['fk_Curso_id']);
            exit;
        } else {
            echo "Erro ao excluir a unidade: " . $conn->error;
        }
    } else {
        echo "Unidade não encontrada.";
    }
} else {
    echo "ID da unidade não fornecido.";
    exit;
}
