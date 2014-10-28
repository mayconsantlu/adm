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
            //echo $titulo."\n";
            //echo $evento;
            //$sql1 = "insert into tbl_galerias (titulo, obs, data_evento, cadastro) values ('$titulo', '$obs', '$data_evento', now())";

            $query = "select * from tbl_fotos where id_galeria = '$apagar';";
            $stmt = $conexao -> prepare($query);
            $stmt -> execute();
            if($stmt->rowCount()>0){
                while($resultado = $stmt -> fetch(PDO::FETCH_ASSOC)) {
                                //echo "Apagada imagem ID: ".$resultado['id']." - ".$resultado['titulo'];
                                unlink("galeria/".$resultado['img']);
                    }
                }
            //}
            //apagafoto($apagar, $conta);
            //$conta = ("select count(id_galeria) from tbl_fotos where id_galeria = '$apagar';");
            $query1 = "select * from tbl_fotos where id_galeria = '$apagar';";
            $stmt = $conexao -> prepare($query1);
            $stmt -> execute();
            if($stmt->rowCount()>0){
                while($result = $stmt -> fetch(PDO::FETCH_ASSOC)){
                        $query = ('delete from tbl_fotos where id_galeria = :id;');
                        $stmt = $conexao->prepare($query);
                        // $stmt->bindValue(":apagar", $apagar);
                        $stmt->bindValue(':id', $result['id_galeria']);
                        $stmt->execute();
                        //echo $result['id_galeria'];
                    }
            }
            $sql1 = "delete from tbl_galerias where id = '$apagar';";
            $stmt = $conexao->prepare($sql1);
            //$stmt -> bindValue('editar', $editar);
            $stmt->execute();
            $msg = 2;
        } else {
            $msg = 1;
        }

    } else {
        echo "O campo 'titulo' não existe na variável $ POST";
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
        <a href="/galerias" class="btn btn-danger" type="button"><em class="glyphicon glyphicon-ban-circle"></em> Cancelar / Voltar</a>
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
            <span class="glyphicon glyphicon-warning-sign"></span> <strong> Ops..</strong> Voce deve acessar pela página de galerias, clique em Cancelar / Voltar.
        </div>
    <?php }  ?>
    <!-- Alert -->
    <?php
    $query = "Select * from tbl_galerias where id = '$apagar';";
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
                            Você realmente deseja APAGAR a galeria de fotos?
                        </h1>
                        <h4 class="text-warning">Todas as imagens da galeria serão apagadas e não será possível
                            recupera-las.</h4>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-4 column">
                    <h3>Titulo do evento</h3>
                    <?php echo $resultado['titulo']; ?>
                    <h3>Data do evento</h3>
                    <?php echo $resultado['data_evento']; ?>
                </div>
                <div class="col-md-8 column">
                    <h3>Descrição do evento.</h3>
                    <textarea class="form-control" cols="10" style="width: 100%" id="evento"
                              name="evento"><?php echo $resultado['obs']; ?></textarea>
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
