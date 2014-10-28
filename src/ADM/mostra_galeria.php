<?php
$msg = 0;
if (isset($_GET['visualizar'])) {
    $visualizar = $_GET['visualizar'];
}else {
    $msg = 3;
}
$query = "select * from tbl_fotos where id_galeria = '$visualizar';";
$stmt = $conexao -> prepare($query);
$stmt -> execute();


?>
<div class="container">
    <div class="help-tip">
        <p>Você está visualizando as fotos da galeria, clique em [ Voltar ] para visualizar a listagem.
        </p>
    </div>
    <div class="btn-group btn-group-md panel-body">
        <a href="/galerias" class="btn btn-success" type="button"><em class="glyphicon glyphicon-chevron-left"></em> Voltar</a>
    </div>
</div>

<div class="container">
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
<!-- The container for the list of example images -->

<div id="links">
    <?php
    // Mostra os paginas
    //foreach($resultado as $paginas) {
    if($stmt->rowCount()>0){
    while($resultado = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        ?>
            <a href="galeria/<?php echo $resultado['img']; ?>" title="<?php echo $resultado['titulo']; ?>" data-gallery>
                <img src="galeria/<?php echo $resultado['img']; ?>" alt="<?php echo $resultado['titulo']; ?>" height="100px" class="thumbnail-mostra">
            </a>

    <?php
    }
    }else { ?>
        <div class="alert alert-dismissable alert-warning">
            <button type="button" class="close " data-dismiss="alert" aria-hidden="true">×</button>
            <span class="glyphicon glyphicon-warning-sign"></span> <strong> Ops..</strong> Não existem imagens nesta galeria, clique em Voltar e insira algumas imagens!
        </div>
    <?php } ?>

</div>
</div>
<br>

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