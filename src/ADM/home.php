
<div class="">
    <div class="help-tip">
        <p>Nesta página você tem um resumo do seu site.
        </p>
    </div>
    <div class="row clearfix">
        <div class="col-md-12 column">
           <h4>
               <span class="label label-primary">Você está logado como:</span>
               <span class="label label-success">
                    <?php
                        echo $_SESSION['nome'];
                    ?>
                </span>
           </h4>
        </div>
    </div>

    <hr>

    <div class="row clearfix">
        <div class="col-md-4 column">
            <div class="panel panel-info ">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Páginas cadastradas
                    </h3>
                </div>
                <div class="panel-body">
                    <?php
                    $query = "select count(titulo) from tbl_paginas;";
                    $stmt = $conexao -> prepare($query);
                    $stmt -> execute();
                    $pagina = $stmt -> fetch(PDO::FETCH_ASSOC);
                    //print_r($resultado);
                    ?>
                    Total de páginas: <span class="badge pull-right"><?=$pagina['count(titulo)'];?></span>
                </div>

            </div>
        </div>
        <div class="col-md-4 column">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Seções cadastradas
                    </h3>
                </div>
                <div class="panel-body">
                    <?php
                    $query1 = "select count(id) from tbl_secao;";
                    $stmt = $conexao -> prepare($query1);
                    $stmt -> execute();
                    $secao = $stmt -> fetch(PDO::FETCH_ASSOC);
                    //print_r($resultado);
                    ?>
                    Total de seções: <span class="badge pull-right"><?=$secao['count(id)'];?></span>
                </div>

            </div>
        </div>
        <div class="col-md-4 column">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Clientes cadastrados
                    </h3>
                </div>
                <div class="panel-body">
                    <?php
                    $query2 = "select count(id) from tbl_clientes;";
                    $stmt = $conexao -> prepare($query2);
                    $stmt -> execute();
                    $cliente = $stmt -> fetch(PDO::FETCH_ASSOC);
                    //print_r($resultado);
                    ?>
                    Total de clientes: <span class="badge pull-right"><?=$cliente['count(id)'];?></span>
                </div>

            </div>
        </div>
    </div>

    <hr>

    <div class="row clearfix">
        <div class="col-md-4 column">
            <div class="panel panel-success ">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Galerias cadastradas
                    </h3>
                </div>
                <div class="panel-body">
                    <?php
                    $query3 = "select count(id) from tbl_galerias;";
                    $stmt = $conexao -> prepare($query3);
                    $stmt -> execute();
                    $galerias = $stmt -> fetch(PDO::FETCH_ASSOC);
                    //print_r($resultado);
                    ?>
                    Total de Galerias: <span class="badge pull-right"><?=$cliente['count(id)'];?></span>
                    <br />
                    <?php
                    $query4 = "select count(id) from tbl_fotos;";
                    $stmt = $conexao -> prepare($query4);
                    $stmt -> execute();
                    $fotos = $stmt -> fetch(PDO::FETCH_ASSOC);
                    //print_r($resultado);
                    ?>
                    Com um total de fotos: <span class="badge pull-right"><?=$fotos['count(id)'];?></span>
                </div>

            </div>
        </div>
        <div class="col-md-4 column">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Produtos / Serviços cadastrados
                    </h3>
                </div>
                <div class="panel-body">
                    <?php
                    $query4 = "select count(id) from tbl_produtos;";
                    $stmt = $conexao -> prepare($query4);
                    $stmt -> execute();
                    $produtos = $stmt -> fetch(PDO::FETCH_ASSOC);
                    //print_r($resultado);
                    ?>
                    Total de Produtos / Serviços: <span class="badge pull-right"><?=$produtos['count(id)'];?></span>
                </div>

            </div>
        </div>
        <div class="col-md-4 column">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Informações diversas
                    </h3>
                </div>
                <div class="panel-body">
                    Titulo do Site: <?php echo $pegasite['titulo']; ?>
                    <br>
                    Descrição: <?php echo $pegasite['descricao']; ?>
                </div>

            </div>
        </div>
    </div>
</div>