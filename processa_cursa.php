<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fk_aluno_codigo = $_POST['fk_aluno_codigo'];
    $fk_disciplina_codigo = $_POST['fk_disciplina_codigo'];
    $turma = $_POST['turma'];
    $ano = $_POST['ano'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $faltas = $_POST['faltas'];

    $conn = new mysqli('localhost', 'root', '', 'atv5');
    
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Verificar se a turma tem menos de 30 alunos
    $result = $conn->query("SELECT COUNT(*) as count FROM CURSA WHERE TURMA='$turma' AND ANO='$ano' AND FK_DISCIPLINA_CODIGO='$fk_disciplina_codigo'");
    $row = $result->fetch_assoc();

    if ($row['count'] >= 30) {
        echo "Turma cheia!";
    } else {
        // Verificar se o aluno já cursou a disciplina no mesmo ano
        $result = $conn->query("SELECT COUNT(*) as count FROM CURSA WHERE FK_ALUNO_CODIGO='$fk_aluno_codigo' AND FK_DISCIPLINA_CODIGO='$fk_disciplina_codigo' AND ANO='$ano'");
        $row = $result->fetch_assoc();

        if ($row['count'] > 0) {
            echo "O aluno já está matriculado nesta disciplina para este ano!";
        } else {
            // Verificar se o aluno já foi aprovado na disciplina
            $result = $conn->query("SELECT COUNT(*) as count FROM CURSA WHERE FK_ALUNO_CODIGO='$fk_aluno_codigo' AND FK_DISCIPLINA_CODIGO='$fk_disciplina_codigo' AND (NOTA1 + NOTA2) / 2 >= 6");
            $row = $result->fetch_assoc();

            if ($row['count'] > 0) {
                echo "O aluno já foi aprovado nesta disciplina!";
            } else {
                // Inserir o novo registro
                $sql = "INSERT INTO CURSA (FK_ALUNO_CODIGO, FK_DISCIPLINA_CODIGO, TURMA, ANO, NOTA1, NOTA2, FALTAS) VALUES ('$fk_aluno_codigo', '$fk_disciplina_codigo', '$turma', '$ano', '$nota1', '$nota2', '$faltas')";

                if ($conn->query($sql) === TRUE) {
                    echo "Registro criado com sucesso";
                } else {
                    echo "Erro: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    }

    $conn->close();
}
?>
