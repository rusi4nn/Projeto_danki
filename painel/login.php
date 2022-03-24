<?php

    if(isset($_COOKIE['lembrar'])) {
        $user = $_COOKIE['user'];
        $password = $_COOKIE['password'];
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin_usuarios` WHERE user = ? AND password = ?");
        $sql->execute(array($user,$password));
        if($sql->rowCount() == 1) {
            $info = $sql->fetch();
            $_SESSION['login'] = true;
            $_SESSION['user'] = $user;
            $_SESSION['password'] = $password;
            $_SESSION['nome'] = $info['nome'];
            $_SESSION['cargo'] = $info['cargo'];
            $_SESSION['imagem'] = $info['imagem'];

            header('Location: '.INCLUDE_PATH_PAINEL);
            die();
        }
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
    <div class="box-login">
        <?php
            if(isset($_POST['acao'])) {
                $user = $_POST['user'];
                $password = $_POST['password'];
                $sql = MySql::conectar()->prepare("SELECT * from `tb_admin_usuarios` WHERE user = ? AND password = ?");
                $sql->execute(array($user,$password));
                if($sql->rowCount() == 1) {
                    $info = $sql->fetch();
                    //Logamos com sucesso
                    $_SESSION['login'] = true;
                    $_SESSION['user'] = $user;
                    $_SESSION['password'] = $password;
                    $_SESSION['nome'] = $info['nome'];
                    $_SESSION['cargo'] = $info['cargo'];
                    $_SESSION['imagem'] = $info['imagem'];
                    if(isset($_POST['lembrar'])) {
                        setcookie('lembrar',true,time()+(60*60*24),'/');
                        setcookie('user',$user,time()+(60*60*24),'/');
                        setcookie('password',$password,time()+(60*60*24),'/');
                    }
                    header('location: '.INCLUDE_PATH_PAINEL);
                    die();
                } else {
                    // Falhou
                    echo '<div class="erro-box"><i class="fas fa-times"></i> Usuário ou senha incorretos!</div>';
                }
            }
        ?>
        <h2>Efetue o login:</h2>
        <form method="POST" action="">
            <input type="text" name="user" placeholder="Login..." required>
            <input type="password" name="password" placeholder="Senha..." required>
            <div class="form-group-login left">
                <input type="submit" name="acao" value="Logar!">
            </div>
            <div class="form-group-login right">
                <label for="">Lembrar-me</label>
                <input type="checkbox" name="lembrar">
            </div>
            <div class="clear"></div>
        </form>
    </div>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/da616c4c66.js" crossorigin="anonymous"></script>
</body>
</html>