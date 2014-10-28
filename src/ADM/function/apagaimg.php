<?php

function apagafoto($apagar, $conta){
    for($i=0; $i<$conta; $i++){
       $query = ('delete from tbl_fotos where id_galeria = :apagar;');
       $stmt = $conexao->prepare($query);
       // $stmt->bindValue(":apagar", $apagar);
        $stmt->bindParam(':apagar', $apagar);
        $stmt->execute();
            return true;
    }
}
//echo "Imgapaga = ".$imgapaga;
//$sqlapa = ("delete from tbl_fotos where id = '$imgapaga';");
//$stmt = $conexao->prepare($sqlapa);
//$stmt->execute();

/*
 * $conta = ("select count(id_galeria) from tbl_fotos where id_galeria = '$apagar';");
$stmt = $conexao->prepare($conta);
$stmt->execute();
$result = $stmt -> fetch(PDO::FETCH_ASSOC);
$imgapaga = $result['count(id_galeria)'];
*/