<?php

require_once ('config.php');
date_default_timezone_set('America/Sao_Paulo');
// verifica se a tabela existe e cria se não existir
$conexao -> query("create table if not exists tbl_paginas
                  ( id integer unsigned auto_increment not null,
                    titulo varchar(200) not null,
                    slug varchar(250) not null,
                    metadesc varchar(200) not null,
                    texto text null,
	                cadastro datetime not null,
                    primary key (id));");

// Limpando a tabela;
$conexao -> query("truncate table tbl_paginas;");

// cria paginas
$titulo1 = "Nova Página";
$slug1 = 'nova-pagina';
$metadesc = 'Descrição para otimização da página';
$texto1 = 'Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis. Mé faiz elementum girarzis, nisi eros vermeio, in elementis mé pra quem é amistosis quis leo. Manduma pindureta quium dia nois paga. Sapien in monti palavris qui num significa nadis i pareci latim. Interessantiss quisso pudia ce receita de bolis, mais bolis eu num gostis.';

//Criando as páginas de teste
//$cadastro = date("Y");
$sql3 = "insert into tbl_paginas (titulo, slug, metadesc, texto, cadastro) values ('$titulo1', '$slug1', '$metadesc', '$texto1', now())";
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

// cria configurações
// verifica se a tabela existe e cria se não existir
$conexao -> query("create table if not exists tbl_config
                 (  id integer unsigned auto_increment not null,
                    titulo varchar(250) not null,
                    descricao varchar(250) not null,
                    chave varchar(250) not null,
                    cadastro datetime not null,
                    primary key (id));");

// Limpando a tabela;
$conexao -> query("truncate table tbl_config;");
// Informando os dados
$titulo = "Titulo do Site";
$descricao = "Descrição do Site";
$chave = "Palavras chave so site";

//Criando as páginas de teste
//$cadastro = date("Y");
$sql8 = "insert into tbl_config (titulo, descricao, chave, cadastro) values ('$titulo', '$descricao', '$chave', now())";
$stmt = $conexao->prepare($sql8);
$stmt->execute();
echo 'Passou configuracao'."\n";

// cria cliente
// verifica se a tabela existe e cria se não existir
$conexao -> query("create table if not exists tbl_clientes
                 (  id integer unsigned auto_increment not null,
                    nome varchar(200) not null,
                    cnpj varchar(20) not null,
                    contato varchar(200) null,
                    email varchar(200) not null,
                    telefone varchar(300) null,
                    obs text null,
                    cadastro datetime not null,
                    primary key (id));");

// Limpando a tabela;
$conexao -> query("truncate table tbl_clientes;");
// Informando os dados
$nome = "nome do cliente";
$cnpj = "00.000.000/0000-0";
$contato = "Pessoa de contato";
$email = "email@email.com.br";
$telefone = "41 99420273";
$obs = "Bom cliente ou mau cliente, quem sabe né";
//Criando as páginas de teste
//$cadastro = date("Y");
$sql9 = "insert into tbl_clientes (nome, cnpj, contato, email, telefone, obs, cadastro) values ('$nome', '$cnpj', '$contato', '$email', '$telefone','$obs', now())";
$stmt = $conexao->prepare($sql9);
$stmt->execute();
echo 'Passou cliente'."\n";

// cria contato
// verifica se a tabela existe e cria se não existir
$conexao -> query("create table if not exists tbl_contato
                 (  id integer unsigned auto_increment not null,
                    nome varchar(200) not null,
                    endereco varchar(250) null,
                    numero varchar(30) null,
                    complemento varchar(150) null,
                    bairro varchar(100) null,
                    cidade varchar(200) null,
                    estado varchar(5) null,
                    contato varchar(200) null,
                    telefone varchar(14) null,
                    telefone2 varchar(14) null,
                    celular varchar(214) null,
                    email varchar(200) null,
                    email2 varchar(200) null,
                    mapa text null,
                    facebook varchar(120) null,
                    twitter varchar(120) null,
                    cadastro datetime not null,
                    primary key (id));");

// Limpando a tabela;
$conexao -> query("truncate table tbl_contato;");
// Informando os dados
$nome = "Nome da Empresa";
$endereco = "Rua da empresa";
$numero = "123";
$complemento = "Baracão 2";
$bairro = "Bairro";
$telefone = "41 3333-3333";
//Criando as páginas de teste
//$cadastro = date("Y");
$sqlc = "insert into tbl_contato (nome, endereco, numero, complemento, bairro, telefone, cadastro) values ('$nome', '$endereco', '$numero', '$complemento','$bairro', '$telefone',now())";
$stmt = $conexao->prepare($sqlc);
$stmt->execute();
echo 'Passou contato'."\n";

// cria produto serviço
// verifica se a tabela existe e cria se não existir
$conexao -> query("create table if not exists tbl_produtos
                 (  id integer unsigned auto_increment not null,
                    titulo varchar(200) null,
                    imagem varchar(250) null,
                    descricao text null,
                    link varchar(200) null,
                    valor decimal(10,2) null,
                    cadastro datetime not null,
                    primary key (id));");

// Limpando a tabela;
$conexao -> query("truncate table tbl_produtos;");
// Informando os dados
$titulo = "Titulo do produto";
$imagem = "galeria/uploads/sem-imagem.jpg";
$descricao = "Descrição do produto ou serviço";
$link = "";
$valor = "120.90";
//$cadastro = date("Y");
$sqlc2 = "insert into tbl_produtos (titulo, imagem, descricao, link, valor, cadastro) values ('$titulo', '$imagem', '$descricao', '$link', '$valor', now())";
$stmt = $conexao->prepare($sqlc2);
$stmt->execute();
echo 'Passou produto'."\n";


// cria usuario
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
$sqluser = "insert into tbl_usuario (nome, usuario, senha, cadastro) values ('$nome', '$user', '$pass', now())";
$stmt = $conexao->prepare($sqluser);
$stmt->execute();
echo 'Passou usuario'."\n";