<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Excluir Aluno</title>
</head>

<body>
    <h1>Excluir Aluno</h1>
    <form method="post" action="excluirAluno.php">
        <label for="matricula">Matrícula:</label>
        <input type="text" id="matricula" name="matricula"><br>

        <input type="submit" value="Excluir">
    </form>
</body>

</html>

<?php


$host = "localhost";
$user = "root";
$pass = "";
$db = "alunos";


$conexao = mysqli_connect($host, $user, $pass, $db);

if (!$conexao) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}


$matricula = $_POST['matricula'];

$sql = "DELETE FROM alunos WHERE matricula = '$matricula'";
$resultado = mysqli_query($conexao, $sql);

if ($resultado === TRUE) {
    echo "Aluno excluído com sucesso!";
} else {
    echo "Erro ao excluir aluno: " . mysqli_error($conexao);
}

mysqli_close($conexao);
