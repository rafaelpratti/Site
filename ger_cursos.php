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

    <section>
            <div id="acbox" class="accessibility-box">
        
                <div class="font-size-control">
                    <button id="decrease-font" class="square-button">A-</button>
                    <button id="increase-font" class="square-button">A+</button>
                </div>
                <div class="contrast-control">
                    <button id="contrast-normal" class="square-button">A</button>
                    <button id="contrast-yellow" class="square-button" style="background-color: yellow;">A</button>
                    <button id="contrast-blue" class="square-button" style="background-color: blue; color: white;">A</button>
                    <button id="contrast-black" class="square-button" style="background-color: black; color: yellow;">A</button>
                </div>
                <button id="reset" class="reset-button">Redefinir</button>
            </div>
        <button type="button" class="collapsible" id="collapsible">Acessibilidade</button>
    </section>

    <script src="js/cadcursos.js"></script>
    <script src="js/collapsible.js"></script>
    <footer class="footer">
        ©2024 todos os direitos reservados!
    </footer>
</body>

</html>