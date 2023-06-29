<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crud</title>
</head>

<body>
    <form method="post" action="alterar.php">
        <table>
            <thead>
                <tr>
                    <th>Selecionar</th>
                    <th>Nome</th>
                    <th>Matrícula</th>
                   <th>Credito</th>
                    <th>Curso</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                $host = "localhost";
                $user = "root";
                $pass = "";
                $db = "alunos";

                $mysqli = mysqli_connect($host, $user, $pass, $db);

                if (!$mysqli) {
                    die("Ocorreu um erro ao conectar ao banco de dados: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM alunos";
                $resultado = mysqli_query($mysqli, $sql);

              
                if ($resultado) {
                    while ($aluno = mysqli_fetch_assoc($resultado)) {
                        echo "<tr>";
                        echo "<td><input type='checkbox' name='selecionados[]' value='" . $aluno['matricula'] . "'></td>";
                        echo "<td>" . $aluno['nome'] . "</td>";
                        echo "<td>" . $aluno['matricula'] . "</td>";
                        echo "<td>" . $aluno['credito'] . "</td>";
                        echo "<td>" . $aluno['curso'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Erro ao selecionar alunos: " . mysqli_error($mysqli);
                }

               
                mysqli_close($mysqli);
                ?>
            </tbody>
        </table>

        <label for="nome">Novo nome:</label>
        <input type="text" id="nome" name="nome"><br>

        <label for="credito">Novo credito:</label>
        <input type="text" id="credito" name="credito"><br>

        <label for="curso">Novo curso:</label>
        <input type="text" id="curso" name="curso"><br>

        <input type="submit" value="Alterar selecionados">
    </form>
</body>

</html>

<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "alunos";


$mysqli = mysqli_connect($host, $user, $pass, $db);


if (!$mysqli) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}


if (isset($_POST['selecionados']) && is_array($_POST['selecionados'])) {

    if (!isset($_POST['nome']) || !isset($_POST['curso'])) {
        echo "Nome ou curso não informados.";
        exit();
    }

    $nome = $_POST['nome'];
    $nome = $_POST['credito'];
    $curso = $_POST['curso'];

    foreach ($_POST['selecionados'] as $matricula) {
        $sql = "UPDATE alunos SET nome='$nome', curso='$curso' WHERE matricula=$matricula";
        $resultado = mysqli_query($mysqli, $sql);
        if (!$resultado) {
            echo "Erro ao alterar aluno com matrícula $matricula: " . mysqli_error($mysqli);
        }
    }
}
