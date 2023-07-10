<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "candidatos";

$mysqli = mysqli_connect($host, $user, $pass, $db);

if (!$mysqli) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}

$erro = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fiscais = $_POST['fiscais'];

    foreach ($fiscais as $fiscal) {
        $nome = $fiscal['nome'];
        $cpf = $fiscal['cpf'];
        $sala = $fiscal['sala'];

        // Verificar o número de fiscais existentes na sala
        $sql_count = "SELECT COUNT(*) AS total FROM fiscal WHERE sala = '$sala'";
        $result_count = mysqli_query($mysqli, $sql_count);
        $row_count = mysqli_fetch_assoc($result_count);
        $fiscais_existentes = $row_count['total'];

        if ($fiscais_existentes < 2) {
            $sql = "INSERT INTO fiscal (nome, cpf, sala) VALUES ('$nome', '$cpf', '$sala')";
            $resultado = mysqli_query($mysqli, $sql);

            if (!$resultado) {
                $erro = true;
                break;
            }
        } else {
            $erro = true;
            break;
        }
    }

    if ($erro) {
        echo "<script>alert('Erro ao cadastrar o fiscal.');</script>";
    } else {
        echo "<script>alert('Fiscal cadastrado com sucesso!');</script>";
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

        <h2>Adicionar fiscais:</h2>
		

        <div id="fiscais-container">
            <div class="aluno">
                <label for="nome">Nome:</label>
                <input type="text" name="fiscais[0][nome]" required>

                <label for="cpf"> CPF:</label>
                <input type="text" name="fiscais[0][cpf]" required>
				
				<label for="sala"> Sala:</label>
                <input type="text" name="fiscais[0][sala]" required>
		
            </div>
        </div>

<br>
        <input type="submit" value="Cadastrar">
		
		<br>
		<br>
		<a href="menu.php">Voltar ao Menu:</a>
    </form>

</body>

</html>
