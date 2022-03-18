<?php

    require_once('../config.php');

    $data = array();

    $assunto = 'Nova mensagem do site!';
    $corpo = '';
    foreach($_POST as $key => $value) {
        $corpo.=ucfirst($key).": ".$value;
        $corpo.="<hr>";
    }
    $info = array('assunto'=>$assunto,'corpo'=>$corpo);
    $mail = new Email('smtp.gmail.com','projetos.web.git@gmail.com','Estudos','816274@1');
    $mail->addAdress('gercinon073@gmail.com','Gercino Neto');
    $mail->formatarEmail($info);
    if($mail->enviarEmail()) {
        $data['sucesso'] = true;
    } else {
        $data['erro'] = true;
    }

    // $data['retorno'] = 'sucesso';

    die(json_encode($data));

?>