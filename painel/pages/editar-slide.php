<?php

    if(isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $slide = Painel::select('tb_site_slides','id=?',array($id));
    } else {
        Painel::alert('erro','Você precisa passar o parâmetro ID.');
        die();
    }


?>

<div class="box-content">
    <h2><i class="fas fa-user-edit"></i> Editar slide</h2>

    <form method="POST" enctype="multipart/form-data" action="">

    <?php

        if(isset($_POST['acao'])) {
            $nome = $_POST['nome'];
            $imagem = $_FILES['imagem'];
            $imagem_atual = $_POST['imagem_atual'];

            if($imagem['name'] != '') {
                // Existe o upload de imagem
                if(Painel::imagemValida($imagem)) {
                    Painel::deleteFile($imagem_atual);
                    $imagem = Painel::uploadFile($imagem);
                    $arr = ['nome'=>$nome,'slide'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_site_slides'];
                    Painel::update($arr);
                    $slide = Painel::select('tb_site_slides','id=?',array($id));
                    Painel::alert('sucesso','O slide foi editado com sucesso!');
                } else {
                    Painel::alert('erro','O formato da imagem não é válido');
                }
            } else {
                $imagem = $imagem_atual;
                $arr = ['nome'=>$nome,'slide'=>$imagem,'id'=>$id,'nome_tabela'=>'tb_site_slides'];
                Painel::update($arr);
                $slide = Painel::select('tb_site_slides','id=?',array($id));
                Painel::alert('sucesso','O slide foi editado com sucesso!');
            }
        }

    ?>

        <div class="form-group">
            <label for="nome">Nome do slide:</label>
            <input type="text" name="nome" placeholder="Nome" value="<?= $slide['nome'] ?>">
        </div>
        <div class="form-group">
            <label for="nome">Imagem:</label>
            <input type="file" name="imagem">
            <input type="hidden" name="imagem_atual" value="<?= $slide['slide'] ?>">
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar">
        </div>
    </form>
</div>