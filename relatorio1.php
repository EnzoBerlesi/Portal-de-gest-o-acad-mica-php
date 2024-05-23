<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Relatório 1: Informações do Aluno</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Relatório 1: Informações do Aluno</h2>
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Data de Nascimento</th>
                    <th>Município</th>
                    <th>UF</th>
                    <th>Disciplina</th>
                    <th>Mensalidade</th>
                </tr>
            </thead>
            <tbody>
            <?php
    $conn = new mysqli('localhost', 'root', '', 'atv5');

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$result = $conn->query("
    SELECT 
        ALUNO.NOME AS Aluno, 
        YEAR(CURDATE()) - YEAR(ALUNO.DATA_NCTO) AS Idade, 
        MUNICIPIO.NOME AS Municipio, 
        UF.NOME AS UF, 
        DISCIPLINA.NOME AS Disciplina, 
        DISCIPLINA.MENSALIDADE 
    FROM CURSA 
    JOIN ALUNO ON CURSA.FK_ALUNO_CODIGO = ALUNO.CODIGO 
    JOIN MUNICIPIO ON ALUNO.FK_MUNICIPIO_CODIGO = MUNICIPIO.CODIGO 
    JOIN UF ON MUNICIPIO.FK_UF_CODIGO = UF.CODIGO 
    JOIN DISCIPLINA ON CURSA.FK_DISCIPLINA_CODIGO = DISCIPLINA.CODIGO
");

echo "<h1>Relatório 1: Informações do Aluno</h1>";
while ($row = $result->fetch_assoc()) {
    echo "Aluno: " . $row['Aluno'] . "<br>";
    echo "Idade: " . $row['Idade'] . "<br>";
    echo "Município: " . $row['Municipio'] . "<br>";
    echo "UF: " . $row['UF'] . "<br>";
    echo "Disciplina: " . $row['Disciplina'] . "<br>";
    echo "Mensalidade: " . $row['MENSALIDADE'] . "<br><br>";
}

$conn->close();
?>
            </tbody>
        </table>
    </div>
</body>
</html>