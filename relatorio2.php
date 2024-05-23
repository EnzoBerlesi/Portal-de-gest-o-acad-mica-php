<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Relatório 2: Total da Mensalidade Agrupada</title>
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
        <h2>Relatório 2: Total da Mensalidade Agrupada</h2>
        <table>
            <thead>
                <tr>
                    <th>Região</th>
                    <th>Ano</th>
                    <th>Disciplina</th>
                    <th>Total Mensalidade</th>
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
        UF.REGIAO, 
        CURSA.ANO, 
        DISCIPLINA.NOME AS Disciplina, 
        SUM(DISCIPLINA.MENSALIDADE) AS Total_Mensalidade 
    FROM CURSA 
    JOIN ALUNO ON CURSA.FK_ALUNO_CODIGO = ALUNO.CODIGO 
    JOIN MUNICIPIO ON ALUNO.FK_MUNICIPIO_CODIGO = MUNICIPIO.CODIGO 
    JOIN UF ON MUNICIPIO.FK_UF_CODIGO = UF.CODIGO 
    JOIN DISCIPLINA ON CURSA.FK_DISCIPLINA_CODIGO = DISCIPLINA.CODIGO 
    GROUP BY UF.REGIAO, CURSA.ANO, DISCIPLINA.NOME
");

echo "<h1>Relatório 2: Total da Mensalidade Agrupada</h1>";
while ($row = $result->fetch_assoc()) {
    echo "Região: " . $row['REGIAO'] . "<br>";
    echo "Ano: " . $row['ANO'] . "<br>";
    echo "Disciplina: " . $row['Disciplina'] . "<br>";
    echo "Total da Mensalidade: " . $row['Total_Mensalidade'] . "<br><br>";
}

$conn->close();
?>
            </tbody>
        </table>
    </div>
</body>
</html>