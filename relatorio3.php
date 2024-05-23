<?php
    $conn = new mysqli('localhost', 'root', '', 'atv5');

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$result = $conn->query("
    SELECT 
        CURSA.TURMA, 
        ALUNO.NOME AS Aluno 
    FROM CURSA 
    JOIN ALUNO ON CURSA.FK_ALUNO_CODIGO = ALUNO.CODIGO 
    ORDER BY CURSA.TURMA, ALUNO.NOME
");

$currentTurma = "";
echo "<h1>Lista de Chamada</h1>";
while ($row = $result->fetch_assoc()) {
    if ($currentTurma != $row['TURMA']) {
        $currentTurma = $row['TURMA'];
        echo "<h2>Turma: " . $currentTurma . "</h2>";
    }
    echo "Aluno: " . $row['Aluno'] . "<br>";
}

$conn->close();
?>
