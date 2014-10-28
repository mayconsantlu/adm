<?php
session_start();
/*include_once 'includes/config.php';

//echo($_SESSION['user'].'<br>');
//echo $senha.'<br>';
//echo($_SESSION['pass']);
if ($_POST['usuario'] != "" && $_POST['senha'] != "") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    echo $usuario.' - '.$senha.' <br /> ';
    $query = ('select * from usuario where usuario = :usuario;');
    $stmt = $conexao->prepare( $query );
    $stmt->bindValue('usuario', $usuario);
    //$stmt->bindValue("senha", $senha);
    $stmt->execute();
    $result = $stmt -> fetch(PDO::FETCH_ASSOC);
    $hash = $result['senha'];
    print_r($result);
    if (password_verify($senha, $hash)) {
        //echo 'A Senha é valida';
        $_SESSION['logado']=1;
        $_SESSION['nome'] = $result['nome'];
        $_SESSION['mensagem'] = 'Você esta logago como administrador!';
        $_SESSION['classe'] = 'alert-success';
        header("Location: /");
    } else {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        $_SESSION['mensagem'] = 'Usuario ou senha incorretos, verifique os dados e tente novamente!';
        $_SESSION['classe'] = 'alert-danger';
        $_SESSION['logado'] = 0;
        header("Location: /");
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
        <div id="output"></div>
        <div class="avatar"><img src="img/logo.png" class="logoava"> </div>
        <div class="form-box">
            <form action="\home" method="post">
                <input name="usuario" id="usuario" type="text" placeholder="Usuário" >
                <div class="password">
                    <input type="password" id="senha" placeholder="senha"">
                </div>
                <button class="btn btn-info btn-block login" type="submit">Login</button>
            </form>
        </div>
    </div>
</div>