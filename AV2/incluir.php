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

   
    $candidatos = $_POST['candidatos'];
  
    foreach ($candidatos as $candidato) {
        $nome = $candidato['nome'];
        $cpf = $candidato['cpf'];
        $Rg = $candidato['Rg'];
        $email = $candidato['email'];
		$cargo = $candidato['cargo'];
		$sala = null;

        $sql = "INSERT INTO candidatosinfo (nome, cpf, Rg, email, cargo, sala) VALUES ('$nome', '$cpf', '$Rg','$email', '$cargo','$sala')";
        $resultado = mysqli_query($mysqli, $sql);

    
        if (!$resultado) {
            echo "Erro ao cadastrar candidato: " . mysqli_error($mysqli);
            break;
        }
    }


    if ($resultado) {
        echo "candidatos cadastrados com sucesso!";
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
                <input type="text" name="candidatos[0][cpf]" required>

                <label for="Rg">Rg:</label>
                <input type="text" name="candidatos[0][Rg]" required>

                <label for="email">email:</label>
                <input type="text" name="candidatos[0][email]" required>
				<br>
				<br>
				<label for="email">Cargo:</label>
                <input type="text" name="candidatos[0][cargo]" required>
				<br>
				
			 <h3> a sala que o candidato fara a prova será informada em breve </h3>
            </div>
        </div>

        <input type="submit" value="Cadastrar">
    </form>

    <script>
    let contador = 0;
    const candidatosContainer = document.getElementById('candidatos-container');

    function addAluno() {
        contador++;
        const div = document.createElement('div');
        div.classList.add('candidato');
        div.innerHTML = `
		
                <label for="nome">Nome:</label>
                <input type="text" name="candidatos[${contador}][nome]" required>

                <label for="cpf">CPF:</label>
                <input type="text" name="candidatos[${contador}][cpf]" required>

                <label for="Rg">Rg:</label>
                <input type="text" name="candidatos[${contador}][Rg]" required>

                <label for="email">email:</label>
                <input type="text" name="candidatos[${contador}][email]" required>
				
				
				<label for="cargo">Cargo:</label>
                <input type="text" name="candidatos[${contador}][cargo]" required>
				
				
            `;
        candidatosContainer.appendChild(div);
    }
    </script>
</body>

</html>
