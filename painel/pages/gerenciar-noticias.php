<?php

    if(isset($_GET['excluir'])) {
        $idExcluir = intval($_GET['excluir']);
        $selectImagem = MySql::conectar()->prepare("SELECT capa FROM `tb_site_noticias` WHERE id = ?");
        $selectImagem->execute(array($_GET['excluir']));
        $imagem = $selectImagem->fetch()['capa'];
        Painel::deleteFile($imagem);
        Painel::deletar('tb_site_noticias',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'gerenciar-noticias');
    } else if(isset($_GET['order']) && isset($_GET['id'])) {
        Painel::orderItem('tb_site_noticias',$_GET['order'],$_GET['id']);
    }

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;

    $noticias = Painel::selectAll('tb_site_noticias',($paginaAtual - 1) * $porPagina,$porPagina);


?>

<div class="box-content">
    <h2><i class="fas fa-id-badge"></i> Notícias Cadastradas</h2>

    <div class="wrapper-table">
        <table>
            <tr>
                <td>Título</td>
                <td>Categoria</td>
                <td>Imagem</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
            </tr>

            <?php
                foreach($noticias as $key => $value) {
                $nomeCategoria = Painel::select('tb_site_categorias','id=?',array($value['categoria_id']))['nome'];
            ?>
                <tr>
                    <td><?= $value['titulo'] ?></td>
                    <td><?= $nomeCategoria ?></td>
                    <td><img src="<?= INCLUDE_PATH_PAINEL ?>uploads/<?= $value['capa'] ?>" style="height:50px;width:50px;"></td>
                    <td><a class="btn edit" href="<?= INCLUDE_PATH_PAINEL ?>editar-noticia?id=<?= $value['id'] ?>"><i class="fas fa-edit"></i> Editar</a></td>
                    <td><a actionBtn="delete" class="btn delete" href="<?= INCLUDE_PATH_PAINEL ?>gerenciar-noticias?excluir=<?= $value['id'] ?>"><i class="fas fa-trash"></i> Excluir</a></td>
                    <td><a class="btn order" href="<?= INCLUDE_PATH_PAINEL ?>gerenciar-noticias?order=up&id=<?= $value['id'] ?>"><i class="fas fa-arrow-up"></i></a></td>
                    <td><a class="btn order" href="<?= INCLUDE_PATH_PAINEL ?>gerenciar-noticias?order=down&id=<?= $value['id'] ?>"><i class="fas fa-arrow-down"></i></a></td>
                </tr>

            <?php } ?>

        </table>
    </div>

    <div class="paginacao">
        <?php
            $totalPaginas = ceil(count(Painel::selectAll('tb_site_noticias')) / $porPagina);

            for($i = 1; $i <= $totalPaginas; $i++) {
                if($i == $paginaAtual) {
                    echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'gerenciar-noticias?pagina='.$i.'">'.$i.'</a>';
                } else {
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'gerenciar-noticias?pagina='.$i.'">'.$i.'</a>';
                }
            }

        ?>
    </div>
</div>