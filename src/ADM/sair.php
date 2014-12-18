<?php
session_start();
unset($_SESSION['usuario']);
unset($_SESSION['senha']);
unset($_SESSION['mensagem']);
unset($_SESSION['nome']);
unset($_SESSION['logado']);
//$_SESSION['logado'] = 0;
header("Location: http://localhost:8090/admin/login");