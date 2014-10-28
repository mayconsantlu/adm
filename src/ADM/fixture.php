<?php

require_once ('config.php');
date_default_timezone_set('America/Sao_Paulo');
// verifica se a tabela existe e cria se não existir
$conexao -> query("create table if not exists tbl_paginas
                  ( id integer unsigned auto_increment not null,
                    titulo varchar(200) not null,
                    slug varchar(250) not null,
                    texto text null,
	                cadastro datetime not null,
                    primary key (id));");

// Limpando a tabela;
$conexao -> query("truncate table tbl_paginas;");

// cria paginas
$titulo1 = "Nova Página";
$slug1 = 'nova-pagina';
$texto1 = 'Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.';

//Criando as páginas de teste
//$cadastro = date("Y");
$sql3 = "insert into tbl_paginas (titulo, slug, texto, cadastro) values ('$titulo1', '$slug1', '$texto1', now())";
$stmt = $conexao->prepare($sql3);
$stmt->execute();
// cria paginas
$titulo = "Pagina inicial";
$slug = 'pagina-inicial';
$texto = 'Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.';

//Criando as páginas de teste
//$cadastro = date("Y");
$sql1 = "insert into tbl_paginas (titulo, slug, texto, cadastro) values ('$titulo', '$slug', '$texto', now())";
$stmt = $conexao->prepare($sql1);
$stmt->execute();
echo ('Passou pagina'. "\n");

// verifica se a tabela existe e cria se não existir
$conexao -> query("create table if not exists tbl_secao
                  ( id integer unsigned auto_increment not null,
                    titulo varchar(200) not null,
                    slug varchar(250) not null,
                    texto text null,
	                cadastro datetime not null,
                    primary key (id));");

// Limpando a tabela;
$conexao -> query("truncate table tbl_secao;");

// cria usuario
$titulo = "Primeira Seção";
$slug = 'primeira-secao';
$texto = 'Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.';

//Criando as páginas de teste
//$cadastro = date("Y");
$sql2 = "insert into tbl_secao (titulo, slug, texto, cadastro) values ('$titulo', '$slug', '$texto', now())";
$stmt = $conexao->prepare($sql2);
$stmt->execute();
echo 'Passou secao'."\n";

// verifica se a tabela existe e cria se não existir
$conexao -> query("create table if not exists tbl_galerias
                     (  id integer unsigned auto_increment not null,
                        titulo varchar(200) not null,
                        obs text null,
                        data_evento varchar(30) null,
                        cadastro datetime not null,
                        primary key (id));");

// Limpando a tabela;
$conexao -> query("truncate table tbl_galerias;");

// cria galeria
$titulo = "Evento na loja Francolino";
$obs = 'Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis.';
$data_evento = '2014-10-14';
//Criando as páginas de teste
//$cadastro = date("Y");
$sql4 = "insert into tbl_galerias (titulo, obs, data_evento, cadastro) values ('$titulo', '$obs', '$data_evento', now())";
$stmt = $conexao->prepare($sql4);
$stmt->execute();
echo 'Passou galeria'."\n";
// Fotos
// verifica se a tabela existe e cria se não existir
$conexao -> query("create table if not exists tbl_fotos
                 (  id integer unsigned auto_increment not null,
                    id_galeria integer unsigned not null,
                    titulo varchar(200) not null,
                    img varchar(200) not null,
                    cadastro datetime not null,
                    primary key (id));");

// Limpando a tabela;
$conexao -> query("truncate table tbl_fotos;");

// cria galeria
$id_galeria = 1;
$titulo = 'Imagem Teste';
$img = 'uploads/imagem-teste.jpg';
//Criando a foto de teste
$sql5 = "insert into tbl_fotos(id_galeria, titulo, img, cadastro) values ('$id_galeria','$titulo', '$img', now())";
$stmt = $conexao->prepare($sql5);
$stmt->execute();
echo 'Passou fotos'."\n";



// cria formularios
// verifica se a tabela existe e cria se não existir
$conexao -> query("create table if not exists tbl_formularios
                  (  id integer unsigned auto_increment not null,
                    email varchar(200) not null,
                    email2 varchar(200) not null,
                    tipo varchar(2) not null,
                    mensagem varchar(300) null,
                    cadastro datetime not null,
                    primary key (id));");

// Limpando a tabela;
$conexao -> query("truncate table tbl_formularios;");
// Informando os dados
$email = "email@meudominio.com.br";
$email2 = "email2@meudominio.com.br";
$mensagem = "Sua mensagem que apareceça após envio pelo cliente";
$tipo = 0; // Contato
$tipo2 = 1; // Orçamento
//Criando as páginas de teste
//$cadastro = date("Y");
$sql6 = "insert into tbl_formularios (email, email2, tipo, mensagem, cadastro) values ('$email', '$email2', '$tipo', '$mensagem', now())";
$stmt = $conexao->prepare($sql6);
$stmt->execute();
echo 'Passou formulario contato'."\n";
// orçamento
$sql7 = "insert into tbl_formularios (email, email2, tipo, mensagem, cadastro) values ('$email', '$email2', '$tipo2','$mensagem', now())";
$stmt = $conexao->prepare($sql7);
$stmt->execute();
echo 'Passou formulario Orcamento'."\n";