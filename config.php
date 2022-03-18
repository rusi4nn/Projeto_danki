<?php

    $autoload = function($class) {
        if($class == 'Email') {
             include_once('vendor/autoload.php');
        }
        include_once('classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);

    define('INCLUDE_PATH','http://192.168.1.5/dev_web_danki/');

?>