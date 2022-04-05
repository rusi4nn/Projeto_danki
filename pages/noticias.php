<?php

    $url = explode('/',$_GET['url']);
    if(!isset($url[2])) {

    $categoria = MySql::conectar()->prepare("SELECT * FROM `tb_site_categorias` WHERE slug = ?");
    if(isset($url[1])) {
        $categoria->execute(array($url[1]));
        $categoria = $categoria->fetch();
    }


?>

<section class="header-noticias">
    <div class="center">
        <h2><i class="fas fa-bell"></i> </h2>
        <h2>Acompanhe as últimas <b>notícias do portal</b></h2>
    </div>
</section>

<section class="container-portal">
    <div class="center">  
        <div class="sidebar">
            <div class="box-content-sidebar">
                <h3><i class="fas fa-search"></i> Realizar uma busca:</h3>
                <form action="">
                    <input type="text" name="parametro" placeholder="Oque deseja procurar?">
                    <input type="submit" name="buscar" value="Buscar">
                </form>
            </div>
            <div class="box-content-sidebar">
                <h3><i class="fas fa-book"></i> Selecione a categoria:</h3>
                <form action="">
                    <select name="categoria">
                        <option value="" selected>Todas as categorias</option>
                        <?php
                            $categorias = MySql::conectar()->prepare("SELECT * FROM `tb_site_categorias` ORDER BY order_id ASC");
                            $categorias->execute();
                            $categorias = $categorias->fetchAll();
                            foreach($categorias as $key => $value) {
                        ?>
                        <option <?php if(isset($url[1]) && $value['slug'] == $url[1]) echo 'selected'; ?> value="<?= $value['slug'] ?>"><?= $value['nome'] ?></option>
                        <?php } ?>
                    </select>
                </form>
            </div>
            <div class="box-content-sidebar">
                <h3 class="text-center"><i class="fas fa-user"></i> Sobre o autor:</h3>
                <div class="autor-box-portal">   
                    <div class="box-img-autor"></div>
                        <div class="texto-autor-portal text-center">
                        <?php
                            $infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site_config`");
                            $infoSite->execute();
                            $infoSite = $infoSite->fetch();
                        ?>
                            <h3><?= $infoSite['nome_autor'] ?></h3>
                            <p><?= substr($infoSite['descricao'],0,300).'...' ?></p>
                        </div>
                </div>
            </div>
        </div>

        <div class="conteudo-portal">
            <div class="header-conteudo-portal">
                <?php
                    if(!isset($categoria['nome']) || $categoria['nome'] == '') {

                ?>
                    <h2>Visualizando todos os Posts</h2>
                <?php } else if(isset($categoria['nome']) && $categoria['nome'] != '') { ?>
                    <h2>Visualizando Posts em <span><?= $categoria['nome'] ?></span></h2>
                <?php } 

                    $query = "SELECT * FROM `tb_site_noticias`";
                    if(isset($categoria['nome']) && $categoria['nome'] != '') {
                        $query.="WHERE categoria_id = $categoria[id]";
                    }
                    $sql = MySql::conectar()->prepare($query);
                    $sql->execute();
                    $noticias = $sql->fetchAll();
                    
                ?>
            </div>
            <?php foreach($noticias as $key => $value) {
                $sql = MySql::conectar()->prepare("SELECT slug FROM tb_site_categorias WHERE id = ?");
                $sql->execute(array($value['categoria_id']));
                $categoriaSlug = $sql->fetch()['slug'];
                
            ?>
            <div class="box-single-conteudo">
                <h2><?= date('d/m/Y',strtotime($value['data'])) ?> - <?= $value['titulo'] ?></h2>
                <p><?= substr(strip_tags($value['conteudo']),0,400).'...' ?></p>
                <a href="<?= INCLUDE_PATH ?>noticias/<?= $categoriaSlug ?>/<?= $value['slug'] ?>">Leia mais</a>
            </div>
            <?php } ?>
        </div>

        <div class="paginator">
            <a class="active-page" href="">1</a>
            <a href="">2</a>
            <a href="">3</a>
        </div>

        <div class="clear"></div>
    </div>
</section>

<?php } else { 
    include_once('noticia_single.php');
}?>