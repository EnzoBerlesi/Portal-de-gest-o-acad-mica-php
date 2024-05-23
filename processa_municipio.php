<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $populacao = $_POST['populacao'];
    $fk_uf_codigo = $_POST['fk_uf_codigo'];

    $conn = new mysqli('localhost', 'root', '', 'atv5');
    
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $sql = "INSERT INTO MUNICIPIO (CODIGO, NOME, POPULACAO, FK_UF_CODIGO) VALUES ('$codigo', '$nome', '$populacao', '$fk_uf_codigo')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro criado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
