<?php
// seleciona as paginas com base na url passada
$query = "Select * from tbl_clientes";
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
        Cadastros do site<small> Aqui estão os clientes cadastrados no seu site!</small>
    </h1>
</div>
<div class="help-tip">
    <p>Lista de clientes cadastrados no site.</p>
</div>
<div class="btn-group btn-group-md">
    <a href="novo_cliente" class="btn btn-success" type="button"><em class="glyphicon glyphicon-plus-sign"></em> Novo Cliente</a>
    <a href="imprimeCliente.php" target="_blank"  class="btn btn-primary" type="button"><em class="glyphicon glyphicon-print"></em> Imprimir</a>
    <a href="clientes" class="btn btn-info" type="button"><em class="glyphicon glyphicon-refresh"></em> Atualizar</a>
</div>
<hr />
<table id="tabela" class="table table-condensed table-hover table-bordered table-responsive border-radius5 display responsive">
    <thead>
    <tr class="t-color">
        <th>#</th>
        <th>Nome/Razão</th>
        <th>CNPJ</th>
        <th>Pessoa de contato</th>
        <th>email</th>
        <th>telefone</th>
        <th>Obs:</th>
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
            <td><?php echo $resultado['nome']; ?></td>
            <td><?php echo $resultado['cnpj']; ?></td>
            <td><?php echo $resultado['contato']; ?></td>
            <td><?php echo $resultado['email']; ?></td>
            <td><?php echo $resultado['telefone']; ?></td>
            <td><?php echo $resultado['obs']; ?></td>
            <td>
                <a class="btn btn-warning btn-sm" href="altera_cliente?editar=<?php echo $resultado['id']; ?>" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
                <a class="btn btn-danger btn-sm" href="apaga_cliente?apagar=<?php echo $resultado['id']; ?>" title="Excluir"><span class="glyphicon glyphicon-remove"></span></a>
            </td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>