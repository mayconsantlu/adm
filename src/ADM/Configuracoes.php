<div class="tabbable" id="tabs">
    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#site" data-toggle="tab">Configurações do Site</a>
        </li>
        <li>
            <a href="#ajustes" data-toggle="tab">Configurações de SEO</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="site">
            <div class="help-tip">
                <p>Texto de Ajuda</p>
            </div>
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
        <div class="tab-pane" id="ajustes">
            <div class="help-tip">
                <p>Ajuda de configurações de SEO</p>
            </div>
            <form class="form-horizontal">
                <fieldset>

                    <!-- Form Name -->
                    <legend>Configurações de SEO</legend>

                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="key">Palavras Chave</label>
                        <div class="col-md-4">
                            <textarea class="form-control" id="key" name="key"></textarea>
                            <span class="help-block">texto de ajuda</span>
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