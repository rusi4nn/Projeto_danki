<?php require_once('config.php'); ?>
<?php Site::updateUsuarioOnline(); ?>
<?php Site::contador() ?>
<?php

    $infoSite = MySql::conectar()->prepare("SELECT * FROM `tb_site_config`");
    $infoSite->execute();
    $infoSite = $infoSite->fetch();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <link rel="icon" href="<?= INCLUDE_PATH ?>favicon.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Descrição do meu site">
    <meta name="keywords" content="cursos, desenvolvimento, web, programação">
    <meta name="author" content="Gercino Neto">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Main Css -->
    <link rel="stylesheet" href="<?= INCLUDE_PATH ?>css/style.css">
    <title><?= $infoSite['titulo'] ?></title>
</head>
<body>

    <base base="<?= INCLUDE_PATH ?>">

    <?php

        $url = isset($_GET['url']) ? $_GET['url'] : 'home';
        switch($url) {
            case 'depoimentos':
                echo '<target target="depoimentos">';
                break;
            
            case 'servicos':
                echo '<target target="servicos">';
                break;
        }

    ?>

    <div class="sucesso">Formulário enviado com sucesso!</div>
    <div class="erro">Não foi possível enviar o e-mail</div>
    <div class="overlay-loading">
        <img src="<?= INCLUDE_PATH ?>images/ajax-load.gif" alt="">
    </div>

    <!-- Menu -->
    <header>
        <div class="center">
            <div class="logo left"><a href="<?= INCLUDE_PATH ?>">Danki Code</a></div>
            <nav class="desktop right">
                <ul>
                    <li><a href="<?= INCLUDE_PATH ?>home">Home</a></li>
                    <li><a href="<?= INCLUDE_PATH ?>depoimentos">Depoimentos</a></li>
                    <li><a href="<?= INCLUDE_PATH ?>servicos">Serviços</a></li>
                    <li><a href="<?= INCLUDE_PATH ?>noticias">Notícias</a></li>
                    <li><a realtime="contato" href="<?= INCLUDE_PATH ?>contato">Contato</a></li>
                </ul>
            </nav>
            <nav class="mobile right">
                <div class="botao-menu-mobile">
                    <i class="fas fa-bars"></i>
                </div>
                <ul>
                    <li><a href="<?= INCLUDE_PATH ?>home">Home</a></li>
                    <li><a href="<?= INCLUDE_PATH ?>depoimentos">Depoimentos</a></li>
                    <li><a href="<?= INCLUDE_PATH ?>servicos">Serviços</a></li>
                    <li><a href="<?= INCLUDE_PATH ?>noticias">Notícias</a></li>
                    <li><a realtime="contato" href="<?= INCLUDE_PATH ?>contato">Contato</a></li>
                </ul>
            </nav>
            <div class="clear"></div>
        </div>
    </header>

    <!-- Banner Principal -->
    <div class="container-principal">
        <?php

            if(file_exists('pages/'.$url.'.php')) {
                include_once('pages/'.$url.'.php');
            } else {
                // Podemos fazer oque quiser pois a página não existe
                if($url != 'depoimentos' && $url != 'servicos') {
                    $urlPar = explode('/',$url)[0];
                    if($urlPar != 'noticias') {
                        $pagina404 = true;
                        include_once('pages/404.php');
                    } else {
                        include_once('pages/noticias.php');
                    }
                } else {
                    include_once('pages/home.php');
                }
            }

        ?>
    </div>

    <!-- Rodapé -->

    <footer <?php if(isset($pagina404) && $pagina404 === true) { echo 'class="fixed"'; } ?> >
        <div class="center">
            <p>Todos os direitos reservados &copy;</p>
        </div>
    </footer>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/da616c4c66.js" crossorigin="anonymous"></script>
    <!-- jquery -->
    <script src="<?= INCLUDE_PATH ?>js/jquery.min.js"></script>
    <!-- Constants Js -->
    <script src="<?= INCLUDE_PATH ?>js/constants.js"></script>
    <script src="<?= INCLUDE_PATH ?>js/scripts.js"></script>
    <!-- Slider Js -->
    <?php if ($url == 'home' || $url == '' || $url == 'servicos' || $url == 'depoimentos') { ?>
        <script src="<?= INCLUDE_PATH ?>js/slider.js"></script>
    <?php } ?>
    <?php
        if(strstr($url, 'noticias') !== false) {
    ?> 

        <script>
            $(function(){
                $('select').change(function() {
                    location.href=include_path+"noticias/"+$(this).val();
                })
            })
        </script>

    <?php  } ?>

    <?php if($url == 'contato') { ?>
        <script src="<?php INCLUDE_PATH ?>js/formularios.js"></script>
    <?php } ?>
</body>
</html>