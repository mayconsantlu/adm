<?php
//session_start();
// Verifica se a variável $_POST não é vazia...
// ou seja: houve um submit no formulário

$msg = 0;
if (isset($_GET['apagar'])) {
    $apagar = $_GET['apagar'];
}else {
    $msg = 3;
}



if (!empty($_POST)) {

    // Verifica se a variável $_POST['titulo'] existe
    if (isset($_POST['confirmar'])) {

        // Verifica se o usuário digitou os dados
        if (!empty($_POST['confirmar'])) {
            $sql1 = "delete from tbl_paginas where id = '$apagar';";
            $stmt = $conexao->prepare($sql1);
            //$stmt -> bindValue('editar', $editar);
            $stmt->execute();
            $msg = 2;
        } else {
            $msg = 1;
        }

    } else {
        echo "Sem informações para apagar";
    }

} else {
    //echo "Não houve submit no formulário";
}


?>

<div class="container">
    <div class="help-tip">
        <p>Verifique se os dados que você quer apagar são estes mesmos e clique em confirmar, clique em [Cancelar / Voltar] para desistir e retornar a listagem.
        </p>
    </div>
    <div class="btn-group btn-group-md panel-body">
        <a href="paginas" class="btn btn-danger" type="button"><em class="glyphicon glyphicon-ban-circle"></em> Cancelar / Voltar</a>
    </div>
</div>

<div class="container">
    <!-- Alert -->
    <?php if ($msg == 1){ ?>
        <div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <span class="glyphicon glyphicon-warning-sign"></span> Oopss.. <strong>Desculpe!</strong> Os campos não podem ficar em branco.
        </div>
    <?php } elseif ($msg == 2) { ?>
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <span class="glyphicon glyphicon-saved"></span> <strong> Oba!</strong> Os dados foram apagados com sucesso, clique em Cancelar / Voltar.
        </div>
    <?php } elseif ($msg == 3) { ?>
        <div class="alert alert-dismissable alert-warning">
            <button type="button" class="close " data-dismiss="alert" aria-hidden="true">×</button>
            <span class="glyphicon glyphicon-warning-sign"></span> <strong> Ops..</strong> Voce deve acessar pela página de páginas, clique em Cancelar / Voltar.
        </div>
    <?php }  ?>
    <!-- Alert -->
    <?php
    $query = "Select * from tbl_paginas where id = '$apagar';";
    $stmt = $conexao -> prepare($query);
    $stmt -> execute();
    $resultado = $stmt -> fetch(PDO::FETCH_ASSOC);
    if($stmt->rowCount()>0) {
        //print_r($resultado);
        ?>
        <form class="form-inline" method="post" action="">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <div class="page-header">
                        <h1>
                            Você realmente deseja APAGAR a página?
                        </h1>
                        <h4 class="text-warning">Todas as informações serão apagadas e não será possível
                            recupera-las.</h4>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-4 column">
                    <h3>Titulo da página</h3>
                    <?php echo $resultado['titulo']; ?>
                    <h3>Titulo para navegador</h3>
                    <?php echo $resultado['slug']; ?>
                </div>
                <div class="col-md-8 column">
                    <h3>Texto da pagina.</h3>
                    <textarea class="form-control" cols="10" style="width: 100%" id="evento"
                              name="evento"><?php echo $resultado['texto']; ?></textarea>
                </div>
            </div>
            <hr>
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <div class="form-group">
                        <button id="confirmar" type="submit" name="confirmar" value="confirmar" class="btn btn-success">
                            Confirmar <em class="glyphicon glyphicon-chevron-right"></em></button>
                        <a href="/galerias" class="btn btn-danger" type="button"><em
                                class="glyphicon glyphicon-chevron-left"></em> Cancelar</a>
                    </div>
                </div>
                <hr>
            </div>
        </form>
    <?php
    }
    else{ ?>
        <div class="alert alert-dismissable alert-warning">
            <button type="button" class="close " data-dismiss="alert" aria-hidden="true">×</button>
            <span class="glyphicon glyphicon-warning-sign"></span> <strong> Ops..</strong> não existem dados para mostrar, clique em Cancelar / Voltar.
        </div>
    <?php }  ?>
</div>
