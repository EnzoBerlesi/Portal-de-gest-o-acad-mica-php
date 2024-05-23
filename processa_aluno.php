<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data_ncto = $_POST['data_ncto'];
    $fk_municipio_codigo = $_POST['fk_municipio_codigo'];

    $conn = new mysqli('localhost', 'root', '', 'atv5');
    
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $sql = "INSERT INTO ALUNO (CODIGO, NOME, CPF, DATA_NCTO, FK_MUNICIPIO_CODIGO) VALUES ('$codigo', '$nome', '$cpf', '$data_ncto', '$fk_municipio_codigo')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro criado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>