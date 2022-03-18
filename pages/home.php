    <section class="banner-container">
        <div style="background: url('<?= INCLUDE_PATH ?>images/bg-form.jpg');" class="banner-single"></div>
        <div style="background: url('<?= INCLUDE_PATH ?>images/bg-form2.jpg');" class="banner-single"></div>
        <div style="background: url('<?= INCLUDE_PATH ?>images/bg-form3.jpg');" class="banner-single"></div>
        <div class="overlay"></div>
        <div class="center">
            <?php
                if(isset($_POST['acao'])) {
                    // Enviei o formulário.
                    if ($_POST['email'] != '') {
                        $email = $_POST['email'];
                        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            // Tudo certo é um e-mail
                            $mail = new Email('smtp.gmail.com','projetos.web.git@gmail.com','Estudos','816274@1');
                            $mail->addAdress('gercinon073@gmail.com','Gercino Neto');
                            $mail->formatarEmail(array('assunto'=>'Um novo e-mail foi cadastrado','corpo'=>'O email: '.'<b>'.$email.'</b>'.' foi cadastrado com sucesso!'));
                            if($mail->enviarEmail()) {
                                echo '<script>alert("E-mail enviado com sucesso!")</script>';
                            } else {
                                echo '<script>alert("Não foi possível enviar o e-mail.")</script>';
                            }
                        } else {
                            echo '<script>alert("Não é um e-mail válido")</script>';
                        }
                    } else {
                        echo '<script>alert("Campos vázios não são permitidos!")</script>';
                    }
                }
            ?>
            <form method="POST" action="">
                <h2>Qual o seu melhor e-mail?</h2>
                <input type="email" name="email" required>
                <input type="submit" name="acao" value="Cadastrar!">
            </form>
        </div>
        <div class="bullets">
            
        </div>
    </section>

    <!-- Descrição / Autor -->

    <section class="descricao-autor">
        <div class="center">
            <div class="w50 left">
                <h2>Guilherme C. Grillo</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ligula quam, tincidunt sit amet urna non, tempus dapibus ex. Aenean consectetur elit metus, nec consectetur sapien pellentesque in. Donec nec tortor id dolor consectetur pellentesque condimentum eu tellus. Suspendisse in leo vitae purus dapibus congue. Phasellus placerat euismod vehicula. Sed ac cursus neque, et imperdiet augue. Nam lobortis finibus leo eu gravida.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ligula quam, tincidunt sit amet urna non, tempus dapibus ex. Aenean consectetur elit metus, nec consectetur sapien pellentesque in. Donec nec tortor id dolor consectetur pellentesque condimentum eu tellus. Suspendisse in leo vitae purus dapibus congue. Phasellus placerat euismod vehicula. Sed ac cursus neque, et imperdiet augue. Nam lobortis finibus leo eu gravida.</p>
            </div>

            <div class="w50 left">
                <img class="right" src="<?= INCLUDE_PATH ?>images/foto.jpg" alt="">
            </div>
            <div class="clear"></div>
        </div>
    </section>

    <!-- Especialidades -->

    <section class="especialidades">
        <div class="center">
            <h2 class="title">Especialidades</h2>
            <div class="w33 left box-especialidade">
                <h3><i class="fab fa-css3-alt"></i></i></h3>
                <h4>CSS3</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ligula quam, tincidunt sit amet urna non, tempus dapibus ex. Aenean consectetur elit metus, nec consectetur sapien pellentesque in. Donec nec tortor id dolor consectetur pellentesque condimentum eu tellus. Suspendisse in leo vitae purus dapibus congue. Phasellus placerat euismod vehicula. Sed ac cursus neque, et imperdiet augue. Nam lobortis finibus leo eu gravida.</p>
            </div>
            <div class="w33 left box-especialidade">
                <h3><i class="fab fa-html5"></i></h3>
                <h4>HTML5</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ligula quam, tincidunt sit amet urna non, tempus dapibus ex. Aenean consectetur elit metus, nec consectetur sapien pellentesque in. Donec nec tortor id dolor consectetur pellentesque condimentum eu tellus. Suspendisse in leo vitae purus dapibus congue. Phasellus placerat euismod vehicula. Sed ac cursus neque, et imperdiet augue. Nam lobortis finibus leo eu gravida.</p>
            </div>
            <div class="w33 left box-especialidade">
                <h3><i class="fab fa-js-square"></i></i></h3>
                <h4>JAVASCRIPT</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ligula quam, tincidunt sit amet urna non, tempus dapibus ex. Aenean consectetur elit metus, nec consectetur sapien pellentesque in. Donec nec tortor id dolor consectetur pellentesque condimentum eu tellus. Suspendisse in leo vitae purus dapibus congue. Phasellus placerat euismod vehicula. Sed ac cursus neque, et imperdiet augue. Nam lobortis finibus leo eu gravida.</p>
            </div>
            <div class="clear"></div>
        </div>
    </section>

    <!-- Depoimentos e Serviços -->

    <section class="extras">
        <div class="center">
            <div id="depoimentos" class="w50 left depoimentos-container">
                <h2 class="title">Depoimentos dos nossos clientes</h2>
                <div class="depoimento-single">
                    <p class="depoimento-descricao">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ligula quam, tincidunt sit amet urna non, tempus dapibus ex. Aenean consectetur elit metus, nec consectetur sapien pellentesque in. Donec nec tortor id dolor consectetur pellentesque condimentum eu tellus. Suspendisse in leo vitae purus dapibus congue. Phasellus placerat euismod vehicula. Sed ac cursus neque, et imperdiet augue. Nam lobortis finibus leo eu gravida."</p>
                    <p class="nome-autor">Lorem Ipsum</p>
                </div>
                <div class="depoimento-single">
                    <p class="depoimento-descricao">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ligula quam, tincidunt sit amet urna non, tempus dapibus ex. Aenean consectetur elit metus, nec consectetur sapien pellentesque in. Donec nec tortor id dolor consectetur pellentesque condimentum eu tellus. Suspendisse in leo vitae purus dapibus congue. Phasellus placerat euismod vehicula. Sed ac cursus neque, et imperdiet augue. Nam lobortis finibus leo eu gravida."</p>
                    <p class="nome-autor">Lorem Ipsum</p>
                </div>
                <div class="depoimento-single">
                    <p class="depoimento-descricao">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ligula quam, tincidunt sit amet urna non, tempus dapibus ex. Aenean consectetur elit metus, nec consectetur sapien pellentesque in. Donec nec tortor id dolor consectetur pellentesque condimentum eu tellus. Suspendisse in leo vitae purus dapibus congue. Phasellus placerat euismod vehicula. Sed ac cursus neque, et imperdiet augue. Nam lobortis finibus leo eu gravida."</p>
                    <p class="nome-autor">Lorem Ipsum</p>
                </div>
            </div>
            <div id="servicos" class="w50 left servicos-container">
                <h2 class="title">Serviços</h2>
                <div class="servicos">
                    <ul>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ligula quam, tincidunt sit amet urna non, tempus dapibus ex.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
                        <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ligula quam, tincidunt sit amet urna non, tempus dapibus ex.</li>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </section>