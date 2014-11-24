<?php
// seleciona as paginas com base na url passada
$query = "Select * from tbl_galerias";
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
        Galerias de Foto do site<small> Aqui estão listadas todas as galerias de foto do seu site!</small>
    </h1>
</div>
<div class="help-tip">
    <p>Ao inserir as fotos clique em Cancelar / Voltar, depois para visualizar as mesmas clique em visualisar na coluna "ação"</p>
</div>
<div class="btn-group btn-group-md">
    <a href="cria_galeria" class="btn btn-success" type="button"><em class="glyphicon glyphicon-plus-sign"></em> Nova Galeria</a>
    <a href="/galerias" class="btn btn-info" type="button"><em class="glyphicon glyphicon-refresh"></em> Atualizar</a>
</div>
<hr />
<table id="tabela" class="table table-condensed table-hover table-bordered table-responsive border-radius5 display">
    <thead>
    <tr class="t-color">
        <th>#</th>
        <th>Titulo</th>
        <th>Descrição rápida</th>
        <th>Data do evento</th>
        <th>Ação</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Mostra os paginas
    //foreach($resultado as $paginas) {
    while($resultado = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    ?>
    <tr>
        <td><?php echo $resultado['id']; ?></td>
        <td><?php echo $resultado['titulo']; ?></td>
        <td><?php echo $resultado['obs']; ?></td>
        <td><?php echo $resultado['data_evento']; ?></td>
        <td>
            <a class="btn btn-success btn-sm" href="galeria/index.php?inserir=<?php echo $resultado['id']; ?>&titulo=<?php echo $resultado['titulo']; ?>" title="Inserir fotos"><span class="glyphicon glyphicon-camera"></span></a>
            <a class="btn btn-info btn-sm" href="mostra_galeria?visualizar=<?php echo $resultado['id']; ?>" title="Visualizar"><span class="glyphicon glyphicon-picture"></span></a>
            <a class="btn btn-warning btn-sm" href="altera_galeria?editar=<?php echo $resultado['id']; ?>" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
            <a class="btn btn-danger btn-sm" href="apaga_galeria?apagar=<?php echo $resultado['id']; ?>" title="Excluir"><span class="glyphicon glyphicon-remove"></span></a>
        </td>
    </tr>
    <?php
    }
    ?>
    </tbody>
</table>