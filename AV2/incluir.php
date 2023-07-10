<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "candidatos";

$mysqli = mysqli_connect($host, $user, $pass, $db);

if (!$mysqli) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}

function contarCandidatosSala($sala, $mysqli) {
    $sql_count = "SELECT COUNT(*) AS total FROM candidatosinfo WHERE sala = '$sala'";
    $result_count = mysqli_query($mysqli, $sql_count);
    $row_count = mysqli_fetch_assoc($result_count);
    $total = $row_count['total'];

    return $total;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $salas = ['1', '2', '3', '4', '5'];
    $candidatos = $_POST['candidatos'];

    foreach ($candidatos as $candidato) {
        $nome = $candidato['nome'];
        $cpf = $candidato['cpf'];
        $rg = $candidato['Rg'];
        $email = $candidato['email'];
        $cargo = $candidato['cargo'];

        $salaDisponivel = $salas[array_rand($salas)];
        $totalCandidatosSala = contarCandidatosSala($salaDisponivel, $mysqli);

        if ($totalCandidatosSala < 50) {
            $sql = "INSERT INTO candidatosinfo (nome, cpf, Rg, email, cargo, sala) VALUES ('$nome', '$cpf', '$rg','$email', '$cargo','$salaDisponivel')";
            $resultado = mysqli_query($mysqli, $sql);

            if (!$resultado) {
                echo "Erro ao cadastrar candidato: " . mysqli_error($mysqli);
                break;
            }
        } else {
            echo "Não há vagas disponíveis para cadastrar o candidato.";
            break;
        }
    }

    if ($resultado) {
        echo "Candidatos cadastrados com sucesso!";
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
</head>

<body>
    <form method="post">

        <h2>Adicionar candidatos:</h2>

        <div id="candidatos-container">
            <div class="aluno">
                <label for="nome">Nome:</label>
                <input type="text" name="candidatos[0][nome]" required>

                <label for="cpf"> CPF:</label>
                <input type="text" name="candidatos[0][cpf]" required placeholder="Digite 9 dígitos">

                <label for="Rg">Rg:</label>
                <input type="text" name="candidatos[0][Rg]" required placeholder="Digite 9 dígitos">

                <label for="email">email:</label>
                <input type="text" name="candidatos[0][email]" required placeholder="example@.com">
                <br>
                <br>
                <label for="email">Cargo:</label>
                <input type="text" name="candidatos[0][cargo]" required>
                <br>

                <h3>A sala que o candidato fará a prova será determinada em breve</h3>
            </div>
        </div>

        <input type="submit" value="Cadastrar">
        <br>
        <br>
        <a href="menu.php">Voltar ao Menu:</a>

    </form>

    
</body>

</html>
