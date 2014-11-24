<?php
//session_start();
// Verifica se a variável $_POST não é vazia...
// ou seja: houve um submit no formulário
$msg = 0;
if (!empty($_POST)) {

    // Verifica se a variável $_POST['titulo'] existe
    if (isset($_POST['titulo'])) {

        // Verifica se o usuário digitou os dados
        if (!empty($_POST['titulo'])) {
            $titulo         = $_POST['titulo'];
            $obs            = $_POST['evento'];
            $data_evento    = $_POST['data'];
            //echo $titulo."\n";
            //echo $evento;
            $sql1 = "insert into tbl_galerias (titulo, obs, data_evento, cadastro) values ('$titulo', '$obs', '$data_evento', now())";
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
    $obs            = "";
    $data_evento    = "";
}


?>

<div class="">
    <div class="help-tip">
        <p>Preencha os dados, confira se estão corretos e clique em salvar.
        Recebendo a mensagem de que os dados foram salvos, clique em [Cancelar / Voltar] para visualizar a listagem.
        </p>
    </div>
    <div class="btn-group btn-group-md panel-body">
        <a href="/galerias" class="btn btn-danger" type="button"><em class="glyphicon glyphicon-ban-circle"></em> Cancelar / Voltar</a>
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
    <form class="form-inline" method="post" action="">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="page-header">
                <h1>
                    Digite os dados para criar a galeria de fotos
                </h1>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-md-4 column">
            <h3>Insira o titulo do evento</h3>
            <input id="titulo" name="titulo" type="text" style="width: 100%" placeholder="Digite o titulo da galeria" class="form-control" value="<?php echo $titulo; ?>" >
            <span class="help-block">* Nome do evento que as fotos foram tiradas</span>
            <h3>Insira a data do evento</h3>
            <input id="data" name="data" type="text" style="width: 100%" placeholder="Digite a data do evento dd/mm/aaaa" class="form-control" value="<?php echo $data_evento; ?>" >
            <span class="help-block">* Data em que o evento foi realizado</span>
        </div>
        <div class="col-md-8 column">
            <h3>Insira uma descrição do evento.</h3>
            <textarea class="form-control" cols="10" style="width: 100%" id="evento" name="evento"><?php echo $obs; ?></textarea>
        </div>
    </div>
        <hr>
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="form-group">
                    <button id="salvar" type="submit" name="salvar" class="btn btn-success">Salvar</button>
                    <button id="limpar" type="reset" name="limpar" class="btn btn-warning">Limpar</button>
                </div>
            </div>
            <hr>
        </div>
    </form>
</div>





