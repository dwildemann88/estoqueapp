<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Verifica se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexão com o banco de dados (substitua essas variáveis pelos seus próprios detalhes de conexão)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cadastroproduto";

    // Cria conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

    // Prepara e executa a query SQL para inserir os dados
    $referencia = $_POST['referencia'];
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $cores = $_POST['cores'];
    $tamanhos = $_POST['tamanhos'];

    $sql = "INSERT INTO produtos (referencia, nome, quantidade, cores, tamanhos) VALUES ('$referencia', '$nome', '$quantidade', '$cores', '$tamanhos')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }

    // Fecha a conexão
    $conn->close();
}
?>
