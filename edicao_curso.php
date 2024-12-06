<?php include 'cabecalho_footer.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Unidades</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 1rem;
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .unit {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            background-color: #f9f9f9;
        }
        .unit h2 {
            font-size: 1.2rem;
            display: flex;
        }
        .unit h2 .edit-icon {
            cursor: pointer;
            font-size: 1rem;
            color: #007bff;
            border: none;
            background: none;
            text-decoration: underline;
        }
        .unit button {
            display: block;
            width: 100%;
            padding: 0.5rem;
            margin-top: 1rem;
            border: 1px solid #007bff;
            border-radius: 4px;
            background-color: white;
            color: #007bff;
            cursor: pointer;
            font-size: 1rem;
            text-align: center;
        }
        .unit button:hover {
            background-color: #007bff;
            color: white;
        }
        .add-unit {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem;
            margin-top: 1rem;
            border: 2px dashed #007bff;
            border-radius: 8px;
            color: #007bff;
            cursor: pointer;
            font-size: 1rem;
        }
        .add-unit:hover {
            background-color: #e9f5ff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Python</h1>
        <nav>
            <a href="#">Curso</a>
            <a href="#">Configurações</a>
            <a href="#">Relatórios</a>
        </nav>

        <div class="unit">
            <h2>
                Unidade 1 <button class="edit-icon">✏️</button>
            </h2>
            <hr>
            <button>+ Adicionar exercício ou conteúdo</button>
        </div>

        <div class="add-unit">+ Adicionar unidade</div>
    </div>
</body>
</html>
