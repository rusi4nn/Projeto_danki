<?php

    if(isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $noticia = Painel::select('tb_site_noticias','id=?',array($id));
    } else {
        Painel::alert('erro','Você precisa passar o parâmetro ID.');
        die();
    }


?>

<div class="box-content">
    <h2><i class="fas fa-user-edit"></i> Editar notícia</h2>

    <form method="POST" enctype="multipart/form-data" action="">

    <?php

        if(isset($_POST['acao'])) {
            $categoria_id = $_POST['categoria_id'];
            $titulo = $_POST['titulo'];
            $conteudo = $_POST['conteudo'];
            $capa = $_FILES['capa'];
            $capa_atual = $_POST['capa_atual'];

            $verifica = MySql::conectar()->prepare("SELECT id FROM `tb_site_noticias` WHERE titulo = ? AND categoria_id = ? AND id != ?");
            $verifica->execute(array($titulo,$categoria_id,$id));
            if($verifica->rowCount() == 0) {
                if($capa['name'] != '') {
                    // Existe o upload de imagem
                    if(Painel::imagemValida($capa)) {
                        Painel::deleteFile($capa_atual);
                        $capa = Painel::uploadFile($capa);
                        $slug = Painel::generateSlug($titulo);
                        $arr = ['id'=>$id,'categoria_id'=>$categoria_id,'data'=>date('Y-m-d'),'titulo'=>$titulo,'conteudo'=>$conteudo,'capa'=>$capa,'slug'=>$slug,'order_id'=>'0','nome_tabela'=>'tb_site_noticias'];
                        Painel::update($arr);
                        $noticia = Painel::select('tb_site_noticias','id=?',array($id));
                        Painel::alert('sucesso','A notícia foi editada com sucesso!');
                    } else {
                        Painel::alert('erro','O formato da imagem não é válido');
                    }
                } else {
                    $capa = $capa_atual;
                    $slug = Painel::generateSlug($titulo);
                    $arr = ['id'=>$id,'categoria_id'=>$categoria_id,'data'=>date('Y-m-d'),'titulo'=>$titulo,'conteudo'=>$conteudo,'capa'=>$capa,'slug'=>$slug,'order_id'=>'0','nome_tabela'=>'tb_site_noticias'];
                    Painel::update($arr);
                    $noticia = Painel::select('tb_site_noticias','id=?',array($id));
                    Painel::alert('sucesso','A notícia foi editada com sucesso!');
                }
            } else {
                Painel::alert('erro','Já existe uma notícia com esse nome.');
            }
        }

    ?>

        <div class="form-group">
            <label for="">Categoria:</label>
            <select name="categoria_id" id="">
                <?php 
                    $categorias = Painel::selectAll('tb_site_categorias');
                    foreach($categorias as $key => $value) {
                ?>
                    <option <?php if(isset($noticia['categoria_id']) && $noticia['categoria_id'] == $value['id']) echo 'selected'; ?> value="<?= $value['id'] ?>"><?= $value['nome'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Titulo da notícia:</label>
            <input type="text" name="titulo" placeholder="Título..." value="<?= $noticia['titulo'] ?>">
        </div>
        <div class="form-group">   
            <label for="conteudo">Conteúdo:</label>
            <textarea class="tinymce" name="conteudo"><?= $noticia['conteudo'] ?></textarea>
        </div>
        <div class="form-group">
            <label for="capa">Capa:</label>
            <input type="file" name="capa">
            <input type="hidden" name="capa_atual" value="<?= $noticia['capa'] ?>">
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar">
        </div>
    </form>
</div>