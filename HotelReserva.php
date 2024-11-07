<?php
// Configuração de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotelreserva";  // Nome do banco de dados, substitua conforme necessário

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['data'];
    $tipo_quarto = $_POST['tipoQuarto'];
    $numero_pessoas = $_POST['pessoas'];
    $valor_total = $_POST['valores'];

    // Insere os dados no banco
    $sql = "INSERT INTO reservas (data, tipo_quarto, numero_pessoas, valor_total) 
            VALUES ('$data', '$tipo_quarto', '$numero_pessoas', '$valor_total')";

    if ($conn->query($sql) === TRUE) {
        echo "Reserva realizada com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
