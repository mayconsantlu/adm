<?php
// seleciona as paginas com base na url passada
$query = "Select * from tbl_produtos";
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
        Produtos ou Serviços do site<small> Aqui estão listadas as imagens e textos de portfólio do seu site!</small>
    </h1>
</div>
<div class="help-tip">
    <p>Aqui você pode inserir, alterar ou apagar os produtos, recomenda-se que as imagens não ultrapassem 5mb</p>
</div>
<div class="btn-group btn-group-md">
    <a href="cria_produto" class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus-sign"></i> Novo produto</a>
    <a href="produtos" class="btn btn-info" type="button"><i class="glyphicon glyphicon-refresh"></i> Atualizar</a>
</div>
<hr />
<table id="tabela" class="table table-condensed table-hover table-bordered table-responsive border-radius5 display">
    <thead>
    <tr class="t-color">
        <th>#</th>
        <th>Titulo</th>
        <th>imagem</th>
        <th>descição</th>
        <th>valor</th>
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
            <td>
                <div id="links" class="text-center">
                    <a href="http://<?=$_SERVER["HTTP_HOST"];?>/<?php echo $resultado['imagem']; ?>" title="<?php echo $resultado['titulo']; ?>" data-gallery>
                       <img src="http://<?=$_SERVER["HTTP_HOST"];?>/<?php echo $resultado['imagem']; ?>" alt="<?php echo $resultado['titulo']; ?>" height="30px">
                    </a>
                </div>
            </td>
            <td><?php echo $resultado['descricao']; ?></td>
            <td><?php echo $resultado['valor']; ?></td>
            <td>
                <a class="btn btn-warning btn-sm" href="http://<?=$_SERVER["HTTP_HOST"];?>/admin/altera_produto/<?php echo $resultado['id']; ?>" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
                <a class="btn btn-danger btn-sm" href="http://<?=$_SERVER["HTTP_HOST"];?>/admin/apaga_produto/<?php echo $resultado['id']; ?>" title="Excluir"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>