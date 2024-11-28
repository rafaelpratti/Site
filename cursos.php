<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha Seu Curso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            background-color: #4CAF50;
            color: white;
            padding: 1rem;
            text-align: center;
        }
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }
        .card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .card-body {
            padding: 1rem;
        }
        .card-title {
            font-size: 1.25rem;
            margin: 0;
            color: #333;
        }
        .card-description {
            font-size: 1rem;
            margin: 0.5rem 0 1rem;
            color: #555;
        }
        .card-checkbox {
            display: flex;
            align-items: center;
            margin-top: 1rem;
        }
        .card-checkbox input {
            margin-right: 0.5rem;
        }
        .confirm-button {
            display: block;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 0.75rem;
            font-size: 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 2rem auto 0;
            max-width: 200px;
        }
        .confirm-button:hover {
            background-color: #45a049;
        }
        footer {
    display: flex;
    flex-direction: column;
    background-color: #011f0b;
    color: white;
    text-align: center;
    left: 0;
    bottom: 0;
    width: 100%;
    padding: 0.2em;
    position: fixed;
}
    </style>
</head>
<body>
    <header>
        <h1>Escolha Seus Cursos de Programação</h1>
        <p>Aprenda programação de forma prática e intuitiva.</p>
    </header>

    <div class="container">
        <form id="course-form">
            <div class="grid">
                <div class="card">
                    <img src="img/html_css.jpeg" alt="HTML e CSS">
                    <div class="card-body">
                        <h2 class="card-title">Introdução ao HTML e CSS</h2>
                        <p class="card-description">Aprenda a construir páginas web com HTML e CSS.</p>
                        <div class="card-checkbox">
                            <input type="checkbox" name="courses" value="HTML e CSS">
                            <label for="courses">Selecionar</label>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="img/js.png" alt="JavaScript">
                    <div class="card-body">
                        <h2 class="card-title">JavaScript para Iniciantes</h2>
                        <p class="card-description">Domine os fundamentos da linguagem JavaScript.</p>
                        <div class="card-checkbox">
                            <input type="checkbox" name="courses" value="JavaScript">
                            <label for="courses">Selecionar</label>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <img src="img/python.jpeg" alt="Python">
                    <div class="card-body">
                        <h2 class="card-title">Python Básico</h2>
                        <p class="card-description">Explore a programação com a linguagem Python.</p>
                        <div class="card-checkbox">
                            <input type="checkbox" name="courses" value="Python">
                            <label for="courses">Selecionar</label>
                        </div>
                    </div>
                </div>
                
                    </div>
                </div>
            </div>
            <button type="submit" class="confirm-button">Confirmar Escolhas</button>
        </form>
    </div>
    
    <footer class="footer">
        ©2024 todos os direitos reservados!
    </footer>

    <script>
        document.getElementById('course-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const selectedCourses = Array.from(document.querySelectorAll('input[name="courses"]:checked'))
                .map(checkbox => checkbox.value);

            if (selectedCourses.length > 0) {
                alert('Você selecionou os seguintes cursos: ' + selectedCourses.join(', '));
            } else {
                alert('Por favor, selecione pelo menos um curso.');
            }
        });
    </script>
</body>
</html>
