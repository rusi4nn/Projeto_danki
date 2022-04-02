<?php

    if(isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $servico = Painel::select('tb_site_servicos','id = ?',array($id));
    } else {
        Painel::alert('erro','Você precisa passsar o parametro ID.');
        die();
    }

?>

<div class="box-content">
    <h2><i class="fas fa-user-edit"></i> Editar serviço</h2>

    <form method="POST" enctype="multipart/form-data" action="">

    <?php

        if(isset($_POST['acao'])) {
            if(Painel::update($_POST)) {
                Painel::alert('sucesso','O serviço foi editado com sucesso!');
                $servico = Painel::select('tb_site_servicos','id = ?',array($id));
            }  else {
                Painel::alert('erro','Não foi possível atualizar o serviço.');
            }
        }

    ?>
        <div class="form-group">
            <label for="servico">Depoimento</label>
            <textarea  name="servico"><?= $servico['servico'] ?></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="nome_tabela" value="tb_site_servicos">
            <input type="submit" name="acao" value="Atualizar">
        </div>
    </form>
</div>