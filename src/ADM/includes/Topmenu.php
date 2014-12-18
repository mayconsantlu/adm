        <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="http://<?=$_SERVER["HTTP_HOST"];?>/admin"><img src="http://<?=$_SERVER["HTTP_HOST"];?>/includes/img/logo.png" title="Area Administrativa"></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="">
                        <a href="http://<?=$_SERVER["HTTP_HOST"];?>/admin/paginas">Páginas</a>
                    </li>
                    <li>
                        <a href="http://<?=$_SERVER["HTTP_HOST"];?>/admin/secoes">Seções</a>
                    </li>
                    <li>
                        <a href="http://<?=$_SERVER["HTTP_HOST"];?>/admin/galerias">Galerias</a>
                    </li>
                    <li>
                        <a href="http://<?=$_SERVER["HTTP_HOST"];?>/admin/formularios">Formulários</a>
                    </li>
                    <li>
                        <a href="http://<?=$_SERVER["HTTP_HOST"];?>/admin/produtos">Produtos / Serviços</a>
                    </li>
                    <li>
                        <a href="http://<?=$_SERVER["HTTP_HOST"];?>/admin/clientes">Clientes</a>
                    </li>
                    <li>
                        <a href="http://<?=$_SERVER["HTTP_HOST"];?>/admin/contato">Contato</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right padding-rigth">
                    <li>
                        <a href="http://www.mjsite.com.br" target="_blank">MJ</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Opções<strong class="caret"></strong></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="http://<?=$_SERVER["HTTP_HOST"];?>/admin/usuario">Usuário</a>
                            </li>
                            <li>
                                <a href="http://<?=$_SERVER["HTTP_HOST"];?>">Ver Site</a>
                            </li>
                            <li>
                                <a href="http://<?=$_SERVER["HTTP_HOST"];?>/admin/configuracoes">Configurações</a>
                            </li>
                            <li class="divider">
                            </li>
                            <li>
                                <a href="http://<?=$_SERVER["HTTP_HOST"];?>/sair.php">Sair</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
    </div>