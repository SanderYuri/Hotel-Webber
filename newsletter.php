<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotelnewsletter";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql_check = "SELECT * FROM newsletter WHERE email = '$email'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        echo "Este e-mail já está cadastrado!";
    } else {
        $sql = "INSERT INTO newsletter (nome, email) VALUES ('$nome', '$email')";
        if ($conn->query($sql) === TRUE) {
            echo "Inscrição realizada com sucesso!";
        } else {
            echo "Erro: " . $conn->error;
        }
    }
}

$conn->close();
?>
