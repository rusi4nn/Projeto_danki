<div class="box-content">
    <h2><i class="fas fa-user-edit"></i> Cadastrar slide</h2>

    <form method="POST" enctype="multipart/form-data" action="">

    <?php

        if(isset($_POST['acao'])) {
            $nome = $_POST['nome'];
            $imagem = $_FILES['imagem'];

            if($nome == '') {
                Painel::alert('erro','Nome está vazio.');
            } else {
                if($imagem['name'] != '' && Painel::imagemValida($imagem) == false) {
                    Painel::alert('erro','O formato especificado não está correto.');
                } else {
                    // Apenas cadastrar no banco!
                    require_once('../classes/lib/WideImage.php');
                    $imagem = Painel::uploadFile($imagem);
                    //WideImage::load('uploads/'.$imagem)->resize(100)->saveToFile('uploads/'.$imagem);
                    $arr = ['nome'=>$nome,'slide'=>$imagem,'order_id'=>'0','nome_tabela'=>'tb_site_slides'];
                    Painel::insert($arr);
                    Painel::alert('sucesso','O cadastro do slide:<b> '.$nome.'</b> foi feito com sucesso!');
                }
            }

        }

    ?>

        <div class="form-group">
            <label for="nome">Nome do slide:</label>
            <input type="text" name="nome" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="imagem">Imagem:</label>
            <input type="file" name="imagem">
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Cadastrar">
        </div>
    </form>
</div>