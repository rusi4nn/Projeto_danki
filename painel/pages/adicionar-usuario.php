<?php
    verificaPermissaoPagina(2);
?>

<div class="box-content">
    <h2><i class="fas fa-user-edit"></i> Cadastrar usuário</h2>

    <form method="POST" enctype="multipart/form-data" action="">

    <?php

        if(isset($_POST['acao'])) {
            $nome = $_POST['nome'];
            $user = $_POST['user'];
            $password = $_POST['password'];
            $imagem = $_FILES['imagem'];
            $cargo = $_POST['cargo'];

            if($nome == '') {
                Painel::alert('erro','Nome está vazio.');
            } else if ($user == '') {
                Painel::alert('erro','Usuario está vazio.');
            } else if($password == '') {
                Painel::alert('erro','Senha está vazia.');
            } else if ($cargo == '') {
                Painel::alert('erro','Você precisa selecionar o cargo.');
            } else {
                if($cargo >= $_SESSION['cargo']) {
                    Painel::alert('erro','Você precisa selecionar um cargo menor que o seu.');
                } else if($imagem['name'] != '' && Painel::imagemValida($imagem) == false) {
                    Painel::alert('erro','O formato especificado não está correto.');
                } else if(Usuario::userExists($user)) {
                    Painel::alert('erro','O Usuário já existe');
                } else {
                    // Apenas cadastrar no banco!
                    $imagem = Painel::uploadFile($imagem);
                    Usuario::cadastrarUsuario($user,$password,$imagem,$nome,$cargo);

                    Painel::alert('sucesso','O cadastro do usuário:<b> '.$user.'</b> foi feito com sucesso!');
                }
            }

        }

    ?>

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" placeholder="Nome Completo...">
        </div>
        <div class="form-group">
            <label for="user">Usuário</label>
            <input type="text" name="user" placeholder="Usuário para login...">
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" name="password" placeholder="Senha...">
        </div>
        <div class="form-group">
            <label for="cargo">Cargo:</label>
            <select name="cargo" id="">
                <?php

                    foreach(Painel::$cargos as $key => $value) {
                        if($key < $_SESSION['cargo']) {
                            echo '<option value="'.$key.'">'.$value.'</option>';
                        }
                    }

                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="nome">Imagem:</label>
            <input type="file" name="imagem">
        </div>
        <div class="form-group">
            <input type="submit" name="acao" value="Cadastrar">
        </div>
    </form>
</div>