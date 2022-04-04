<div class="box-content">
    <h2><i class="fas fa-user-edit"></i> Cadastrar Categoria</h2>

    <form method="POST" enctype="multipart/form-data" action="">

    <?php

        if(isset($_POST['acao'])) {
            $nome = $_POST['nome'];

            if($nome == '') {
                Painel::alert('erro','Nome está vazio.');
            } else {

                // Apenas cadastrar no banco!
                $verifica = MySql::conectar()->prepare("SELECT * FROM `tb_site_categorias` WHERE nome = ?");
                $verifica->execute(array($nome));
                if($verifica->rowCount() == 0) {
                    $slug = Painel::generateSlug($nome);
                    $arr = ['nome'=>$nome,'slug'=>$slug,'order_id'=>'0','nome_tabela'=>'tb_site_categorias'];
                    Painel::insert($arr);
                    Painel::alert('sucesso','O cadastro da categoria:<b> '.$nome.'</b> foi feito com sucesso!');
                } else {
                    Painel::alert('erro','Já existe uma categoria com este nome.');
                }
            }

        }

    ?>

        <div class="form-group">
            <label for="nome">Nome da categoria:</label>
            <input type="text" name="nome" placeholder="Nome">
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Cadastrar">
        </div>
    </form>
</div>