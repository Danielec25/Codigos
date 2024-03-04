<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:brigadeirosdelicias.database.windows.net,1433; Database = brigadeiros_delicias", "daniele25", "35250516Pipoca");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// Função para conectar utilizando PDO
function connectToSQLServer($serverName, $connectionInfo, $sqlsrv_connect, $sqlsrv_errors, $sqlsrv_query, $sqlsrv_close) {
    try {
        $conn = new PDO("sqlsrv:server = $serverName; Database = " . $connectionInfo['Database'], $connectionInfo['UID'], $connectionInfo['pwd']);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        print("Error connecting to SQL Server.");
        die(print_r($e));
    }
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "daniele25", "pwd" => "35250516Pipoca", "Database" => "brigadeiros_delicias", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:brigadeirosdelicias.database.windows.net,1433";
$conn = connectToSQLServer($serverName, $connectionInfo, $sqlsrv_connect, $sqlsrv_errors, $sqlsrv_query, $sqlsrv_close);
?>
