<?php
// seleciona as paginas com base na url passada
    $query = "Select * from tbl_paginas";
    //$stmt = $conexao->query($query);
    $stmt = $conexao -> prepare($query);
    //$stmt -> bindValue("rota", $rota);
    $stmt -> execute();
    //$resultado = $stmt -> fetch(PDO::FETCH_ASSOC);
    //$_SESSION['id']=$resultado['id'];
    //$_SESSION['titulo']=$resultado['titulo'];
    //print_r($resultado)."\n";
    //$result = count($resultado);
//echo $result;
?>
<div class="page-header">
    <h1>
        Páginas do site<small> Aqui estão listadas todas as páginas do seu site!</small>
    </h1>
</div>
<div class="help-tip">
    <p>Texto de Ajuda</p>
</div>
<div class="btn-group btn-group-md">
    <a href="cria_pagina" class="btn btn-success" type="button"><em class="glyphicon glyphicon-plus-sign"></em> Nova página</a>
    <a href="/paginas" class="btn btn-info" type="button"><em class="glyphicon glyphicon-refresh"></em> Atualizar</a>
</div>
<hr />
<table class="table table-condensed table-hover table-bordered table-responsive border-radius5">
        <thead>
        <tr class="t-color">
            <th>#</th>
            <th>Titulo</th>
            <th>slug</th>
            <th>ação</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // Mostra os paginas
        //foreach($resultado as $paginas) {
        while($resultado = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            //echo $resultado['id']. ' - '. $resultado['titulo'] . ' - ' . $resultado['slug'] . '';
        //}

        ?>
        <tr>
            <td><?php echo $resultado['id']; ?></td>
            <td><?php echo $resultado['titulo']; ?></td>
            <td><?php echo $resultado['slug']; ?></td>
            <td>
                <a class="btn btn-warning btn-sm" href="altera_pagina?editar=<?php echo $resultado['id']; ?>" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
                <a class="btn btn-danger btn-sm" href="apaga_pagina?apagar=<?php echo $resultado['id']; ?>" title="Excluir"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>