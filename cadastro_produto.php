<?php

// Configurações do banco de dados (ajuste conforme suas configurações)
$serverName = "brigadeirosdelicias.database.windows.net";
$connectionOptions = array(
    "Database" => "brigadeiros_delicias",
    "Uid" => "daniele25",
    "PWD" => "35250516Pipoca"
);



// Estabelece conexão com o banco de dados SQL Server
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die("Falha na conexão com o banco de dados: " . print_r(sqlsrv_errors(), true));
    
    }


// Recupera os dados do formulário
$produto = $_POST["nome"];
$descricao = $_POST["descricao"];

// Insere os dados na tabela
$sql = "INSERT INTO produtos (nome, descricao) VALUES ('$nome', '$descricao')";

if ($conn->query($sql) === TRUE) {
    echo "Produto cadastrado com sucesso!";
} else {
    echo "Erro ao cadastrar o produto: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>