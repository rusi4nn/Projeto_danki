<?php

    require_once '../config.php';

    if(Painel::logado() == false) {
        include_once('login.php');
    } else {
        include_once('main.php');
    }

?>