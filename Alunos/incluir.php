<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "alunos";


$mysqli = mysqli_connect($host, $user, $pass, $db);

if (!$mysqli) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   
    $alunos = $_POST['alunos'];
  
    foreach ($alunos as $aluno) {
        $nome = $aluno['nome'];
        $matricula = $aluno['matricula'];
        $credito = $_POST["credito"];
        $curso = $aluno['curso'];

        $sql = "INSERT INTO alunos (nome, matricula, credito, curso) VALUES ('$nome', '$matricula', '$credito','$curso')";
        $resultado = mysqli_query($mysqli, $sql);

    
        if (!$resultado) {
            echo "Erro ao cadastrar aluno: " . mysqli_error($mysqli);
            break;
        }
    }


    if ($resultado) {
        echo "Alunos cadastrados com sucesso!";
    }
}


mysqli_close($mysqli);

?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrudAlunos</title>
</head>

<body>
    <form method="post">

        <h2>Adicionar alunos</h2>

        <div id="alunos-container">
            <div class="aluno">
                <label for="nome">Nome:</label>
                <input type="text" name="alunos[0][nome]" required>

                <label for="matricula">Matrícula:</label>
                <input type="text" name="alunos[0][matricula]" required>

                <label for="credito">Credito:</label>
                <input type="text" name="alunos[0][credito]" required>

                <label for="curso">Curso:</label>
                <input type="text" name="alunos[0][curso]" required>
            </div>
        </div>

        <button type="button" onclick="addAluno()">Adicionar outro aluno</button>
        <br><br>
        <input type="submit" value="Cadastrar">
    </form>

    <script>
    let contador = 0;
    const alunosContainer = document.getElementById('alunos-container');

    function addAluno() {
        contador++;
        const div = document.createElement('div');
        div.classList.add('aluno');
        div.innerHTML = `
                <label for="nome">Nome:</label>
                <input type="text" name="alunos[${contador}][nome]" required>

                <label for="matricula">Matrícula:</label>
                <input type="text" name="alunos[${contador}][matricula]" required>

                <label for="credito">Credito:</label>
                <input type="text" name="alunos[${contador}][credito]" required>

                <label for="curso">Curso:</label>
                <input type="text" name="alunos[${contador}][curso]" required>
            `;
        alunosContainer.appendChild(div);
    }
    </script>
</body>

</html>
