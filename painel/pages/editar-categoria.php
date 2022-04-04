<?php

    if(isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $categoria = Painel::select('tb_site_categorias','id = ?',array($id));
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
            $slug = Painel::generateSlug($_POST['nome']);
            $arr = array_merge($_POST,array('slug'=>$slug));
            $verificar = MySql::conectar()->prepare("SELECT * FROM `tb_site_categorias` WHERE nome = ? AND id != ?");
            $verificar->execute(array($_POST['nome'],$id));
            if($verificar->rowCount() == 1) {
                Painel::alert('erro','Já existe uma categoria com este nome.');
            } else {
                if(Painel::update($arr)) {
                    Painel::alert('sucesso','A categoria foi editada com sucesso!');
                    $categoria = Painel::select('tb_site_categorias','id = ?',array($id));
                }  else {
                    Painel::alert('erro','Não foi possível atualizar a categoria.');
                }
            }
        }

    ?>
       <div class="form-group">
            <label for="">Nome da categoria:</label>
            <input type="text" name="nome" value="<?= $categoria['nome'] ?>">
       </div>
        <div class="form-group">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="nome_tabela" value="tb_site_categorias">
            <input type="submit" name="acao" value="Atualizar">
        </div>
    </form>
</div>