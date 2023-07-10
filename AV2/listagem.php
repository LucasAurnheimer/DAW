<?php

function listarCandidatosEmOrdemAlfabetica() {
    
    $conn = new mysqli("localhost", "root", "", "candidatos");

    
    if ($conn->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conn->connect_error);
    }

  
    $sql = "SELECT * FROM candidatosinfo ORDER BY nome ASC";
    $result = $conn->query($sql);

    
    if ($result->num_rows > 0) {
        // Loop para exibir os candidatos
        while ($row = $result->fetch_assoc()) {
            echo "Nome: " . $row["nome"] . "<br>";
            echo "CPF: " . $row["cpf"] . "<br>";
            echo "RG: " . $row["Rg"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
            echo "Cargo pretendido: " . $row["cargo"] . "<br>";
            echo "Sala de prova: " . $row["sala"] . "<br><br>";
        }
    } else {
        echo "Nenhum candidato encontrado.";
    }

   
    $conn->close();
}


echo "Lista de Candidatos Presentes:<br>";
listarCandidatosEmOrdemAlfabetica();

?>

<a href="menu.php">Voltar para o Menu</a>
