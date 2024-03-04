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

// Coleta os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];

// Prepara e executa a query de inserção
$sql = "INSERT INTO cliente (nome, email, telefone) VALUES (?, ?, ?)";
$params = array($nome, $email, $telefone);
$stmt = sqlsrv_query($conn, $sql, $params);



if ($stmt === false) {
    die("Erro ao cadastrar cliente: " . print_r(sqlsrv_errors(), true));
} else {
    echo "Cliente cadastrado com sucesso!";
}


sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
