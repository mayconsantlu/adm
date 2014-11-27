<?php
//session_start();
// Verifica se a variável $_POST não é vazia...
// ou seja: houve um submit no formulário

$msg = 0;
if (isset($_GET['apagar'])) {
    $apagar = $_GET['apagar'];
} else {
    $msg = 3;
}


if (!empty($_POST)) {

    // Verifica se a variável $_POST['titulo'] existe
    if (isset($_POST['confirmar'])) {

        // Verifica se o usuário digitou os dados
        if (!empty($_POST['confirmar'])) {
            //echo $titulo."\n";
            //echo $evento;
            //$sql1 = "insert into tbl_galerias (titulo, obs, data_evento, cadastro) values ('$titulo', '$obs', '$data_evento', now())";

            $query = "select * from tbl_produtos where id = '$apagar';";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    //echo "Apagada imagem ID: ".$resultado['id']." - ".$resultado['titulo'];
                    unlink($resultado['imagem']);
                }
            }
            //}
            //apagafoto($apagar, $conta);
            //$conta = ("select count(id_galeria) from tbl_fotos where id_galeria = '$apagar';");
            /*$query1 = "select * from tbl_produtos where id_produtos = '$apagar';";
            $stmt = $conexao -> prepare($query1);
            $stmt -> execute();
            if($stmt->rowCount()>0){
                while($result = $stmt -> fetch(PDO::FETCH_ASSOC)){
                    $query = ('delete from tbl_fotos where id_produtos = :id;');
                    $stmt = $conexao->prepare($query);
                    // $stmt->bindValue(":apagar", $apagar);
                    $stmt->bindValue(':id', $result['id_produtos']);
                    $stmt->execute();
                    //echo $result['id_galeria'];
                }
            }*/
            $sql1 = "delete from tbl_produtos where id = '$apagar';";
            $stmt = $conexao->prepare($sql1);
            //$stmt -> bindValue('editar', $editar);
            $stmt->execute();
            $msg = 2;
        } else {
            $msg = 1;
        }

    } else {
        echo "O campo 'confirmar' não existe na variável $ POST";
    }

} else {
    //echo "Não houve submit no formulário";
}


?>

<div class="">
    <div class="help-tip">
        <p>Verifique se os dados que você quer apagar são estes mesmos e clique em confirmar, clique em [Cancelar /
            Voltar] para desistir e retornar a listagem.
        </p>
    </div>
    <div class="btn-group btn-group-md panel-body">
        <a href="produtos" class="btn btn-danger" type="button"><em class="glyphicon glyphicon-ban-circle"></em>
            Cancelar / Voltar</a>
    </div>
</div>

<div class="">
    <!-- Alert -->
    <?php if ($msg == 1) { ?>
        <div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <span class="glyphicon glyphicon-warning-sign"></span> Oopss.. <strong>Desculpe!</strong> Os campos não
            podem ficar em branco.
        </div>
    <?php } elseif ($msg == 2) { ?>
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <span class="glyphicon glyphicon-saved"></span> <strong> Oba!</strong> Os dados foram apagados com sucesso,
            clique em Cancelar / Voltar.
        </div>
    <?php } elseif ($msg == 3) { ?>
        <div class="alert alert-dismissable alert-warning">
            <button type="button" class="close " data-dismiss="alert" aria-hidden="true">×</button>
            <span class="glyphicon glyphicon-warning-sign"></span> <strong> Ops..</strong> Voce deve acessar pela página
            de produtos, clique em Cancelar / Voltar.
        </div>
    <?php } ?>
    <!-- Alert -->
    <?php
    $query = "Select * from tbl_produtos where id = '$apagar';";
    $stmt = $conexao->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($stmt->rowCount() > 0) {
        //print_r($resultado);
        ?>
        <form class="form-inline" method="post" action="">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <div class="page-header">
                        <h1>
                            Você realmente deseja APAGAR o produto?
                        </h1>
                        <h4 class="text-warning">Todas os dados e imagem do produto serãm apagados e não será possível
                            recupera-los.</h4>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-6 column">
                    <h3>Titulo do produto</h3>

                    <div class="t-color border border-radius5 padding">
                        <?php echo $resultado['titulo']; ?>
                    </div>
                    <h3>Valor </h3>

                    <div class="t-color border border-radius5 padding">
                        <?php echo 'R$: ' . $resultado['valor']; ?>
                    </div>
                    <h3>Descrição do produto</h3>

                    <div class="t-color border border-radius5 padding">
                        <?php echo $resultado['descricao']; ?>
                    </div>

                </div>
                <div class="col-md-6 column">

                    <h3>Imagem do produto</h3>

                    <div class="t-color border border-radius5 padding">
                        <img src="<?php echo $resultado['imagem']; ?>" alt="<?php echo $resultado['titulo']; ?>"
                             height="100%" class="img-rounded img-responsive">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <div class="form-group">
                        <button id="confirmar" type="submit" name="confirmar" value="confirmar" class="btn btn-success">
                            Confirmar <em class="glyphicon glyphicon-chevron-right"></em></button>
                        <a href="produtos" class="btn btn-danger" type="button"><em
                                class="glyphicon glyphicon-chevron-left"></em> Cancelar</a>
                    </div>
                </div>
                <hr>
            </div>
        </form>
    <?php
    } else {
        ?>
        <div class="alert alert-dismissable alert-warning">
            <button type="button" class="close " data-dismiss="alert" aria-hidden="true">×</button>
            <span class="glyphicon glyphicon-warning-sign"></span> <strong> Ops..</strong> não existem dados para
            mostrar, clique em Cancelar / Voltar.
        </div>
    <?php } ?>
</div>
