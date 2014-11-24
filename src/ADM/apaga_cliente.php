<?php
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
            $sql1 = "delete from tbl_clientes where id = :apagar;";
            $stmt = $conexao->prepare($sql1);
            $stmt -> bindValue(':apagar', $apagar);
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

<div class="">
    <div class="help-tip">
        <p>Preencha os dados, confira se estão corretos e clique em salvar.
            Recebendo a mensagem de que os dados foram salvos, clique em [Cancelar / Voltar] para visualizar a listagem.
        </p>
    </div>
    <div class="btn-group btn-group-md panel-body">
        <a href="/clientes" class="btn btn-danger" type="button"><em class="glyphicon glyphicon-ban-circle"></em> Cancelar / Voltar</a>
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
            <span class="glyphicon glyphicon-saved"></span> <strong>Oba!</strong> Os dados foram apagados com sucesso, clique em Cancelar / Voltar.
        </div>
    <?php }  ?>
    <!-- Alert -->
    <?php
    $query = "Select * from tbl_clientes where id = '$apagar';";
    $stmt = $conexao -> prepare($query);
    $stmt -> execute();
    $resultado = $stmt -> fetch(PDO::FETCH_ASSOC);
    //print_r($resultado);
    ?>
    <form class="form-inline" method="post" action="">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="page-header">
                    <h1>
                        Você realmente deseja APAGAR os dados do cliente?
                    </h1>
                    <h4 class="text-warning">Todas as informações serão apagadas e não será possível
                        recupera-las.</h4>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-6 column">
                <h3>Nome Razão *</h3>
                <input id="nome" name="nome" disabled type="text" style="width: 100%" placeholder="Digite o Nome/Razão" class="form-control" value="<?php echo $resultado['nome']; ?>" >
                <span class="help-block">* Nome ou Razão social do cliente.</span>
                <h3>CPF/CNPJ</h3>
                <input id="cnpj" name="cnpj" disabled type="text" style="width: 100%" placeholder="Digite o CPF ou CNPJ do cliente" class="form-control" value="<?php echo $resultado['cnpj']; ?>" >
                <h3>Contato</h3>
                <input id="contato" name="contato" disabled type="text" style="width: 100%" placeholder="Digite o nome da pessoa de contato" class="form-control" value="<?php echo $resultado['contato']; ?>" >
            </div>
            <div class="col-md-6 column">
                <h3>e-mail</h3>
                <input id="email" name="email" disabled type="email" style="width: 100%" placeholder="Digite o e-mail do cliente" class="form-control" value="<?php echo $resultado['email']; ?>" >
                <h3>Telefone</h3>
                <input id="telefone" name="telefone" disabled type="tel" style="width: 100%" class="form-control" value="<?php echo $resultado['telefone']; ?>" >
                <h3>Observação</h3>
                <div class="border border-radius5 padding"><?php echo $resultado['obs']; ?></div>
            </div>
        </div>
        <hr>
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="form-group">
                    <button id="confirmar" type="submit" name="confirmar" value="confirmar" class="btn btn-success">
                        Confirmar <em class="glyphicon glyphicon-chevron-right"></em></button>
                    <a href="/clientes" class="btn btn-danger" type="button"><em
                            class="glyphicon glyphicon-chevron-left"></em> Cancelar</a>
                </div>
            </div>
            <hr>
        </div>
    </form>
</div>




