
<?php
$msg = 0;
if (!empty($_POST)) {
    // Verifica se a variável $_POST['titulo'] existe
    if (isset($_POST['contato'])) {
        // Verifica se o usuário digitou os dados
        if (!empty($_POST['contato'])) {
            $titulo         = $_POST['titulo'];
            $descricao        = $_POST['descricao'];
            $chave      = $_POST['chave'];
            $id = 1;
            // alterar a partir daqui.
            $sql1 = "update tbl_config set email = '$email', email2 = '$copia', mensagem = '$mensagem' where id = :id";
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
    $email         = "";
    $copia        = "";
    $mensagem      = "";
}

?>

           <div class="help-tip">
                <p>Insira as informações referentes ao site, Isso é muito importante para otimização e apresentação do mesmo</p>
            </div>
           <div class="btn-group btn-group-md">
               <a href="configuracoes" class="btn btn-info" type="button"><em class="glyphicon glyphicon-refresh"></em> Atualizar</a>
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

            <form class="form-horizontal" method="post" action="?salvar=sim">

                <fieldset>

                    <!-- Form Name -->
                    <legend>Configurações do Site</legend>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="titulo">Titulo do site</label>
                        <div class="col-md-6">
                            <input id="titulo" name="titulo" type="text" placeholder="" class="form-control input-md" required="">

                        </div>
                    </div>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="desc">Descrição</label>
                        <div class="col-md-4">
                            <textarea class="form-control" id="desc" name="desc"></textarea>
                        </div>
                    </div>

                    <legend>Configurações de SEO</legend>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="key">Palavras Chave</label>
                        <div class="col-md-4">
                            <textarea class="form-control" id="key" name="key"></textarea>
                            <span class="help-block">Digite as palávras chave, separadas por virgulas (,) ela snão são obrigatóiras, uma vez que o google não utiliza.</span>
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