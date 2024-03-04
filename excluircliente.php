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


// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Exclui um registro da tabela
$sql = "DELETE FROM cliente WHERE id = 1";
if ($conn->query($sql) === TRUE) {
    echo "cliente excluído com sucesso!";
} else {
    echo "Erro ao excluir cliente: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>

   