<?php
session_start();
//echo $_SESSION['teste'];
if ($_GET['titulo'] <> " " and $_GET['inserir']){
    $_SESSION['galeria'] = $_GET['inserir'];
    $titulo = $_GET['titulo'];
}
else{
    $titulo = 'Sem informações você deve acessar pela galeria';
}

?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8"/>
		<title>Envio de imagens</title>

		<!-- Google web fonts -->
		<link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />
        <!--link href="/css/bootstrap.min.css" rel="stylesheet"-->
		<!-- The main CSS file -->
		<link href="assets/css/style.css" rel="stylesheet" />
	</head>

	<body>
<div class="topo">
    <h3 class="centrer">Inserindo fotos para a galeria: <?php echo $_SESSION['galeria']." - ".$titulo; ?> - <a href="/galerias">Cancelar / Voltar</a></h3>
    <h4 class="centrer">OBS: Imagens de até 5MB</h4>
</div>
		<form id="upload" method="post" action="upload.php" enctype="multipart/form-data">
			<div id="drop">
				Arraste aqui ou

				<a>Selecione</a>
				<input type="file" name="upl" multiple />
			</div>

			<ul>
				<!-- The file uploads will be shown here -->
			</ul>

		</form>

		<footer>

        </footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="//www.fuelcdn.com/fuelux/3.1.0/js/fuelux.min.js"></script>

        <!-- JavaScript Includes -->
		<!--script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script-->
		<script src="assets/js/jquery.knob.js"></script>

		<!-- jQuery File Upload Dependencies -->
		<script src="assets/js/jquery.ui.widget.js"></script>
		<script src="assets/js/jquery.iframe-transport.js"></script>
		<script src="assets/js/jquery.fileupload.js"></script>
		
		<!-- Our main JS file -->
		<script src="assets/js/script.js"></script>

	</body>
</html>