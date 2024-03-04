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

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Recupera os dados do formulário e sanitiza
    $produto = mysqli_real_escape_string($conn, $_POST["nome"]);
    $descricao = mysqli_real_escape_string($conn, $_POST["descricao"]);

    // Atualiza os dados na tabela
    $sql = "UPDATE produtos SET descricao='$descricao' WHERE nome='$nome'";

    if ($conn->query($sql) === TRUE) {
        echo "Produto atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o produto: " . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
}
?>
