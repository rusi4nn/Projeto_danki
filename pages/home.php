    <section class="banner-container">
        <div style="background: url('<?= INCLUDE_PATH ?>images/bg-form.jpg');" class="banner-single"></div>
        <div style="background: url('<?= INCLUDE_PATH ?>images/bg-form2.jpg');" class="banner-single"></div>
        <div style="background: url('<?= INCLUDE_PATH ?>images/bg-form3.jpg');" class="banner-single"></div>
        <div class="overlay"></div>
        <div class="center">
            <form method="POST" action="">
                <h2>Qual o seu melhor e-mail?</h2>
                <input type="email" name="email" required>
                <input type="hidden" name="identificador" value="form_home">
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