<?php
    $usuariosOnline = Painel::listarUsuariosOnline();
    $pegarVisitasTotais = MySql::conectar()->prepare("SELECT * FROM `tb_admin_visitas`");
    $pegarVisitasTotais->execute();
    $pegarVisitasTotais = $pegarVisitasTotais->rowCount();

    $pegarVisitasHoje = MySql::conectar()->prepare("SELECT * FROM `tb_admin_visitas` WHERE dia = ?");
    $pegarVisitasHoje->execute(array(date('Y-m-d')));

    $pegarVisitasHoje = $pegarVisitasHoje->rowCount();
?>

<div class="box-content w100">
    <h2><i class="fas fa-home"></i> Painel de controle - <?= NOME_EMPRESA ?></h2>

    <div class="box-metricas">
        <div class="box-metrica-single">
            <div class="box-metrica-wrapper">
                <h2>Usuários Online</h2>
                <p><?= count($usuariosOnline) ?></p>
            </div>
        </div>
        <div class="box-metrica-single">
            <div class="box-metrica-wrapper">
                <h2>Total de Visitas</h2>
                <p><?= $pegarVisitasTotais ?></p>
            </div>
        </div>
        <div class="box-metrica-single">
            <div class="box-metrica-wrapper">
                <h2>Visitas Hoje</h2>
                <p><?= $pegarVisitasHoje ?></p>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>

<div class="box-content w100">
    <h2><i class="fas fa-users"></i> Usuários Online no site</h2>
    <div class="table-responsive">
        <div class="row">
            <div class="col">
                <span>IP</span>
            </div>
            <div class="col">
                <span>Última Ação</span>
            </div>
            <div class="clear"></div>
        </div>

        <?php foreach($usuariosOnline as $key => $value)  { ?>
        <div class="row">
            <div class="col">
                <span><?= $value['ip'] ?></span>
            </div>
            <div class="col">
                <span><?= date('d-m-Y H:i:s',strtotime($value['ultima_acao'])) ?></span>
            </div>
            <div class="clear"></div>
        </div>

        <?php } ?>
    </div>
</div>

<div class="box-content w100">
    <h2><i class="fas fa-users"></i> Usuários do Painel</h2>
    <div class="table-responsive">
        <div class="row">
            <div class="col">
                <span>Usuário</span>
            </div>
            <div class="col">
                <span>Cargo</span>
            </div>
            <div class="clear"></div>
        </div>

        <?php

         $usuariosPainel = MySql::conectar()->prepare("SELECT * FROM `tb_admin_usuarios`");
         $usuariosPainel->execute();
         $usuariosPainel = $usuariosPainel->fetchAll();
         foreach($usuariosPainel as $key => $value)  { 
             
        ?>
            <div class="row">
                <div class="col">
                    <span><?= $value['user'] ?></span>
                </div>
                <div class="col">
                    <span><?= pegaCargo($value['cargo']); ?></span>
                </div>
                <div class="clear"></div>
            </div>

        <?php } ?>
    </div>
</div>