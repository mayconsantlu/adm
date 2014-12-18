<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>404 - a página que você procura não está disponível</title>
    <style type="text/css">
        body {
            background-color:#2c2c2c;
            font-family: "Droid Serif", "Helvetica Neue", Helvetica, Arial, sans-serif;
            text-align:center;
            color:#fff;
        }
        * {
            box-sizing:border-box;
        }
        .all {
            width:500px;
            margin:0px auto 0px auto;
        }
        .texto h1 {
            font-size:6em;
        }
        a {
            color:#86A644;
            text-decoration:none;
        }
        a:hover {
            color:#CC3300;
            text-decoration:none;
        }
        a:active {
            color:#E3EFFD;
            text-decoration:none;
        }
    </style>
</head>
<body>
<div class="all">
    <div class="texto">
        <h1>404</h1>
        <h3>Página não encontrada</h3>
    </div>
    <div class="img">

        <img alt="404" height="250" src="http://<?=$_SERVER["HTTP_HOST"];?>/includes/img/404.png" width="250"></div>
    <div class="home">
        <p>Desculpe, a página que você procura não está disponível.</p>
        <a href="http://<?=$_SERVER["HTTP_HOST"];?>">Voltar a página inicial</a>
    </div>
</div>
</body>
</html>
