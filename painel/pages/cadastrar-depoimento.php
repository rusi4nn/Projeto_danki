<div class="box-content">
    <h2><i class="fas fa-user-edit"></i> Adicionar depoimentos</h2>

    <form method="POST" enctype="multipart/form-data" action="">

    <?php

        if(isset($_POST['acao'])) {
            if(Painel::insert($_POST)) {
                Painel::alert('sucesso','O cadastro do depoimento foi realizado com sucesso!');
            } else {
                Painel::alert('erro','Ocorreu um erro ao cadastrar.');
            }

        }

    ?>

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" placeholder="Nome do autor...">
        </div>
        <div class="form-group">
            <label for="depoimento">Depoimento</label>
            <textarea name="depoimento"></textarea>
        </div>
        <div class="form-group">
            <label for="data">Data</label>
            <input type="text" formato="data" name="data">
        </div>
        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site_depoimentos">
            <input type="hidden" name="order_id" value="0">
            <input type="submit" name="acao" value="Cadastrar">
        </div>
    </form>
</div>