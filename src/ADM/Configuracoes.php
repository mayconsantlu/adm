<?php
$msg = 0;
if (!empty($_POST)) {
    // Verifica se a variável $_POST['titulo'] existe
    if (isset($_POST['titulo'])) {
        // Verifica se o usuário digitou os dados
        if (!empty($_POST['titulo'])) {
            $titulo = $_POST['titulo'];
            $descricao = $_POST['descricao'];
            $chave = $_POST['chave'];
            $id = 1;
            // alterar a partir daqui.
            $sql1 = "update tbl_config set titulo = '$titulo', descricao = '$descricao', chave = '$chave' where id = :id";
            $stmt = $conexao->prepare($sql1);
            $stmt->bindValue(':id', $id);
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
    $email = "";
    $copia = "";
    $mensagem = "";
}

?>

<div class="help-tip">
    <p>Insira as informações referentes ao site, Isso é muito importante para otimização e apresentação do mesmo</p>
</div>
<div class="btn-group btn-group-md">
    <a href="configuracoes" class="btn btn-info" type="button"><em class="glyphicon glyphicon-refresh"></em>
        Atualizar</a>
</div>
<hr>
<!-- Alert -->
<?php if ($msg == 1) { ?>
    <div class="alert alert-dismissable alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <span class="glyphicon glyphicon-warning-sign"></span> Oopss.. <strong>Desculpe!</strong> Os campos não podem
        ficar em branco.
    </div>
<?php } elseif ($msg == 2) { ?>
    <div class="alert alert-dismissable alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <span class="glyphicon glyphicon-saved"></span> <strong> Oba!</strong> Os dados foram salvos com sucesso, clique
        em Cancelar / Voltar.
    </div>
<?php } elseif ($msg == 3) { ?>
    <div class="alert alert-dismissable alert-warning">
        <button type="button" class="close " data-dismiss="alert" aria-hidden="true">×</button>
        <span class="glyphicon glyphicon-warning-sign"></span> <strong> Ops..</strong> Voce deve acessar pela página de
        configurações, clique em Cancelar / Voltar.
    </div>
<?php } ?>
<!-- Alert -->
<?php
// seleciona as paginas com base na url passada
$query = "Select * from tbl_config";
$stmt = $conexao->prepare($query);
$stmt->execute();
$config = $stmt->fetch(PDO::FETCH_ASSOC)
//echo $config['id'];
?>
<form class="form-horizontal" method="post" action="?salvar=sim">

    <fieldset>

        <!-- Form Name -->
        <legend>Configurações do Site</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="titulo">Titulo do site</label>

            <div class="col-md-6">
                <input id="titulo" name="titulo" type="text" placeholder="" class="form-control input-md" required=""
                       value="<?php echo $config['titulo']; ?>">

            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="desc">Descrição</label>

            <div class="col-md-4">
                <textarea class="form-control" id="descricao"
                          name="descricao" maxlength="300"><?php echo $config['descricao']; ?></textarea>
                <span class="help-block">Digite uma descrição para o seu site, ela deve ser direta e objetiva, o ideal é que ela não passe de 250 caracteres, esta descrição é a parte mais importante para o seu site aparecer nos buscadores como o Google por exemplo, pois ele utiliza a mesma para identificar o seu site, o campo limita a 300.</span>
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="chave">Palavras Chave</label>

            <div class="col-md-4">
                <textarea class="form-control" id="chave" name="chave"><?php echo $config['chave']; ?></textarea>
                <span class="help-block">Digite as palavras chave, separadas por virgulas (,), elas não são obrigatóriras, uma vez que o Google não as utiliza para posicionamento, mas pode auxilar na busca dentro do site.</span>
            </div>
        </div>
        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="salvar"></label>

            <div class="col-md-4">
                <button id="salvar" name="salvar" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </fieldset>
</form>

</div>

</div>
</div>
</div>