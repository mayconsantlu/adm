<?php
$msg = 0;
include_once('function/Redimensiona.php');
if (!empty($_POST)) {

// Verifica se a variável $_POST['titulo'] existe
    if (isset($_POST['nome'])) {

// Verifica se o usuário digitou os dados
        if (!empty($_POST['nome'])) {
            $nome = $_POST['nome'];
            //$foto = $_FILES['foto'];
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            $senha2 = $_POST['senha2'];

            if ($senha == ""){
                $id = 2;
                $sql2 = "update tbl_usuario set nome = '$nome', usuario = '$usuario' where id = :id";
                $stmt = $conexao->prepare($sql2);
                $stmt -> bindValue(':id', $id);
                $stmt->execute();
                $msg = 2;
                $mensagem = 'A senha não foi atualizada, apenas demais dados.';
            }
            // compara as senhas
            if ($senha == $senha2) {
                //$redim = new Redimensiona();
                //$src = $redim->Redimensionar($imagem, 200, "/upload_image/usuario");
                $id = 2;
                $pass = password_hash( $senha, PASSWORD_DEFAULT );
                $sql1 = "update tbl_usuario set nome = '$nome', usuario = '$usuario', senha = '$pass' where id = :id";
                $stmt = $conexao->prepare($sql1);
                $stmt -> bindValue(':id', $id);
                $stmt->execute();
                $msg = 2;
            }else {
                $msg = 3;
            }
            // fim compara as senhas
        } else {
            $msg = 1;
        }

    } else {
        echo "O campo 'nome' não existe na variável $_POST";
    }
   // Atualiza a imagem do Usuario

} else {
//echo "Não houve submit no formulário";
    $nome = "";
    $foto = "";
    $usuario = "";
    $senha = "";
    $senha2 = "";
}
if (isset($_POST['imagem'])){
    if (isset($_FILES['foto'])){
        $foto = $_FILES['foto'];
        $redim = new Redimensiona();
        $src = $redim->Redimensionar($foto, 200, "upload_image/usuario");
        $id = 2;
        //$pass = password_hash( $senha, PASSWORD_DEFAULT );
        $sqlImg = "update tbl_usuario set foto = '$src' where id = :id";
        $stmt = $conexao->prepare($sqlImg);
        $stmt -> bindValue(':id', $id);
        $stmt->execute();
        $msg = 2;
        $mensagem = 'A Imagem foi atualizada.';
    } else {
        $msg = 1;
        $mensagem = 'Selecione uma Imagem.';
    }
}

?>
<div class="help-tip">
    <p>Você pode alterar os campos de Nome e usuário, a senha ou a imagem independentemente.
    </p>
</div>
<h1 class="page-header">Editar perfil de usuário</h1>

<div class="row">
    <!-- Alert -->
    <?php if ($msg == 1){ ?>
        <div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <span class="glyphicon glyphicon-warning-sign"></span> Oopss.. <strong>Desculpe!</strong> Os campos não podem ficar em branco.
            <strong> <?php echo $mensagem; ?></strong>
        </div>
    <?php } elseif ($msg == 2) { ?>
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <span class="glyphicon glyphicon-saved"></span> <strong>Oba!</strong> Os dados foram salvos com sucesso.
            <strong> <?php echo $mensagem; ?></strong>
        </div>
    <?php } elseif ($msg == 3) { ?>
        <div class="alert alert-dismissable alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <span class="glyphicon glyphicon-saved"></span> <strong>Ops..</strong> As senhas não correspondem, verifique os dados e tente novamente.
            <strong> <?php echo $mensagem; ?></strong>
        </div>
    <?php }  ?>
    <!-- Alert -->
    <?php
    $query = "Select * from tbl_usuario where id = 2;";
    $stmt = $conexao -> prepare($query);
    $stmt -> execute();
    $resultado = $stmt -> fetch(PDO::FETCH_ASSOC);
    //print_r($resultado);
    ?>
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
     <form class="form-horizontal" role="form" name="imagem" id="imagem" method="post" enctype="multipart/form-data" >
        <div class="text-center">
            <img src="<?php echo $resultado['foto']; ?>" class="avatar img-circle img-thumbnail" alt="avatar">
            <h6>Selecione outra imagem</h6>
            <input title="Selecione" type="file" name="foto" id="foto" class="btn btn-primary"> <!-- text-center center-block well well-sm -->
            <span class="help-block">A imagem deve ter preferencialmente 200 X 200 px.</span>
        </div>
         <div class="text-center">
             <input name="imagem" value="imagem" type="hidden">
             <input class="btn btn-primary" value="Salvar" type="submit">
         </div>
       </form>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">

        <h3>Informação pessoal</h3>

        <form class="form-horizontal" role="form" method="post" >
            <div class="form-group">
                <label class="col-lg-3 control-label">Nome:</label>

                <div class="col-lg-8">
                    <input class="form-control" name="nome" id="nome" value="<?php echo $resultado['nome']; ?>" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Usuário:</label>

                <div class="col-lg-8">
                    <input class="form-control" name="usuario" id="usuario" value="<?php echo $resultado['usuario']; ?>" type="text">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Nova senha:</label>

                <div class="col-lg-8">
                    <input class="form-control" name="senha" id="senha" type="password" onkeyup="verificarSenha();">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-3 control-label">Confirme a Senha:</label>

                <div class="col-lg-8">
                    <input class="form-control" name="senha2" id="senha2" type="password" onkeyup="verificarSenha();">
                    <p id="resultado"></p>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label"></label>

                <div class="col-md-8">
                    <input class="btn btn-primary" value="Salvar" type="submit">
                    <span></span>
                    <input class="btn btn-default" value="Cancelar" type="reset">
                </div>
            </div>
        </form>
    </div>
</div>

<hr>

<script type="text/javascript"> //Iniciamos uma escrita em Javascript
    function verificarSenha(){ //Criamos uma função com o nome verificarSenha
        var campo1 = document.getElementById("senha").value;// Na variável campo 1 pegamos o valor co campo onde o Id é senha01.
        var campo2 = document.getElementById("senha2").value;// Na variável campo 2 pegamos o valor co campo onde o Id é senha02.
        if(campo1 == campo2){ // Verificamos se o valor do campo 1 é o mesmo do campo 2 e se for...
            document.getElementById("resultado").innerHTML = "&raquo; As senhas são iguais."; //No ID resultado exibimor um texto: As senhas são iguais.
            document.getElementById("resultado").style.color = "#008B45";// No mesmo ID alteramos a cor do texto para um verde escuro "SpringGreen4";
        }else{ // se os valores dos campos forem diferentes..
            document.getElementById("resultado").innerHTML = "As senhas não correspondem.";//No ID resultado exibimor um texto: As senhas não correspondem.
            document.getElementById("resultado").style.color = "#FF6347";// No mesmo ID alteramos a cor do texto para um vermelho clarinho "Tomato1";
        } // fechamos nosso else
    } // fechamos nossa função
</script>