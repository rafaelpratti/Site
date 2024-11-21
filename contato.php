<?php include 'cabecalho_footer.php'; ?>

    <!--CONTEUDO PRINCIPAL-->
    <section class="sec1">
        <img src="img/contato.png">
        <div>
            <h1>Entre em contato conosco:</h1>
            <form id="formcontato" action="">
                <fieldset>
                    <label for="nome">Nome: </label>
                    <input type="text" id="nome" class="text" name="fname">
                    <label for="email">Email: </label>
                    <input type="email" id="email" class="text" name="email">
                    <label for="contato">Contato: </label>
                    <input type="text" id="contato" class="text" name="contato">
                    <label for="mensagem">Mensagem: </label>
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                    <button type="submit" class="Enviar">Enviar</button>
                </fieldset>
            </form>
        </div>
    </section>

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

    <script src="js/contato.js"></script>
    <script src="js/collapsible.js"></script>
    
</body>

</html>