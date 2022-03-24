<?php

    session_start();

    date_default_timezone_set('America/Sao_Paulo');

    $autoload = function($class) {
        if($class == 'Email') {
             include_once('vendor/autoload.php');
        }
        include_once('classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);

    define('INCLUDE_PATH','http://192.168.1.5/dev_web_danki/');
    define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');

    define('BASE_DIR_PAINEL',__DIR__.'/painel');

    // Conectar com banco de dados
    define('HOST','localhost');
    define('DATABASE','projeto_danki');
    define('USER','root');
    define('PASSWORD','');

    // Constantes Painel de Controle
    define('NOME_EMPRESA','Danki code');

    // Variaveis Cargo Painel

    // Funções do Painel
    function pegaCargo($indice) {
        return Painel::$cargos[$indice];
    }

    function selecionadoMenu($par) {
        $url = explode('/',@$_GET['url'])[0];

        if ($url == $par) {
            echo 'class="menu-active"';
        }

    }

    function verificaPermissaoMenu($permissao) {
        if ($_SESSION['cargo'] >= $permissao) {
            return;
        } else {
            echo 'style="display:none;"';
        }
    }

    function verificaPermissaoPagina($permissao) {
        if ($_SESSION['cargo'] >= $permissao) {
            return;
        } else {
            header('Location: '.INCLUDE_PATH_PAINEL.'permissao-negada');
            die();
        }
    }

?>