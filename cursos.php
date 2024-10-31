<?php include 'cabecalho.php'; ?>

    <div class="container">
        <h1>Escolha de Cursos</h1>
        <div class="course-list">
            <h2>Lista de Cursos</h2>
            <ul id="available-courses">
                <li>Curso de Lógica <button class="add-course" onclick="addCourse('Curso de Lógica')">➔</button></li>
                <li>Curso de Python <button class="add-course" onclick="addCourse('Curso de Python')">➔</button></li>
            </ul>
        </div>

        <div class="my-courses">
            <h2>Meus Cursos</h2>
            <ul id="my-courses">
                <!-- Os cursos adicionados aparecerão aqui -->
            </ul>
        </div>
    </div>


    <script src="js/cursos.js"></script>
    <footer class="footer">
        ©2024 todos os direitos reservados!
    </footer>
</body>

</html>