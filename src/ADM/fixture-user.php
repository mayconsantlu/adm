<?php

require_once ('config.php');
date_default_timezone_set('America/Sao_Paulo');
// verifica se a tabela existe e cria se não existir
$conexao -> query("create table if not exists tbl_usuario
                    (   id integer unsigned auto_increment not null,
                        nome varchar(150) not null,
                        usuario varchar(150) not null,
                        senha varchar(150) not null,
                        cadastro datetime not null,
                        primary key (id));");

// Limpando a tabela;
$conexao -> query("truncate table tbl_usuario;");

// cria usuario
$nome = "Usuario Administrativo";
$user = 'admin';
$senha = 'senha';
$pass = password_hash( $senha, PASSWORD_DEFAULT );

//Criando o usuario padrao
//$cadastro = date("Y");
$sql1 = "insert into tbl_usuario (nome, usuario, senha, cadastro) values ('$nome', '$user', '$pass', now())";
$stmt = $conexao->prepare($sql1);
$stmt->execute();

echo 'Passou...';