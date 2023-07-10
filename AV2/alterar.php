<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "candidatos";

$mysqli = mysqli_connect($host, $user, $pass, $db);

if (!$mysqli) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomePesquisado = $_POST['nome_pesquisado'];

    $sql = "SELECT * FROM candidatosinfo WHERE nome = '$nomePesquisado'";
    $resultado = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $nome = $nomePesquisado;
        $novaSala = $_POST['sala'];

        $sql = "UPDATE candidatosinfo SET sala = '$novaSala' WHERE nome = '$nome'";
        $resultadoAtualizacao = mysqli_query($mysqli, $sql);

        if ($resultadoAtualizacao) {
            echo "Sala do candidato atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar a sala do candidato: " . mysqli_error($mysqli);
        }
    } else {
        echo "Nome do candidato não encontrado.";
    }

    mysqli_free_result($resultado);
}

mysqli_close($mysqli);

?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar e Alterar Sala do Candidato</title>
</head>

<body>
    <h1>Pesquisar e Alterar Sala do Candidato</h1>

    <form method="post">
        <label for="nome_pesquisado">Nome do Candidato:</label>
        <input type="text" name="nome_pesquisado" required>
        <br><br>
        <label for="sala">Nova Sala:</label>
        <input type="text" name="sala" required>
        <br><br>
        <input type="submit" value="Pesquisar e Alterar Sala">
    </form>

    <br>
    <a href="listagem.php">Voltar à Lista de Candidatos</a>
</body>

</html>
