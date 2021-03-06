<?php
//session_start();
// Verifica se a variável $_POST não é vazia...
// ou seja: houve um submit no formulário
$msg = 0;
if (isset($url[2])) {
    $editar = $url[2];
}else {
    $msg = 3;
}

include_once ('function/Redimensiona.php');
if (!empty($_POST)) {

    // Verifica se a variável $_POST['titulo'] existe
    if (isset($_POST['titulo'])) {

        // Verifica se o usuário digitou os dados
        if (!empty($_POST['titulo'])) {
            $titulo         = $_POST['titulo'];
            $imagem         = $_FILES['imagem'];
            $valor          = $_POST['valor'];
            $descricao      = $_POST['texto'];

            $redim = new Redimensiona();
            $src=$redim->Redimensionar($imagem, 800, "includes/galeria/uploads/produtos");

            $query = "select * from tbl_produtos where id = '$editar';";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    //echo "Apagada imagem ID: ".$resultado['id']." - ".$resultado['titulo'];
                    unlink($result['imagem']);
                }
            }
            //echo $titulo."\n";
            //echo $evento;
            //$sql1 = "insert into tbl_produtos (titulo, imagem, descricao, link, valor, cadastro) values ('$titulo', '$src','$descricao', ' - ', '$valor', now())";
            $sql1 = "update tbl_produtos set titulo = '$titulo', imagem = '$src', valor = '$valor', descricao = '$descricao' where id = '$editar'";
            $stmt = $conexao->prepare($sql1);
            $stmt->execute();
            $msg = 2;
        } else {
            $msg = 1;
        }

    } else {
        echo "O campo 'titulo' não existe na variável $_POST";
    }

} else {
    //echo "Não houve submit no formulário";
    $titulo         = "";
    $imagem          = "";
    $valor           = "";
    $descricao       = "";
}


?>

<div class="">
    <div class="help-tip">
        <p>Preencha os dados, confira se estão corretos e clique em salvar.
            Recebendo a mensagem de que os dados foram salvos, clique em [Cancelar / Voltar] para visualizar a listagem.
        </p>
    </div>
    <div class="btn-group btn-group-md panel-body">
        <a href="http://<?=$_SERVER["HTTP_HOST"];?>/admin/produtos" class="btn btn-danger" type="button"><em class="glyphicon glyphicon-ban-circle"></em> Cancelar / Voltar</a>
    </div>
</div>

<div class="">
    <!-- Alert -->
    <?php if ($msg == 1){ ?>
        <div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <span class="glyphicon glyphicon-warning-sign"></span> Oopss.. <strong>Desculpe!</strong> Os campos não podem ficar em branco.
        </div>
    <?php } elseif ($msg == 2) { ?>
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <span class="glyphicon glyphicon-saved"></span> <strong>Oba!</strong> Os dados foram salvos com sucesso, clique em Cancelar / Voltar.
        </div>
    <?php }  ?>
    <!-- Alert -->
    <?php
    $query = "Select * from tbl_produtos where id = '$editar';";
    $stmt = $conexao -> prepare($query);
    $stmt -> execute();
    $resultado = $stmt -> fetch(PDO::FETCH_ASSOC);
    //print_r($resultado);
    ?>
    <form class="form-inline" method="post" action="" enctype="multipart/form-data">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="page-header">
                    <h1>
                        Digite os dados para alterar o produto ou serviço
                    </h1>
                    <span class="alert-danger padding border-radius5">OBS: a imagem deve ser atualizada também, caso contrário ficara em branco.</span>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-6 column">
                <h3>Titulo para o produto ou serviço</h3>
                <input id="titulo" name="titulo" type="text" style="width: 100%" placeholder="Digite o titulo do produto ou serviço" class="form-control" value="<?php echo $resultado['titulo']; ?>" >
                <span class="help-block">* Titulo do produto ou serviço.</span>
                <!-- File Button -->
                <h3>Escolha uma imagem para o produto ou serviço</h3>
                <h4 class="alert-danger padding border-radius5">A Imagem deve ser selecionada ou irá ficar em branco.</h4>

                <div id="links">
                    <a href="http://<?=$_SERVER["HTTP_HOST"];?>/<?php echo $resultado['imagem']; ?>" title="<?php echo $resultado['titulo']; ?>" data-gallery>
                        <img src="http://<?=$_SERVER["HTTP_HOST"];?>/<?php echo $resultado['imagem']; ?>" alt="<?php echo $resultado['titulo']; ?>" height="60px" class="thumbnail-mostra">
                    </a>
                </div>

                <input class="btn btn-primary" title="Selecione" id="imagem" name="imagem" type="file">
                <span class="help-block">* Imagem com no maximo 5MB.</span>

            </div>
            <div class="col-md-6 column">
                <h3>Valor do produto ou serviço, se necessário.</h3>
                <div class="input-group">
                    <span class="input-group-addon">R$</span>
                    <input id="valor" name="valor" class="form-control" placeholder="000.00" value="<?php echo $resultado['valor']; ?>" type="text">
                </div>
                <p class="help-block">Utilize ( . ) ponto no lugar de ( , ) virgula</p>

                <h3>Descrição do produto ou serviço.</h3>
                <textarea class="form-control" cols="10" style="width: 100%" id="texto" name="texto"><?php echo $resultado['descricao']; ?></textarea>

            </div>
        </div>
</div>
<hr>
<div class="row clearfix">
    <div class="col-md-12 column">
        <div class="form-group">
            <button id="salvar" type="submit" name="salvar" class="btn btn-success">Salvar</button>
        </div>
    </div>
    <hr>
</div>
</form>
</div>