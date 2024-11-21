<?php
$host = 'localhost';    // ou o endereço do seu servidor de banco de dados
$user = 'root';         // seu nome de usuário do banco de dados
$password = 'serra';         // sua senha do banco de dados
$dbname = 'trilingoteste'; // nome do banco de dados

// Criar conexão
$conn = new mysqli($host, $user, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>