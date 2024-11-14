<?php include 'cabecalho.php'; ?>

    <aside id="accessibility-bar">
        <div class="accessibility-box">
            <h2>Acessibilidade</h2>
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
    </aside>

    <section class="sec1">
        <div>
            <img class="img" src="img/login_img.png">
            <h1>Faça seu Login:</h1>

            <form id="formlogin">
                <fieldset>
                    <label for="email">Email: </label>
                    <input type="email" id="email" class="text" name="email"><br>

                    <label for="senha">Senha: </label>
                    <input type="password" id="senha" class="password" name="senha"><br><br>

                    <button type="submit" id="bot_entrar" class="login">Entrar</button>
                </fieldset>
            </form>
        </div>
    </section>

    <script src="js/login.js"></script>

    <footer class="footer">
        ©2024 todos os direitos reservados!
    </footer>
</body>

</html>