<?php
session_start();
//$_SESSION[logado] = 0;


$url = parse_url("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
$getUrl = trim($url['path'], '/');
//echo $getUrl. "<br/>";
// --------
date_default_timezone_set('America/Sao_Paulo');
require_once ('config.php');
require_once ('function/slug.php');
// --------
// Consulta
if ($getUrl != "") {
    $rota = $getUrl;
} else {
    $rota = 'home';
}
//<!-- titulo e url -->
	// pega os dados pelo get e verifica se não está em branco
		if (isset($getUrl) != "") {
            $pag = $getUrl;
        } else {
            $pag = "";
        }
		// ajusta os titulos e paginas e verifica se existe
        if (($pag == 'home') or ($pag == ""))
        {
            $titulo = $rotas["home"];
            $conteudo = 'home.php';
        }elseif ($pag <> "home")
        {
            $titulo = $rotas[$rota];
            $conteudo = $rota.'.php';
        }else
        {
            $titulo = $rotas["404"];
            $pag = '404';
            http_response_code(404);
        }
/*
        if (($pag == 'home') or ($pag == "")) {
            $titulo = $rotas["home"];
            $conteudo = 'home.php';
        } elseif ($pag == 'paginas') {
            $titulo = $rotas["paginas"];
            $conteudo = 'paginas.php';
        } elseif ($pag == 'secoes') {
            $titulo = $rotas["secoes"];
            $conteudo = 'secoes.php';
        } elseif ($pag == 'servicos') {
            $titulo = $rotas["servicos"];
            $conteudo = $resultado['conteudo'];
        } elseif ($pag == 'contato') {
            $titulo = $rotas["contato"];
            $conteudo = $resultado['conteudo'];
            //$conteudo = 'includes/contato.php';
        } elseif ($pag == 'busca') {
            $titulo = $rotas["busca"];
        } else {
            $titulo = $rotas["404"];
            $pag = '404';
            http_response_code(404);
        }
*/
 //<!-- titulo e url -->
//pega info do site
$site = "Select * from tbl_config";
$stmt = $conexao -> prepare($site);
$stmt -> execute();
$pegasite = $stmt -> fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Adm - <?php echo $pegasite['titulo']; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Maycon Luczynski">
  <meta name="robots" content="noindex, nofollow">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page.-->
	
	<link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <link rel="stylesheet" href="css/bootstrap-image-gallery.min.css">
	<link href="/css/style.css" rel="stylesheet">
    <?php
    if ($rota == 'login'){
        ?>
        <link href="/css/login.css" rel="stylesheet">
    <?php
    }
    ?>
    <link href='http://fonts.googleapis.com/css?family=Lato|Ubuntu+Condensed' rel='stylesheet' type='text/css'>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//www.fuelcdn.com/fuelux/3.1.0/css/fuelux.min.css">

    <link href="editor/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="editor/css/froala_editor.min.css" rel="stylesheet" type="text/css">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <![endif]-->

  <!-- Fav and touch icons -->

  <link rel="shortcut icon" href="img/favicon-logo.png">
  
</head>
<body>
<header>
    <div class="container sp">
        <!-- Menu superior -->
        <div class="row clearfix" id="menu_topo">
            <div class="col-md-12 column">
                <?php
                if ($rota != 'login'){
                    require_once 'Topmenu.php';
                }
                ?>
            </div>
        </div>
        <!-- Menu superior -->
    </div>
</header>
<section class="min-height">
    <div class="container">
            <div class="row clearfix">
                <!-- Area de informacoes -->
                <div class="col-md-12 column">
                    <?php
                    if ($rota != 'login'){
                        require_once 'bread.php';
                    }
                    //require_once 'paginas.php';
                    require_once $conteudo;
                    ?>

                    <?php
                    /*if ($pag == 'contato') {
                        echo($conteudo);
                        require_once ('includes/contato.php');
                    } elseif ($pag == '404') {
                        require_once ('includes/404.php');
                    }elseif ($pag == 'busca') {
                        require_once ('includes/busca.php');
                        //echo 'Teste ok';
                    } else {
                        echo($conteudo);
                    }*/
                    ?>

                </div>
                <!-- Area de informacoes -->
            </div>
    </div>
</section>
<footer class="rodape">
            <!-- Rodape -->
                    <p class="text-center">Todos os direitos reservados <?= date("Y"); ?></p>
            <!-- Rodape -->
</footer>
	<!-- Latest compiled and minified JavaScript 
	    <!-- jQuery -->
    <script type="text/javascript" src="js/scripts.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//www.fuelcdn.com/fuelux/3.1.0/js/fuelux.min.js"></script>
    <!-- Galeria -->
    <script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <script src="js/bootstrap-image-gallery.min.js"></script>
    <!--script type="text/javascript" src="function/login.js"></script-->
        <script src="editor/js/froala_editor.min.js"></script>
        <!--[if lt IE 9]>
        <script src="../js/froala_editor_ie8.min.js"></script>
        <![endif]-->
        <script src="editor/js/plugins/tables.min.js"></script>
        <script src="editor/js/plugins/lists.min.js"></script>
        <script src="editor/js/plugins/colors.min.js"></script>
        <script src="editor/js/plugins/media_manager.min.js"></script>
        <script src="editor/js/plugins/file_upload.min.js"></script>
        <script src="editor/js/plugins/font_family.min.js"></script>
        <script src="editor/js/plugins/font_size.min.js"></script>
        <script src="editor/js/plugins/block_styles.min.js"></script>
        <script src="editor/js/plugins/video.min.js"></script>
        <script src="editor/js/langs/pt_br.js"></script>
        <script>
            $(function(){
                $('#evento')
                    .editable({
                        inlineMode: false,
                        language: 'pt_br',
                        // Set the image upload URL.
                        imageUploadURL: 'upload_image.php',

                        imageUploadParams: {id: "evento"}
                    });
                $('#texto')
                    .editable({
                        inlineMode: false,
                        language: 'pt_br',
                        // Set the image upload URL.
                        imageUploadURL: 'upload_image.php',

                        imageUploadParams: {id: "texto"}
                    });

            });
        </script>


</body>
</html>
