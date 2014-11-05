<?php
/*
* Arquivo de Configuracao
*/
// Banco de dados
$host = 'localhost';
$db = 'mj';
$user = 'root';
$pass = 'root';
try {
    $conexao = new \PDO("mysql:host=$host; dbname=$db", "$user", "$pass");
    #$resultado = $conexao->exec($query); //exec rodar varios comandos de criação ou inserção
}
catch(\PDOException $e) {
    echo "Nao foi possivel estabelecer a conexao com o Bando de Dados<br/>" .$e->getMessage().": ".$e->getCode();
}

// Rotas
$rotas = array(
    "home" => "Seja bem vindo ao nosso ADM!",
    "paginas" => "Paginas do site",
    "secoes" => "Seções do site",
    "galerias" => "Galerias de fotos",
    "formularios" => "Formulários",
    "ajuda" => "Ajuda",
    "login" => "Entrar - Acesso ao ADM",
	"cria_galeria" => "Criando a Galeria de fotos",
    "altera_galeria" => "Alteração de dados da Galeria de fotos",
    "mostra_galeria" => "Visualizar imagems da Galeria",
    "apaga_galeria" => "Apagar a Galeria",
    "cria_pagina" => "Inserindo a página ao site",
    "altera_pagina" => "Alterando os dados da página",
    "cria_secao" => "Inserindo as seções ao site",
    "altera_secao" => "Alterando as seções do site",
    "configuracoes" => "Configurações",
    "clientes" => "Listagem de clientes cadastrados no Site",
    "contato" => "Dados de contato da sua empresa no Site",
    "404" => "404 - Página não encontrada"
);