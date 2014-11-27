<?php
// seleciona as paginas com base na url passada
$query = "Select * from tbl_secao";
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
        Seções do site<small> Aqui estão listados todos os textos de seções do seu site!</small>
    </h1>
</div>
<div class="help-tip">
    <p>Preencha os dados, confira se estão corretos e clique em salvar.
        Recebendo a mensagem de que os dados foram salvos, clique em [Cancelar / Voltar] para visualizar a listagem.
    </p>
</div>
<div class="btn-group btn-group-md">
    <a href="cria_secao" class="btn btn-success" type="button"><em class="glyphicon glyphicon-plus-sign"></em> Nova seção</a>
    <a href="/secoes" class="btn btn-info" type="button"><em class="glyphicon glyphicon-refresh"></em> Atualizar</a>
</div>
<hr />
<table id="tabela" class="table table-condensed table-hover table-bordered table-responsive border-radius5 display">
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
    ?>
        <tr>
            <td><?php echo $resultado['id']; ?></td>
            <td><?php echo $resultado['titulo']; ?></td>
            <td><?php echo $resultado['slug']; ?></td>
            <td>
                <a class="btn btn-warning btn-sm" href="altera_secao?editar=<?php echo $resultado['id']; ?>" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
                <a class="btn btn-danger btn-sm" href="apaga_secao?apagar=<?php echo $resultado['id']; ?>" title="Excluir"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>