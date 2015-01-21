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
    if (isset($_POST['salvar'])) {

        // Verifica se o usuário digitou os dados
        if (!empty($_POST['salvar'])) {
            $nome           = $_POST['nome'];
            $endereco       = $_POST['endereco'];
            $numero         = $_POST['numero'];
            $complemento    = $_POST['complemento'];
            $bairro         = $_POST['bairro'];
            $cidade         = $_POST['cidade'];
            $estado         = $_POST['estado'];
            $contato        = $_POST['contato'];
            $telefone       = $_POST['telefone'];
            $telefone2      = $_POST['telefone2'];
            $celular        = $_POST['celular'];
            $email          = $_POST['email'];
            $email2         = $_POST['email2'];
            $mapa           = $_POST['mapa'];
            $facebook       = $_POST['facebook'];
            $twitter        = $_POST['twitter'];
            $id = 1; // padrão
            $sql1 = "update tbl_contato set nome = '$nome', endereco= '$endereco', bairro = '$bairro', cidade = '$cidade',
                                                    estado = '$estado', contato = '$contato', telefone = '$telefone',
                                                    telefone2 = '$telefone2', celular = '$celular', email = '$email',
                                                    email2 = '$email2', mapa = '$mapa', facebook = '$facebook',
                                                    twitter = '$twitter' where id = :id";
            $stmt = $conexao->prepare($sql1);
            $stmt ->bindValue(':id', $id);
            $stmt->execute();
            $msg = 2;
        } else {
            $msg = 1;
        }

    } else {
        // nada aqui
    }

} else {
    //echo "Não houve submit no formulário";
    $nome           = "";
    $endereco       = "";
    $numero         = "";
    $complemento    = "";
    $bairro         = "";
    $cidade         = "";
    $estado         = "";
    $contato        = "";
    $telefone       = "";
    $telefone2      = "";
    $celular        = "";
    $email          = "";
    $email2         = "";
    $mapa           = "";
    $facebook       = "";
    $twitter        = "";
}


?>

<div class="page-header">
    <h1>
        Configuração de contato do Site
    </h1>
</div>
<div class="help-tip">
    <p>Nesta página você inserir os dados de contato para o seu site, quanto mais opções para que o seu cliente possa entrar em contato com vocês melhor.</p>
</div>
<div class="btn-group btn-group-md">
    <a href="http://<?=$_SERVER["HTTP_HOST"];?>/admin/contato" class="btn btn-info" type="button"><em class="glyphicon glyphicon-refresh"></em> Atualizar</a>
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
        <span class="glyphicon glyphicon-saved"></span> <strong> Oba!</strong> Os dados foram salvos com sucesso, clique em atualizar.
    </div>
<?php } elseif ($msg == 3) { ?>
    <div class="alert alert-dismissable alert-warning">
        <button type="button" class="close " data-dismiss="alert" aria-hidden="true">×</button>
        <span class="glyphicon glyphicon-warning-sign"></span> <strong> Ops..</strong> Voce deve acessar pela página de contato.
    </div>
<?php }  ?>
<!-- Alert -->
<div class="row clearfix">
    <form id="contatofrm" class="form-horizontal" method="post" action="">
    <div class="col-md-12 column">
    <?php
    // seleciona as paginas com base na url passada
    $query = "Select * from tbl_contato";
    $stmt = $conexao -> prepare($query);
    $stmt -> execute();
    $contato = $stmt -> fetch(PDO::FETCH_ASSOC)
    //echo $contato['id'];
    ?>

        <fieldset>

            <!-- Form Name -->
            <legend>Dados de contato da sua empresa no site.</legend>
    <div class="col-md-6 column">


                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="nome">Nome *</label>
                    <div class="col-md-6">
                        <input id="nome" name="nome" type="text" value="<?php echo $contato['nome']; ?>" placeholder="Nome / Razão Social" class="form-control input-md">
                        <span class="help-block">Seu nome ou Razão social da sua empresa</span>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="endereco">Endereço *</label>
                    <div class="col-md-8">
                        <input id="endereco" name="endereco" type="text" value="<?php echo $contato['endereco']; ?>"  placeholder="Seu endereço" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="numero">Número</label>
                    <div class="col-md-2">
                        <input id="numero" name="numero" type="text" value="<?php echo $contato['numero']; ?>"  class="form-control input-md">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="complemento">Complemento</label>
                    <div class="col-md-5">
                        <input id="complemento" name="complemento" type="text" value="<?php echo $contato['complemento']; ?>"  placeholder="" class="form-control input-md">

                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cidade">Bairro</label>
                    <div class="col-md-5">
                        <input id="bairro" name="bairro" type="text" value="<?php echo $contato['bairro']; ?>"  class="form-control input-md">

                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="cidade">Cidade</label>
                    <div class="col-md-5">
                        <input id="cidade" name="cidade" type="text" value="<?php echo $contato['cidade']; ?>"  class="form-control input-md">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="estado">Estado</label>
                    <div class="col-md-2">
                        <input id="estado" name="estado" type="text" value="<?php echo $contato['estado']; ?>" class="form-control input-md">

                    </div>
                </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="contato">Contato *</label>
            <div class="col-md-6">
                <input id="contato" name="contato" type="text" value="<?php echo $contato['contato']; ?>"  placeholder="Pessoa de contato" class="form-control input-md">

            </div>
        </div>
    </div>
    <div class="col-md-6 column">
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="telefone">Telefone</label>
                        <div class="col-md-4">
                            <input id="telefone" name="telefone" type="tel" value="<?php echo $contato['telefone']; ?>"  class="form-control input-md">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="telefone2">Outro telefone</label>
                        <div class="col-md-4">
                            <input id="telefone2" name="telefone2" type="tel" value="<?php echo $contato['telefone2']; ?>"  class="form-control input-md">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="celular">Celular</label>
                        <div class="col-md-4">
                            <input id="celular" name="celular" type="tel" value="<?php echo $contato['celular']; ?>" class="form-control input-md">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="email">e-mail</label>
                        <div class="col-md-8">
                            <input id="email" name="email" type="email" value="<?php echo $contato['email']; ?>"  class="form-control input-md">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="email2">Outro e-mail</label>
                        <div class="col-md-8">
                            <input id="email2" name="email2" type="email" value="<?php echo $contato['email2']; ?>" class="form-control input-md">

                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="mapa">Link do mapa</label>
                        <div class="col-md-8">
                            <input id="mapa" name="mapa" type="text" value="<?php echo $contato['mapa']; ?>"  class="form-control input-md">
                            <span class="help-block">Link do google maps</span>
                        </div>
                    </div>
        <!-- Prepended text-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="facebook">Facebook</label>
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-addon">facebook.com/</span>
                    <input id="facebook" name="facebook" value="<?php echo $contato['facebook']; ?>" class="form-control" placeholder="seu identificador" type="text">
                </div>

            </div>
        </div>

        <!-- Prepended text-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="twitter">Twitter</label>
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-addon">twitter.com/</span>
                    <input id="twitter" name="twitter" value="<?php echo $contato['twitter']; ?>" class="form-control" placeholder="seunome" type="text">
                </div>

            </div>
        </div>

                </fieldset>
    </div>
    <!-- Button (Double) -->
    <div class="form-group">
        <label class="col-md-12 control-label" for="Salvar"></label>
        <div class="col-md-2 col-md-offset-10"">
            <button id="salvar" name="salvar" type="submit" value="salvar" class="btn btn-success">Salvar</button>
        </div>
    </div>
    </form>

    </div>
</div>