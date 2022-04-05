<div class="box-content">
    <h2><i class="fas fa-user-edit"></i> Cadastrar Notícia</h2>

    <form method="POST" enctype="multipart/form-data" action="">

    <?php

        if(isset($_POST['acao'])) {
            $categoria_id = $_POST['categoria_id'];
            $titulo = $_POST['titulo'];
            $conteudo = $_POST['conteudo'];
            $capa = $_FILES['capa'];

            if($titulo == '' || $conteudo == '') {
                Painel::alert('erro','Campos vázios não são permitidos');
            } else if ($capa['tmp_name'] == '') {
                Painel::alert('erro','A imagem de capa precisa ser selecionada.');
            } else {
                if(Painel::imagemValida($capa)) {
                    $verifica = MySql::conectar()->prepare("SELECT * FROM `tb_site_noticias` WHERE titulo = ? AND categoria_id = ?");
                    $verifica->execute(array($titulo,$categoria_id));
                    if($verifica->rowCount() == 0) {
                        $imagem = Painel::uploadFile($capa);
                        $slug = Painel::generateSlug($titulo);
                        $arr = ['categoria_id'=>$categoria_id,'data'=>date('Y-m-d'),'titulo'=>$titulo,'conteudo'=>$conteudo,'capa'=>$imagem,'slug'=>$slug,'order_id'=>'0','nome_tabela'=>'tb_site_noticias'];
                        if(Painel::insert($arr)) {
                            Painel::redirect(INCLUDE_PATH_PAINEL.'cadastrar-noticias?sucesso');
                            // Painel::alert('sucesso','A notícia foi cadastrada com sucesso!');
                        } else {
                            Painel::alert('erro','Não foi possível cadastrar a notícia.');
                        }
                    } else {
                        Painel::alert('erro','Já existe uma notícia com esse nome');
                    }
                } else {
                    Painel::alert('erro','A imagem não é valida.');
                }
            }

        }

        if(isset($_GET['sucesso']) && !isset($_POST['acao'])) {
            Painel::alert('sucesso','A notícia foi cadastrada com sucesso.');
        }
    ?>

        <div class="form-group">
            <label for="">Categoria:</label>
            <select name="categoria_id" id="">
                <?php 
                    $categorias = Painel::selectAll('tb_site_categorias');
                    foreach($categorias as $key => $value) {
                ?>
                    <option <?php if(isset($_POST['categoria_id']) && $_POST['categoria_id'] == $value['id']) echo 'selected'; ?> value="<?= $value['id'] ?>"><?= $value['nome'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="<?= recoverPost('titulo') ?>" placeholder="Título da notícia...">
        </div>
        <div class="form-group">
            <label for="conteudo">Conteúdo:</label>
            <textarea class="tinymce" name="conteudo"><?= recoverPost('conteudo') ?></textarea>
        </div>
        <div class="form-group">
            <label for="capa">Capa:</label>
            <input type="file" name="capa">
        </div>
        <div class="form-group">
            <input type="hidden" name="order_id" value="0">
            <input type="hidden" name="nome_tabela" value="tb_site_noticias">
            <input type="submit" name="acao" value="Cadastrar">
        </div>
    </form>
</div>