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
    // Conectar com banco de dados
    define('HOST','localhost');
    define('DATABASE','projeto_danki');
    define('USER','root');
    define('PASSWORD','');

    // Constantes Painel de Controle
    define('NOME_EMPRESA','Danki code');

    // Funções
    function pegaCargo($cargo) {
        $arr = [
            '0'=>'Normal',
            '1'=>'Sub  Adminnistrador',
            '2'=>'Administrador'
        ];

        return $arr[$cargo];
    }

?>