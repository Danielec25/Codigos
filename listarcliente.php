<?php

//conexao com azure
$servername = "brigadeirosdelicias.database.windows.net";
$username = "daniele25";
$password = "35250516Pipoca";
$database = "brigadeiros_delicias";

$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} else {
    echo "Conexão bem-sucedida!";
}
echo"<br>";
$sql = "SELECT * FROM cliente";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Saída de dados de cada linha
    while($row = $result->fetch_assoc()) {
        echo "Nome: " . $row["nome"]. " - Email: " . $row["email"]. " - Telefone: " . $row["telefone"]. "<br>";
    }
} else {
    echo "0 resultados";
}
?>
