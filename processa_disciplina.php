<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $nr_aulas = $_POST['nr_aulas'];
    $ementa = $_POST['ementa'];
    $mensalidade = $_POST['mensalidade'];

    $conn = new mysqli('localhost', 'root', '', 'atv5');
    
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $sql = "INSERT INTO DISCIPLINA (CODIGO, NOME, NR_AULAS, EMENTA, MENSALIDADE) VALUES ('$codigo', '$nome', '$nr_aulas', '$ementa', '$mensalidade')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro criado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

