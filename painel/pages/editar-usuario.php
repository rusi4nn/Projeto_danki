<div class="box-content">
    <h2><i class="fas fa-user-edit"></i> Editar usuário</h2>

    <form method="POST" enctype="multipart/form-data" action="">

    <?php

        if(isset($_POST['acao'])) {
            $nome = $_POST['nome'];
            $password = $_POST['password'];
            $imagem = $_FILES['imagem'];
            $imagem_atual = $_POST['imagem_atual'];
            $usuario = new Usuario();

            if($imagem['name'] != '') {
                // Existe o upload de imagem
                if(Painel::imagemValida($imagem)) {
                    Painel::deleteFile($imagem_atual);
                    $imagem = Painel::uploadFile($imagem);
                    if($usuario->atualizarUsuario($nome,$password,$imagem)) {
                        $_SESSION['imagem'] = $imagem;
                        Painel::alert('sucesso','Atualizado com sucesso.');
                    } else {
                        Painel::alert('erro','Ocorreu um erro ao atualizar.');
                    }
                } else {
                    Painel::alert('erro','O formato da imagem não é válido');
                }
            } else {
                $imagem = $imagem_atual;
                if($usuario->atualizarUsuario($nome,$password,$imagem)) {
                    Painel::alert('sucesso','Atualizado com sucesso.');
                } else {
                    Painel::alert('erro','Ocorreu um erro ao atualizar.');
                }
            }
        }

    ?>

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" placeholder="Nome Completo..." value="<?= $_SESSION['nome'] ?>">
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="password" placeholder="Senha..." value="<?= $_SESSION['password'] ?>">
        </div>
        <div class="form-group">
            <label for="nome">Imagem:</label>
            <input type="file" name="imagem">
            <input type="hidden" name="imagem_atual" value="<?= $_SESSION['imagem'] ?>">
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Atualizar">
        </div>
    </form>
</div>