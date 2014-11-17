<?php
//session_start();
// Verifica se a variável $_POST não é vazia...
// ou seja: houve um submit no formulário
$msg = 0;
/*if (isset($_GET['contato'])) {
    $contato = $_GET['contato'];
}elseif (isset($_GET['orcamento'])) {
    $contato = $_GET['orcamento'];
}*/

if (!empty($_POST)) {

    // Verifica se a variável $_POST['titulo'] existe
    if (isset($_POST['contato'])) {

        // Verifica se o usuário digitou os dados
        if (!empty($_POST['contato'])) {
            $email         = $_POST['email'];
            $copia        = $_POST['copia'];
            $mensagem      = $_POST['agradecimento'];
            $id = 1;
            $sql1 = "update tbl_formularios set email = '$email', email2 = '$copia', mensagem = '$mensagem' where id = :id";
            $stmt = $conexao->prepare($sql1);
            $stmt ->bindValue(':id', $id);
            $stmt->execute();
            $msg = 2;
        } else {
            $msg = 1;
        }

    } elseif (isset($_POST['orcamento'])) {
        $email         = $_POST['email'];
        $copia        = $_POST['copia'];
        $mensagem      = $_POST['agradecimento'];
        $id = 2;
        $sql2 = "update tbl_formularios set email = '$email', email2 = '$copia', mensagem = '$mensagem' where id = :id";
        $stmt = $conexao->prepare($sql2);
        $stmt ->bindValue(':id', $id);
        $stmt->execute();
        $msg = 2;
    }

} else {
    //echo "Não houve submit no formulário";
    $email         = "";
    $copia        = "";
    $mensagem      = "";
}


?>

<div class="page-header">
    <h1>
        Configuração de formulários do Site
    </h1>
</div>
<div class="help-tip">
    <p>Insira os dados nos formúlarios, para direcionar os as solicitações de contato ou orçamento para os e-mails corretos.</p>
</div>
<div class="btn-group btn-group-md">
    <a href="formularios" class="btn btn-info" type="button"><em class="glyphicon glyphicon-refresh"></em> Atualizar</a>
</div>
<hr>
<!-- Alert -->
<?php if ($msg == 1){ ?>
    <div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <span class="glyphicon glyphicon-warning-sign"></span> Oopss.. <strong>Desculpe!</strong> Os campos não podem ficar em branco.
    </div>
<?php } elseif ($msg == 2) { ?>
    <div class="alert alert-dismissable alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <span class="glyphicon glyphicon-saved"></span> <strong> Oba!</strong> Os dados foram salvos com sucesso, clique em Cancelar / Voltar.
    </div>
<?php } elseif ($msg == 3) { ?>
    <div class="alert alert-dismissable alert-warning">
        <button type="button" class="close " data-dismiss="alert" aria-hidden="true">×</button>
        <span class="glyphicon glyphicon-warning-sign"></span> <strong> Ops..</strong> Voce deve acessar pela página de galerias, clique em Cancelar / Voltar.
    </div>
<?php }  ?>
<!-- Alert -->
<div class="row clearfix">
    <div class="col-md-6 column">
        <?php
            // seleciona as paginas com base na url passada
            $query = "Select * from tbl_formularios where tipo = 0";
            $stmt = $conexao -> prepare($query);
            $stmt -> execute();
            $contato = $stmt -> fetch(PDO::FETCH_ASSOC)
            //echo $contato['id'];
       ?>
        <form id="contatofrm" class="form-horizontal" method="post" action="?contato=salvar">
            <fieldset>

                <!-- Form Name -->
                <legend>Configuração - Formulário de contato</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">e-mail</label>
                    <div class="col-md-5">
                        <input id="email" name="email" type="email" placeholder="e-mail" class="form-control input-md" required="" value="<?php echo $contato['email']; ?>">
                        <span class="help-block">e-mail para envio do formulário de contato</span>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="copia">Cópia</label>
                    <div class="col-md-5">
                        <input id="copia" name="copia" type="email" placeholder="cópia" class="form-control input-md" value="<?php echo $contato['email2']; ?>" >
                        <span class="help-block">e-mail para cópia</span>
                    </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="agradecimento">Mensagem de agradecimento</label>
                    <div class="col-md-8">
                        <textarea class="form-control" id="agradecimento" name="agradecimento"><?php echo $contato['mensagem']; ?></textarea>
                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Salvar"></label>
                    <div class="col-md-8">
                        <button id="contato" name="contato" type="submit" value="salvar" class="btn btn-success">Salvar</button>
                    </div>
                </div>

            </fieldset>
        </form>

    </div>
    <div class="col-md-6 column">
        <?php
            // seleciona as paginas com base na url passada
            $query1 = "Select * from tbl_formularios where tipo = 1";
            $stmt = $conexao -> prepare($query1);
            $stmt -> execute();
            $orcamento = $stmt -> fetch(PDO::FETCH_ASSOC)
           //echo $orcamento['id'];
        ?>
        <form class="form-horizontal" id="orcamentofrm"  method="post" action="?orcamento=salvar">
            <fieldset>

                <!-- Form Name -->
                <legend>Configuração - Formulário solicitação de orçamento</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="email">e-mail</label>
                    <div class="col-md-5">
                        <input id="email" name="email" type="email" placeholder="e-mail" class="form-control input-md" required="" value="<?php echo $orcamento['email']; ?>">
                        <span class="help-block">e-mail para envio do formulário de orçamento</span>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="copia">Cópia</label>
                    <div class="col-md-5">
                        <input id="copia" name="copia" type="email" placeholder="cópia" class="form-control input-md" value="<?php echo $orcamento['email2']; ?>">
                        <span class="help-block">e-mail para cópia</span>
                    </div>
                </div>

                <!-- Textarea -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="agradecimento">Mensagem de agradecimento</label>
                    <div class="col-md-8">
                        <textarea class="form-control" id="agradecimento" name="agradecimento" maxlength="300" style="width: 100%"><?php echo $orcamento['mensagem']; ?></textarea>
                    </div>
                </div>

                <!-- Button (Double) -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="Salvar"></label>
                    <div class="col-md-8">
                        <button id="orcamento" name="orcamento" value="salvar" class="btn btn-success">Salvar</button>
                    </div>
                </div>

            </fieldset>
        </form>

    </div>
</div>