<?php

    if(isset($_GET['excluir'])) {
        $idExcluir = intval($_GET['excluir']);
        Painel::deletar('tb_site_servicos',$idExcluir);
        Painel::redirect(INCLUDE_PATH_PAINEL.'listar-servicos');
    } else if(isset($_GET['order']) && isset($_GET['id'])) {
        Painel::orderItem('tb_site_servicos',$_GET['order'],$_GET['id']);
    }

    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $porPagina = 4;

    $servicos = Painel::selectAll('tb_site_servicos',($paginaAtual - 1) * $porPagina,$porPagina);


?>

<div class="box-content">
    <h2><i class="fas fa-id-badge"></i> Serviços Cadastrados</h2>

    <div class="wrapper-table">
        <table>
            <tr>
                <td>Nome</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
                <td>#</td>
            </tr>

            <?php
                foreach($servicos as $key => $value) {
            ?>
                <tr>
                    <td><?= $value['servico'] ?></td>
                    <td><a class="btn edit" href="<?= INCLUDE_PATH_PAINEL ?>editar-servico?id=<?= $value['id'] ?>"><i class="fas fa-edit"></i> Editar</a></td>
                    <td><a actionBtn="delete" class="btn delete" href="<?= INCLUDE_PATH_PAINEL ?>listar-servicos?excluir=<?= $value['id'] ?>"><i class="fas fa-trash"></i> Excluir</a></td>
                    <td><a class="btn order" href="<?= INCLUDE_PATH_PAINEL ?>listar-servicos?order=up&id=<?= $value['id'] ?>"><i class="fas fa-arrow-up"></i></a></td>
                    <td><a class="btn order" href="<?= INCLUDE_PATH_PAINEL ?>listar-servicos?order=down&id=<?= $value['id'] ?>"><i class="fas fa-arrow-down"></i></a></td>
                </tr>

            <?php } ?>

        </table>
    </div>

    <div class="paginacao">
        <?php
            $totalPaginas = ceil(count(Painel::selectAll('tb_site_servicos')) / $porPagina);

            for($i = 1; $i <= $totalPaginas; $i++) {
                if($i == $paginaAtual) {
                    echo '<a class="page-selected" href="'.INCLUDE_PATH_PAINEL.'listar-servicos?pagina='.$i.'">'.$i.'</a>';
                } else {
                    echo '<a href="'.INCLUDE_PATH_PAINEL.'listar-servicos?pagina='.$i.'">'.$i.'</a>';
                }
            }

        ?>
    </div>
</div>