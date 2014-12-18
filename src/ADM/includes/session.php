<?php
if (isset($_SESSION['logado']) && $_SESSION['logado'] == 1 ){
    echo $_SESSION['logado'].' - Logado';
}else {
    echo 'não ta Logado';
}