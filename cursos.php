<?php include 'cabecalho_footer.php'; ?>

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

    <script src="js/collapsible.js"></script>
    <script src="js/cursos.js"></script>
    
</body>

</html>