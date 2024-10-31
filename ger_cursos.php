<?php include 'cabecalho.php'; ?>

    <div class="container">
        <h1>Gerenciamento de Cursos - Trilingo</h1>

        <form id="courseForm">
            <h2 id="formTitle">Adicionar Curso</h2>
            <input type="hidden" id="courseId">
            <div class="form-group">
                <label for="courseName">Nome do Curso</label>
                <input type="text" id="courseName" required>
            </div>
            <div class="form-group">
                <label for="courseDescription">Descrição do Curso</label>
                <textarea id="courseDescription" required></textarea>
            </div>
            <button type="submit" id="submitBtn">Adicionar Curso</button>
        </form>

        <h2>Cursos Existentes</h2>
        <ul id="courseList"></ul>
    </div>

    <script src="js/cadcursos.js"></script>
    <footer class="footer">
        ©2024 todos os direitos reservados!
    </footer>
</body>

</html>