<?php

    $site = Painel::select('tb_site_config',false);

?>
<div class="box-content">
    <h2><i class="fas fa-user-edit"></i> Editar Configurações do site</h2>

    <form method="POST" enctype="multipart/form-data" action="">

    <?php

        if(isset($_POST['acao'])) {
            if(Painel::update($_POST, true)) {
                Painel::alert('sucesso','O site foi editado com sucesso!');
                $site = Painel::select('tb_site_config',false);
            }  else {
                Painel::alert('erro','Não foi possível atualizar o site.');
            }
        }
    ?>
        <div class="form-group">
            <label for="">Título do site:</label>
            <input type="text" name="titulo" value="<?= $site['titulo'] ?>">
        </div>
        <div class="form-group">
            <label for="">Nome do autor:</label>
            <input type="text" name="nome_autor" value="<?= $site['nome_autor'] ?>">
        </div>
        <div class="form-group">
            <label for="servico">Descrição do autor:</label>
            <textarea  name="descricao"><?= $site['descricao'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="">Ícone 1:</label>
            <input type="text" name="icone1" value="<?= $site['icone1'] ?>">
        </div>
        <div class="form-group">
            <label for="">Descrição 1:</label>
            <textarea name="descricao1"><?= $site['descricao1'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="">Ícone 2:</label>
            <input type="text" name="icone2" value="<?= $site['icone2'] ?>">
        </div>
        <div class="form-group">
            <label for="">Descrição 2:</label>
            <textarea name="descricao2"><?= $site['descricao2'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="">Ícone 3:</label>
            <input type="text" name="icone3" value="<?= $site['icone3'] ?>">
        </div>
        <div class="form-group">
            <label for="">Descrição 3:</label>
            <textarea name="descricao3"><?= $site['descricao3'] ?></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site_config">
            <input type="submit" name="acao" value="Atualizar">
        </div>
    </form>
</div>