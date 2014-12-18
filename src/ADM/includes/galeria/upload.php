<?php
session_start();
require_once '../function/slug.php';
require_once '../../config.php';

// A list of permitted file extensions
$allowed = array('png', 'jpg', 'gif','zip');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}
    // ajustes do nome da imagem para titulo
    $nome = $_FILES['upl']['name'];
    $ajuste = substr_replace($nome, "", -4); //remove 4 caracteres do final da string ".jpg"
    #$arquivo = slug($_FILES['upl']['name']).'.'.$extension;
    $arquivo = slug($ajuste).'.'.$extension; // prepara o mone da imagem deixando amigavel
    // move os arquivos
	if(move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/'.$arquivo)){ //$_FILES['upl']['name']
		echo '{"status":"success"}';
        $id_galeria = $_SESSION['galeria']; #1; //pega id da galeria por get
        $titulo = $ajuste; //$_FILES['upl']['name'];
        $img = 'uploads/'.$arquivo; //define o local de salvamento para o banco
        //insere os dados na tabela
        $sql1 = "insert into tbl_fotos (id_galeria, titulo, img, cadastro) values ('$id_galeria', '$titulo', '$img', now())";
        $stmt = $conexao->prepare($sql1);
        $stmt->execute();
		exit;
	}
}

echo '{"status":"error"}';
exit;