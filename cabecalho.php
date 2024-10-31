<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Quest</title>

    <?php
    // Obter o nome do arquivo atual
    $current_file = basename($_SERVER['PHP_SELF'], '.php');
    // Definir o caminho do CSS com base no nome do arquivo
    $css_file = $current_file . '.css';
    ?>
    <link rel="stylesheet" href="css/<?php echo $css_file; ?>"> <!-- CSS dinâmico -->
    <link rel="stylesheet" href="css/comum.css">
    <link rel="stylesheet" href="css/painel_acessibilidade.css">
    <style> @import url('https://fonts.googleapis.com/css2?family=Days+One&display=swap'); </style>
</head>

<body>
    <header>
        <nav>
            <ul class="menu">
                <li><a href="index.php" class="logo"><img src="img/loguin.png" alt=""></a></li>
        
            </ul>
        </nav>

        <nav>
            <ul class="menu">
                <li><a href="login.php">Login</a></li>
                <li><a href="cadastrar.php">Cadastrar</a></li>
                <li><a href="sobre.php">Sobre</a></li>
                <li><a href="contato.php">Contato</a></li>
                <li><a href="download.php">Download</a></li>
            </ul>
        </nav>
    </header>