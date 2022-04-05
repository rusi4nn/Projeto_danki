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
            <div class="w100 left">
                <h2 class="text-center"><img src="<?php INCLUDE_PATH ?>images/foto.jpg"> <?= $infoSite['nome_autor'] ?></h2>
                <p><?= $infoSite['descricao'] ?></p>
            </div>
            <div class="clear"></div>
        </div>
    </section>

    <!-- Especialidades -->

    <section class="especialidades">
        <div class="center">
            <h2 class="title">Especialidades</h2>
            <div class="w33 left box-especialidade">
                <h3><i class="<?= $infoSite['icone1'] ?>"></i></i></h3>
                <h4>CSS3</h4>
                <p><?= $infoSite['descricao1'] ?></p>
            </div>
            <div class="w33 left box-especialidade">
                <h3><i class="<?= $infoSite['icone2'] ?>"></i></h3>
                <h4>HTML5</h4>
                <p><?= $infoSite['descricao2'] ?></p>
            </div>
            <div class="w33 left box-especialidade">
                <h3><i class="<?= $infoSite['icone3'] ?>"></i></i></h3>
                <h4>JAVASCRIPT</h4>
                <p><?= $infoSite['descricao3'] ?></p>
            </div>
            <div class="clear"></div>
        </div>
    </section>

    <!-- Depoimentos e Serviços -->

    <section class="extras">
        <div class="center">
            <div id="depoimentos" class="w50 left depoimentos-container">
                <h2 class="title">Depoimentos dos nossos clientes</h2>
                <?php  
                    $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site_depoimentos` ORDER BY order_id ASC LIMIT 3");
                    $sql->execute();
                    $depoimentos = $sql->fetchAll();
                    foreach($depoimentos as $key => $value) {
                ?>
                <div class="depoimento-single">
                    <p class="depoimento-descricao"><?= $value['depoimento'] ?></p>
                    <p class="nome-autor"><?= $value['nome'] ?> - <?= $value['data'] ?></p>
                </div>

                <?php } ?>
            </div>
            <div id="servicos" class="w50 left servicos-container">
                <h2 class="title">Serviços</h2>
                <div class="servicos">
                    <ul>
                        <?php 

                            $sql = MySql::conectar()->prepare("SELECT * FROM `tb_site_servicos` ORDER BY order_id ASC LIMIT 3");
                            $sql->execute();
                            $servicos = $sql->fetchAll();
                            foreach($servicos as $key => $value) {

                        ?>
                            <li><?= $value['servico'] ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </section>