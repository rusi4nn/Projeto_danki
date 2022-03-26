<?php

    if(isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $depoimento = Painel::select('tb_site_depoimentos','id = ?',array($id));
    } else {
        Painel::alert('erro','Você precisa passsar o parametro ID.');
        die();
    }

?>

<div class="box-content">
    <h2><i class="fas fa-user-edit"></i> Editar depoimento</h2>

    <form method="POST" enctype="multipart/form-data" action="">

    <?php

        if(isset($_POST['acao'])) {
            if(Painel::update($_POST)) {
                Painel::alert('sucesso','O depoimento foi editado com sucesso!');
                $depoimento = Painel::select('tb_site_depoimentos','id = ?',array($id));
            }  else {
                Painel::alert('erro','Não foi possível atualizar o depoimento.');
            }
        }

    ?>

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?= $depoimento['nome'] ?>" placeholder="Nome do autor...">
        </div>
        <div class="form-group">
            <label for="depoimento">Depoimento</label>
            <textarea  name="depoimento"><?= $depoimento['depoimento'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="data">Data</label>
            <input type="text" value="<?= $depoimento['data'] ?>" formato="data" name="data">
        </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="nome_tabela" value="tb_site_depoimentos">
            <input type="submit" name="acao" value="Atualizar">
        </div>
    </form>
</div>