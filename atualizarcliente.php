<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Cliente</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* style.css */

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    
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
    
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form action="cadastro_cliente.php" method="POST">
                <input type="hidden" name="id_atualizarcliente" value="<?php echo $row['id_atualizarcliente']; ?>">
                <label for="nome">Nome:</label><br>
                <input type="text" id="nome" name="nome" value="<?php echo $row['nome']; ?>"><br>
                <label for="email">email:</label><br>
                <input type="text" id="email" name="email" value="<?php echo $row['email']; ?>"><br>
                <label for="telefone">Telefone:</label><br>
                <input type="text" id="telefone" name="telefone" value="<?php echo $row['telefone']; ?>"><br>
                <button type="submit">Atualizar Cliente</button>
            </form>
            <?php
        } else {
            echo "Cliente não encontrado.";
        }

    $conn->close();
    ?>
   
    
</body>
</html>
