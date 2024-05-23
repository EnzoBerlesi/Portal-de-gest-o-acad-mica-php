<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Portal de Gestão Acadêmica</title>

    <style>

    /* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    color: #333;
    line-height: 1.6;
}

.container {
    width: 80%;
    margin: 0 auto;
    overflow: hidden;
}

header {
    background: #333;
    color: #fff;
    padding-top: 30px;
    min-height: 70px;
    border-bottom: #007bff 3px solid;
}

header a {
    color: #fff;
    text-decoration: none;
    text-transform: uppercase;
    font-size: 16px;
}

header h1 {
    text-align: center;
    margin: 0;
    font-size: 24px;
    letter-spacing: 2px;
}

main {
    padding: 20px 0;
}

.section {
    background: #fff;
    padding: 20px;
    margin: 20px 0;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.section h2 {
    margin-bottom: 10px;
    color: #007bff;
    border-bottom: 2px solid #007bff;
    padding-bottom: 5px;
}

.section ul {
    list-style: none;
    padding: 0;
}

.section li {
    margin: 10px 0;
}

.section a {
    color: #333;
    text-decoration: none;
    font-weight: bold;
    padding: 10px 15px;
    display: block;
    background: #eaeaea;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.section a:hover {
    background: #007bff;
    color: #fff;
}

footer {
    background: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    margin-top: 20px;
}

footer p {
    margin: 0;
}


    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Portal de Gestão Acadêmica</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="section">
                <h2>Cadastros</h2>
                <ul>
                    <li><a href="cadastro_uf.html">Cadastro de UF</a></li>
                    <li><a href="cadastro_municipio.html">Cadastro de Município</a></li>
                    <li><a href="cadastro_aluno.html">Cadastro de Aluno</a></li>
                    <li><a href="cadastro_disciplina.html">Cadastro de Disciplina</a></li>
                    <li><a href="cadastro_cursa.html">Cadastro em Curso</a></li>
                </ul>
            </div>
            <div class="section">
                <h2>Relatórios</h2>
                <ul>
                    <li><a href="relatorio1.php">Relatório 1: Informações do Aluno</a></li>
                    <li><a href="relatorio2.php">Relatório 2: Total da Mensalidade Agrupada</a></li>
                    <li><a href="relatorio3.php">Relatório 3: Lista de Chamada</a></li>
                </ul>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <p>&copy; 2024 Portal de Gestão Acadêmica. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
