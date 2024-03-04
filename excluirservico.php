<?php
$servername = "localhost"; // O nome do servidor é "localhost" no XAMPP
$username = "root"; // Nome de usuário padrão é "root"
$password = ""; // Senha padrão é vazia
$database = "delicias"; // Substitua "seu_banco_de_dados" pelo nome do seu banco de dados

// Cria conexão
$conn = new mysqli($servername, $username, $password, $database);


// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Exclui um registro da tabela
$sql = "DELETE FROM cadastroservico WHERE id = 1";
if ($conn->query($sql) === TRUE) {
    echo "servico excluído com sucesso!";
} else {
    echo "Erro ao excluir servico: " . $conn->error;
}

// Fecha a conexão
$conn->close();
?>
