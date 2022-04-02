<div class="box-content">
    <h2><i class="fas fa-user-edit"></i> Adicionar Serviço</h2>

    <form method="POST" enctype="multipart/form-data" action="">

    <?php

        if(isset($_POST['acao'])) {
            if(Painel::insert($_POST)) {
                Painel::alert('sucesso','O cadastro do serviço foi realizado com sucesso!');
            } else {
                Painel::alert('erro','Ocorreu um erro ao cadastrar.');
            }

        }

    ?>
        <div class="form-group">
            <label for="servico">Serviço:</label>
            <textarea name="servico" id="servico"></textarea>
        </div>
        <div class="form-group">
            <input type="hidden" name="nome_tabela" value="tb_site_servicos">
            <input type="hidden" name="order_id" value="0">
            <input type="submit" name="acao" value="Cadastrar">
        </div>
    </form>
</div>