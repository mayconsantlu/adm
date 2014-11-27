<?php
date_default_timezone_set('America/Sao_Paulo');
require_once('config.php');
//seleciona dados
$query = "Select * from tbl_clientes";
//$stmt = $conexao->query($query);
$stmt = $conexao->prepare($query);
//$stmt -> bindValue("rota", $rota);
$stmt->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Impressão de listagem de clientes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Maycon Luczynski">
    <meta name="robots" content="noindex, nofollow">

    <!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
    <!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
    <!--script src="js/less-1.3.3.min.js"></script-->
    <!--append ‘#!watch’ to the browser URL, then refresh the page.-->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <!--link href="css/style.css" rel="stylesheet"-->
    <link rel="stylesheet" href="css/print.css" media="print">
    <link href='http://fonts.googleapis.com/css?family=Lato|Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <style type="text/css">
        @media print {
            .notprint {
                visibility: hidden;
            }

            .table {
                width: 100%;
            }

            .container {
                width: 100%;
            }
        }
    </style>

</head>
<body>
<div class="container">
    <div class="row clearfix">
        <h3>Imprimir todos os clientes cadastrados no site</h3>

        <div class="btn-group btn-group-md notprint">
            <a id='botao-print' target="_blank" class="btn btn-primary" type="button"><em class="glyphicon glyphicon-print"></em> Imprimir</a>
            <a href="javascript:window.close()" class="btn btn-warning" type="button" ><em class="glyphicon glyphicon-remove"></em>Fechar</a>
        </div>
    </div>
    <br>
    <div class="row clearfix">
        <table id="tabela" class="table table-condensed table-hover table-bordered table-responsive">
            <thead>
            <tr class="t-color">
                <th>#</th>
                <th>Nome/Razão</th>
                <th>CNPJ</th>
                <th>Pessoa de contato</th>
                <th>email</th>
                <th>telefone</th>
                <th>Obs:</th>
                <th>Data de cadastro</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Mostra os paginas
            //foreach($resultado as $paginas) {
            while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
                    <td><?php
                        $data = $resultado['cadastro'];
                        echo date('d/m/Y', strtotime($data)); ?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">
    var btn_print = document.querySelector('#botao-print');
    console.log(btn_print);
    btn_print.addEventListener('click', function () {
        print();
    })
</script>
</body>
</html>