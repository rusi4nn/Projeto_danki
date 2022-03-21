<?php

    if(isset($_GET['logout'])) {
        Painel::logout();
    }

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
    <meta name="keywords" content="cursos, desenvolvimento, web, programação, painel de controle">
    <meta name="author" content="Gercino Neto">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Main css -->
    <link rel="stylesheet" href="<?= INCLUDE_PATH_PAINEL ?>css/style.css">
    <title>Painel de controle</title>
</head>
<body>
    <div class="menu">
        <div class="menu-wrapper">
            <div class="box-usuario">
                <?php if($_SESSION['img'] == '') { ?>
                <div class="avatar-usuario">
                    <i class="fas fa-user"></i>   
                </div>
                <?php } else { ?>

                    <div class="imagem-usuario">
                        <img src="<?= INCLUDE_PATH_PAINEL ?>uploads/<?= $_SESSION['img']?>" alt="">   
                    </div>

                <?php } ?>                
                <div class="nome-usuario">
                    <p><?= $_SESSION['nome'] ?></p>
                    <p><?= pegaCargo($_SESSION['cargo']); ?></p>
                </div>
            </div>
            <div class="items-menu">
                <h2>Cadastro</h2>
                <a href="<?= INCLUDE_PATH_PAINEL ?>cadastrar-depoimento">Cadastrar Depoimento</a>
                <a href="">Cadastrar Serviço</a>
                <a href="">Cadastrar Slides</a>
                <h2>Gestão</h2>
                <a href="">Listar Depoimentos</a>
                <a href="">Listar Serviços</a>
                <a href="">Listar Slides</a>
                <h2>Administração do painel</h2>
                <a href="">Editar Usuário</a>
                <a href="">Adicionar Usuários</a>
                <h2>Configuração Geral</h2>
                <a href="">Editar</a>
            </div>
        </div>
    </div>
    <header>
        <div class="center">
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
            <div class="logout">
            <a href="<?= INCLUDE_PATH_PAINEL ?>"><i class="fas fa-home"></i> <span>Página inicial</span></a>
                <a href="<?= INCLUDE_PATH_PAINEL ?>?logout"><i class="fas fa-user-alt-slash"></i> <span>Sair</span></a>
            </div>
            <div class="clear"></div>
        </div>
    </header>

    <div class="content">
        <?php

            Painel::carregarPagina();

        ?>
    </div>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/da616c4c66.js" crossorigin="anonymous"></script>
    <!-- jquery -->
    <script src="<?= INCLUDE_PATH ?>js/jquery.min.js"></script>
    <!-- Main js -->
    <script src="<?= INCLUDE_PATH_PAINEL ?>js/main.js"></script>
</body>
</html>