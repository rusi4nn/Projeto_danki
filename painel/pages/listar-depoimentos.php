<?php

    if(isset($_GET['excluir'])) {
        $idExcluir = intval($_GET['excluir']);
        Painel::deletar('tb_site_depoimentos',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-depoimentos');
    } else if(isset($_GET['order']) && isset($_GET['id'])) {
        Painel::orderItem('tb_site_depoimentos',$_GET['order'],$_GET['id']);
    }

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;

    $depoimentos = Painel::selectAll('tb_site_depoimentos',($paginaAtual - 1) * $porPagina,$porPagina);


?>

<div class="box-content">
    <h2><i class="fas fa-id-badge"></i> Depoimentos Cadastrados</h2>

    <div class="wrapper-table">
        <table>
            <tr>
                <td>Nome</td>
                <td>Data</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
            </tr>

            <?php
                foreach($depoimentos as $key => $value) {
            ?>
                <tr>
                    <td><?= $value['nome'] ?></td>
                    <td><?= $value['data'] ?></td>
                    <td><a class="btn edit" href="<?= INCLUDE_PATH_PAINEL ?>editar-depoimento?id=<?= $value['id'] ?>"><i class="fas fa-edit"></i> Editar</a></td>
                    <td><a actionBtn="delete" class="btn delete" href="<?= INCLUDE_PATH_PAINEL ?>listar-depoimentos?excluir=<?= $value['id'] ?>"><i class="fas fa-trash"></i> Excluir</a></td>
                    <td><a class="btn order" href="<?= INCLUDE_PATH_PAINEL ?>listar-depoimentos?order=up&id=<?= $value['id'] ?>"><i class="fas fa-arrow-up"></i></a></td>
                    <td><a class="btn order" href="<?= INCLUDE_PATH_PAINEL ?>listar-depoimentos?order=down&id=<?= $value['id'] ?>"><i class="fas fa-arrow-down"></i></a></td>
                </tr>

            <?php } ?>

        </table>
    </div>

    <div class="paginacao">
        <?php
            $totalPaginas = ceil(count(Painel::selectAll('tb_site_depoimentos')) / $porPagina);

            for($i = 1; $i <= $totalPaginas; $i++) {
                if($i == $paginaAtual) {
                    echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
                } else {
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-depoimentos?pagina='.$i.'">'.$i.'</a>';
                }
            }

        ?>
    </div>
</div>