<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Servicos</title>
</head>
<body>
    
    <table>
        <tr>
            <th>Serviço</th>
            <th>Descrição</th>
            
        </tr>
        <?php
        
        //conexao com azure
        $servername = "brigadeirosdelicias.database.windows.net";
        $username = "daniele25";
        $password = "35250516Pipoca";
        $database = "brigadeiros_delicias";

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }


        echo "<br>";

        // Seleciona todos os produtos da tabela
        $sql = "SELECT * FROM produtos";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["descricao"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 resultados";
        }

        $conn->close();
        ?>
    </table>
    
</body>
</html>
