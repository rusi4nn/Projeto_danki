<?php

    if(isset($_GET['excluir'])) {
        $idExcluir = intval($_GET['excluir']);
        $selectImagem = MySql::conectar()->prepare("SELECT slide FROM `tb_site_slides` WHERE id = ?");
        $selectImagem->execute(array($_GET['excluir']));
        $imagem = $selectImagem->fetch()['slide'];
        Painel::deleteFile($imagem);
        Painel::deletar('tb_site_slides',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-slides');
    } else if(isset($_GET['order']) && isset($_GET['id'])) {
        Painel::orderItem('tb_site_slides',$_GET['order'],$_GET['id']);
    }

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;

    $slides = Painel::selectAll('tb_site_slides',($paginaAtual - 1) * $porPagina,$porPagina);


?>

<div class="box-content">
    <h2><i class="fas fa-id-badge"></i> Slides Cadastrados</h2>

    <div class="wrapper-table">
        <table>
            <tr>
                <td>Nome</td>
                <td>Imagem</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
            </tr>

            <?php
                foreach($slides as $key => $value) {
            ?>
                <tr>
                    <td><?= $value['nome'] ?></td>
                    <td><img src="<?= INCLUDE_PATH_PAINEL ?>uploads/<?= $value['slide'] ?>" style="height:50px;width:50px;"></td>
                    <td><a class="btn edit" href="<?= INCLUDE_PATH_PAINEL ?>editar-slide?id=<?= $value['id'] ?>"><i class="fas fa-edit"></i> Editar</a></td>
                    <td><a actionBtn="delete" class="btn delete" href="<?= INCLUDE_PATH_PAINEL ?>listar-slides?excluir=<?= $value['id'] ?>"><i class="fas fa-trash"></i> Excluir</a></td>
                    <td><a class="btn order" href="<?= INCLUDE_PATH_PAINEL ?>listar-slides?order=up&id=<?= $value['id'] ?>"><i class="fas fa-arrow-up"></i></a></td>
                    <td><a class="btn order" href="<?= INCLUDE_PATH_PAINEL ?>listar-slides?order=down&id=<?= $value['id'] ?>"><i class="fas fa-arrow-down"></i></a></td>
                </tr>

            <?php } ?>

        </table>
    </div>

    <div class="paginacao">
        <?php
            $totalPaginas = ceil(count(Painel::selectAll('tb_site_slides')) / $porPagina);

            for($i = 1; $i <= $totalPaginas; $i++) {
                if($i == $paginaAtual) {
                    echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
                } else {
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-slides?pagina='.$i.'">'.$i.'</a>';
                }
            }

        ?>
    </div>
</div>