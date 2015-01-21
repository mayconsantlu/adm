<?php
//session_start();
include_once 'config.php';

//echo($_SESSION['user'].'<br>');
//echo $senha.'<br>';
//echo($_SESSION['pass']);
$msg = 0;
if (isset($_POST['usuario'])) {
    if ($_POST['usuario'] != "" && $_POST['senha'] != "") {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        //echo $usuario.' - '.$senha.' <br /> ';
        $query = ('select * from tbl_usuario where usuario = :usuario;');
        $stmt = $conexao->prepare($query);
        $stmt->bindValue(':usuario', $usuario);
        //$stmt->bindValue("senha", $senha);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $hash = $result['senha'];
        //print_r($result);
        if (password_verify($senha, $hash)) {
            //echo 'A Senha é valida';
            $_SESSION['logado'] = true;
            $_SESSION['nome'] = $result['nome'];
            //$_SESSION['mensagem'] = 'Você esta logago como administrador!';
            //$_SESSION['classe'] = 'alert-success';
            $msg = 1;
            header('Location: http://'.$_SERVER["HTTP_HOST"].'/admin');
        } else {
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            $_SESSION['mensagem'] = 'Usuario ou senha incorretos, verifique os dados e tente novamente!';
            $_SESSION['classe'] = 'alert-danger';
            $_SESSION['logado'] = 0;
            $msg = 2;
            //header("Location: ");
        }
// ajustar aqui.
    } elseif ($_POST['usuario'] == "" or $_POST['senha'] == "") {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        $_SESSION['mensagem'] = 'Os campos são obrigatórios verifique os dados e tente novamente!';
        $_SESSION['classe'] = 'alert-danger';
        $_SESSION['logado'] = 0;
        $msg = 2;
    }
}
    /*if ($result){
        $_SESSION['logado']=1;
        $_SESSION['mensagem'] = 'Você esta logago como administrador!';
        $_SESSION['classe'] = 'alert-success';
        header("Location: /");
    }*/
/*    exit;
}else {
    $_SESSION['logado']=0;
    $_SESSION['classe'] = 'alert-danger';
    $_SESSION['mensagem'] = 'Os campos não podem ficar em branco - Clique em login no topo da página e insira seu usuário e senha';
    header("Location: /");
}*/
?>
<div class="container">
    <div class="login-container">
        <h4 class="text-info">Acesso administrativo</h4>
        <!--div id="output">
        </div-->
        <div class="avatar"><img src="http://<?=$_SERVER["HTTP_HOST"];?>/includes/img/logo.png" class="logoava"> </div>
        <?php if ($msg == 2): ?>
            <div class="alert alert-dismissable <?php echo $_SESSION['classe']; ?>">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $_SESSION['mensagem']; ?>
            </div>
        <?php endif; ?>
        <div class="form-box">
            <form action="" method="post">
                <input name="usuario" id="usuario" required="" type="text" placeholder="Usuário" >
                <div class="password">
                    <input type="password" id="senha"  required="" name="senha" placeholder="senha"">
                </div>
                <button class="btn btn-info btn-block login" type="submit">Login</button>
            </form>
        </div>
    </div>
    <a class="center-block btn margin-top-negative" href="http://<?=$_SERVER["HTTP_HOST"];?>"><span class="glyphicon glyphicon-chevron-left" ></span> voltar ao site <span class="glyphicon glyphicon-chevron-right" ></span></a>
</div>