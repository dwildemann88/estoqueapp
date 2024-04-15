<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    if (isset($_GET['referencia'])) {
        $referencia = $_GET['referencia'];

        // Configurações de conexão com o banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "cadastroproduto";

        // Cria a conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Erro de conexão: " . $conn->connect_error);
        }

        // Prepara e executa a query SQL para buscar os dados
        $sql = "SELECT * FROM produtos WHERE referencia = '$referencia'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Exibe os dados encontrados
            echo "<h2>Dados do Produto:</h2>";
            while ($row = $result->fetch_assoc()) {
                echo "Referência: " . $row['referencia'] . "<br>";
                echo "Nome: " . $row['nome'] . "<br>";
                echo "Quantidade: " . $row['quantidade'] . "<br>";
                echo "Cores: " . $row['cores'] . "<br>";
                echo "Tamanhos: " . $row['tamanhos'] . "<br>";
            }
        } else {
            echo "Nenhum produto encontrado para a referência informada.";
        }

        // Fecha a conexão
        $conn->close();
    }
    ?>