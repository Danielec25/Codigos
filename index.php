<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doceria</title>
    <link rel="stylesheet" href="style.css">
    <style>
    
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    header {
        background-color: #FF69B4;
        padding: 20px 0;
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    nav ul li {
        display: inline;
        margin-right: 20px;
    }

    nav ul li a {
        text-decoration: none;
        color: #FFFFFF;
        font-size: 18px;
    }

    .container {
        max-width: 800px;
        margin: 50px auto;
        text-align: center;
    }

    .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
    }

    .mySlides {
        display: none;
    }

    img {
        width: 100%;
    }

    .prev, .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        margin-top: -22px;
        padding: 16px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
    }

    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    .prev:hover, .next:hover {
        background-color: rgba(255,105,180);
    }

    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }


    footer {
        position: fixed;
        bottom: 0%;
        width: 100%;
        height: 5%;
        text-align: center;  
        background-color: #FF69B4; 
        padding: auto;
        border: none;
    }

    </style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Produtos</a></li>
                <li><a href="#">Sobre Nós</a></li>
                <li><a href="#">Contato</a></li>
                <li><a href="cadastrocliente.html">Cadastrar Cliente</a></li>
                <li><a href="cadastroservico.html">Cadastrar Serviço</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h1>Bem-vindo à Delicias de Amor</h1>
        <p>Deliciosos doces feitos com amor!</p>
    </div>
<?php

$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Função para listar os registros
    function listarClientes($conn) {
        $sql = "SELECT * FROM cadastrocliente";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Campo1</th><th>Campo2</th><th>Campo3</th><th>Ações</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["telefone"] . "</td>";
                echo "<td>";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                echo "<input type='submit' name='excluir' value='Excluir'>";
                echo "<input type='submit' name='editar' value='Editar'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum registro encontrado.";
        }
    }

    // Verifica se o botão de excluir foi clicado
    if (isset($_POST['excluir'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM cadastrocliente WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "Registro excluído com sucesso!";
        } else {
            echo "Erro ao excluir registro: " . $conn->error;
        }
    }

    // Verifica se o botão de editar foi clicado
    if (isset($_POST['editar'])) {
        $id = $_POST['id'];
        // Redirecionar para a página de edição com o ID do registro
        header("Location: editar.php?id=$id");
        exit();
    }

    // Chama a função para listar os clientes
    listarClientes($conn);

    // Fecha a conexão
    $conn->close();
    ?>
<br>
<br>
<br>


<?php

$conn = new mysqli($servername, $username, $password, $database);
// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Função para listar os registros
    function listarServico($conn) {
        $sql = "SELECT * FROM cadastroservico";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Campo1</th><th>Campo2</th><th>Ações</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["servico"] . "</td>";
                echo "<td>" . $row["descricao"] . "</td>";
                echo "<td>";
                echo "<form method='post' action=''>";
                echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
                echo "<input type='submit' name='excluir' value='Excluir'>";
                echo "<input type='submit' name='editar' value='Editar'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nenhum registro encontrado.";
        }
    }

    // Verifica se o botão de excluir foi clicado
    if (isset($_POST['excluir'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM cadastroservico WHERE id = $id";
        if ($conn->query($sql) === TRUE) {
            echo "Servico excluído com sucesso!";
        } else {
            echo "Erro ao excluir servico: " . $conn->error;
        }
    }

    // Verifica se o botão de editar foi clicado
    if (isset($_POST['editar'])) {
        $id = $_POST['id'];
        // Redirecionar para a página de edição com o ID do registro
        header("Location: editar.php?id=$id");
        exit();
    }

    // Chama a função para listar os registros
    listarServico($conn);

    // Fecha a conexão
    $conn->close();
    ?>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Doceria. Todos os direitos reservados.</p>
    </footer>
    
    
</body>
</html>

