<?php
session_start();
//$_SESSION[logado] = 0;
//define('PROJECT_DIR', 'ADM');
//define('REQUEST_URI',str_replace('/'.PROJECT_DIR,'',$_SERVER['REQUEST_URI']));

if (isset($_SESSION['logado']) && $_SESSION['logado'] == 0) {

        $getUrl = 'login';
    } else {
    $url = parse_url("http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    //$url = parse_url("http://" .str_replace('/'.PROJECT_DIR,'',$_SERVER['REQUEST_URI']));
    $getUrl = trim($url['path'], '/');
}

//$getUrl = ltrim($url['path'], '/idiomas/ADM/');
//print_r($trimmed)."\n";
//echo $getUrl. "<br/>";
print_r($url)."\n";
//print_r($getUrl);
// --------
date_default_timezone_set('America/Sao_Paulo');
require_once('config.php');
require_once('includes/function/slug.php');
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
if (($pag == 'home') or ($pag == "")) {
    $titulo = $rotas["home"];
    $conteudo = 'includes/home.php';
} elseif ($pag <> "home") {
    $titulo = $rotas[$rota];
    $conteudo = 'includes/'.$rota.'.php';
} else {
    $titulo = $rotas["404"];
    $pag = '404';
    http_response_code(404);
    $conteudo = 'includes/404.php';
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
$stmt = $conexao->prepare($site);
$stmt->execute();
$pegasite = $stmt->fetch(PDO::FETCH_ASSOC);

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

    <link href="includes/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
    <link rel="stylesheet" href="includes/css/bootstrap-image-gallery.min.css">
    <link href="includes/css/style.css" rel="stylesheet">
    <?php
    if ($rota == 'login') {
        ?>
        <link href="includes/css/login.css" rel="stylesheet">
    <?php
    }
    ?>
    <link href='http://fonts.googleapis.com/css?family=Lato|Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//www.fuelcdn.com/fuelux/3.1.0/css/fuelux.min.css">

    <link href="includes/editor/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="includes/editor/css/froala_editor.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <!--link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css"-->
    <link href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css"
          rel="stylesheet" type="text/css">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->

    <link rel="shortcut icon" href="includes/img/favicon-logo.png">

</head>
<body>
<header>
    <div class="container sp">
        <!-- Menu superior -->
        <div class="row clearfix" id="menu_topo">
            <div class="col-md-12 column">
                <?php
                if ($rota != 'login') {
                    require_once 'includes/Topmenu.php';
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
                if ($rota != 'login') {
                    require_once 'includes/bread.php';
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
<?php
if ($rota != 'login') {
    ?>
    <footer class="rodape">
        <!-- Rodape -->
        <p class="text-center">Todos os direitos reservados <?= date("Y"); ?></p>
        <!-- Rodape -->
    </footer>
<?php
}
?>

<!-- Modal para mostar as imagens -->
<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery" data-use-bootstrap-modal="false">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal para mostar as imagens -->

<!-- Latest compiled and minified JavaScript
    <!-- jQuery -->
<script type="text/javascript" src="includes/js/scripts.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//www.fuelcdn.com/fuelux/3.1.0/js/fuelux.min.js"></script>
<script src="includes/js/bootstrap.file-input.js"></script>
<!-- Galeria -->
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<script src="includes/js/bootstrap-image-gallery.min.js"></script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>
<script charset="utf8" type="text/javascript"
        src="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>

<!-- Froala Editor -->
<script src="includes/editor/js/froala_editor.min.js"></script>
<!--[if lt IE 9]>
<script src="../js/froala_editor_ie8.min.js"></script>
<![endif]-->
<script src="includes/editor/js/plugins/tables.min.js"></script>
<script src="includes/editor/js/plugins/lists.min.js"></script>
<script src="includes/editor/js/plugins/colors.min.js"></script>
<script src="includes/editor/js/plugins/media_manager.min.js"></script>
<script src="includes/editor/js/plugins/file_upload.min.js"></script>
<script src="includes/editor/js/plugins/font_family.min.js"></script>
<script src="includes/editor/js/plugins/font_size.min.js"></script>
<script src="includes/editor/js/plugins/block_styles.min.js"></script>
<script src="includes/editor/js/plugins/video.min.js"></script>
<script src="includes/editor/js/langs/pt_br.js"></script>
<script>
    $(function () {
        $('#evento')
            .editable({
                inlineMode: false,
                language: 'pt_br',
                // Set the image upload URL.
                imageUploadURL: 'includes/upload_image.php',

                imageUploadParams: {id: "evento"}
            });
        $('#texto')
            .editable({
                inlineMode: false,
                language: 'pt_br',
                // Set the image upload URL.
                imageUploadURL: 'includes/upload_image.php',

                imageUploadParams: {id: "texto"}
            });
    });
</script>
<!-- Mascara de campos -->
<!--script type="text/javascript" src="js/jquery-1.2.6.pack.js"-->
</script>
<script type="text/javascript" src="includes/js/jquery.maskedinput-1.1.4.pack.js"/>
</script>
<script type = "text/javascript" >
    $(document).ready(function () {
        $("#cnpj").mask("99.999.999/9999-99");
            $("#data").mask("99/99/9999");
            $("#telefone").mask("99 9999-9999?9");
            $("#telefone2").mask("99 9999-9999?9");
            $("#celular").mask("99 9999-9999?9")

    });
//campo file personalizado
$('input[type=file]').bootstrapFileInput();
$('.file-inputs').bootstrapFileInput();

</script>
<script type="text/javascript">
    $(document).ready(function () {
        // DataTables
        $('#tabela').DataTable({
            language: {
                emptyTable: "Nenhum registro Encontrado",
                info: "Exibindo de _START_ até _END_ de _TOTAL_ Registros",
                infoEmpty: "Exibindo 0 Ate 0 de 0 Registros",
                infoFiltered: "(registros Filtrados de _MAX_)",
                infoPostFix: "",
                infoThousands: ".",
                lengthMenu: "_MENU_ Resultados por página",
                loadingRecords: "Carregando ...",
                processing: "Processando ...",
                zeroRecords: "Nenhum registro Encontrado",
                search: "Pesquisar",
                paginate: {
                    next: "Próximo",
                    previous: "anterior",
                    first: "Primeiro",
                    last: "Último"
                },
                aria: {
                    sortAscending: ": Ordenar Colunas de forma ascendente",
                    sortDescending: ": Ordenar Colunas de forma descendente"
                }
            }
        });

    });
</script>
</body>
</html>
