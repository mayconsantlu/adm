<?php
//session_start();
// Verifica se a variável $_POST não é vazia...
// ou seja: houve um submit no formulário
$msg = 0;
if (!empty($_POST)) {

    // Verifica se a variável $_POST['titulo'] existe
    if (isset($_POST['nome'])) {

        // Verifica se o usuário digitou os dados
        if (!empty($_POST['nome'])) {
            $nome         = $_POST['nome'];
            $cnpj         = $_POST['cnpj'];
			$contato      = $_POST['contato'];
			$email        = $_POST['email'];
            $telefone     = $_POST['telefone'];
			$obs          = $_POST['texto'];
			// terminar insertt
            $sql1 = "insert into tbl_clientes (nome, cnpj, contato, email, telefone, obs, cadastro)
                                       values ('$nome', '$cnpj', '$contato', '$email', '$telefone', '$obs', now())";
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
    $nome         = "";
    $cnpj         = "";
    $contato      = "";
    $email        = "";
    $telefone     = "";
    $obs          = "";
}


?>

<div class="">
    <div class="help-tip">
        <p>Preencha os dados, confira se estão corretos e clique em salvar.
            Recebendo a mensagem de que os dados foram salvos, clique em [Cancelar / Voltar] para visualizar a listagem.
        </p>
    </div>
    <div class="btn-group btn-group-md panel-body">
        <a href="http://<?=$_SERVER["HTTP_HOST"];?>/admin/clientes" class="btn btn-danger" type="button"><em class="glyphicon glyphicon-ban-circle"></em> Cancelar / Voltar</a>
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
                        Digite os dados do cliente
                    </h1>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-6 column">
                <h3>Nome Razão *</h3>
                <input id="nome" name="nome" type="text" style="width: 100%" placeholder="Digite o Nome/Razão" class="form-control" value="<?php echo $nome; ?>" >
                <span class="help-block">* Nome ou Razão social do cliente.</span>
				<h3>CNPJ</h3>
                <input id="cnpj" name="cnpj" type="text" style="width: 100%" placeholder="Digite o CNPJ do cliente" class="form-control" value="<?php echo $cnpj; ?>" >
				<h3>Contato</h3>
                <input id="contato" name="contato" type="text" style="width: 100%" placeholder="Digite o nome da pessoa de contato" class="form-control" value="<?php echo $contato; ?>" >
            </div>
            <div class="col-md-6 column">
				<h3>e-mail</h3>
                <input id="email" name="email" type="email" style="width: 100%" placeholder="Digite o e-mail do cliente" class="form-control" value="<?php echo $email; ?>" >
				<h3>Telefone</h3>
                <input id="telefone" name="telefone" type="tel" style="width: 100%" placeholder="Telefone" class="form-control" value="<?php echo $telefone; ?>" >
                <h3>Observação</h3>
                <textarea class="form-control" cols="10" style="width: 100%" id="texto" name="texto"><?php echo $obs; ?></textarea>
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




