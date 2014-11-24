<?php
$msg = 1;
include_once('function/Redimensiona.php');
if (!empty($_POST)) {

// Verifica se a variável $_POST['titulo'] existe
    if (isset($_POST['titulo'])) {

// Verifica se o usuário digitou os dados
        if (!empty($_POST['titulo'])) {
            $titulo = $_POST['titulo'];
            $imagem = $_FILES['imagem'];
            $valor = $_POST['valor'];
            $descricao = $_POST['texto'];

            $redim = new Redimensiona();
            $src = $redim->Redimensionar($imagem, 800, "galeria/uploads/produtos");

//echo $titulo."\n";
//echo $evento;
            $sql1 = "insert into tbl_produtos (titulo, imagem, descricao, link, valor, cadastro) values ('$titulo', '$src','$descricao', ' - ', '$valor', now())";
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
    $titulo = "";
    $texto = "";
    $slug = "";
    $metadesc = "";
}


?>

<h1 class="page-header">Editar perfil de usuário</h1>

<div class="row">
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
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="text-center">
            <img src="http://lorempixel.com/200/200/people/9/" class="avatar img-circle img-thumbnail" alt="avatar">
            <h6>Selecione outra imagem</h6>
            <input type="file" class="text-center center-block well well-sm">
        </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">

        <h3>Informação pessoal</h3>

        <form class="form-horizontal" role="form">
            <div class="form-group">
                <label class="col-lg-3 control-label">Nome:</label>

                <div class="col-lg-8">
                    <input class="form-control" value="<?php  ?>" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Usuário:</label>

                <div class="col-lg-8">
                    <input class="form-control" value="<?php  ?>" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Nova senha:</label>

                <div class="col-lg-8">
                    <input class="form-control" value="" type="password">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Confirme a Senha:</label>

                <div class="col-lg-8">
                    <input class="form-control"  type="password">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"></label>

                <div class="col-md-8">
                    <input class="btn btn-primary" value="Salvar" type="button">
                    <span></span>
                    <input class="btn btn-default" value="Cancelar" type="reset">
                </div>
            </div>
        </form>
    </div>
</div>