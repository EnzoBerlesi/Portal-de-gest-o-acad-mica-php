<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $regiao = $_POST['regiao'];

    $sql = "INSERT INTO UF (CODIGO, NOME, REGIAO) VALUES ('$codigo', '$nome', '$regiao')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro criado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
