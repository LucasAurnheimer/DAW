<?php

// Conexão com o banco de dados
$host = "localhost";
$user = "root";
$pass = "";
$db = "alunos";

$mysqli = mysqli_connect($host, $user, $pass, $db);

$sql = "SELECT * FROM alunos";
$resultado = mysqli_query($mysqli, $sql);

echo "<table>";
echo "<tr><th>Nome</th><th>Matrícula</th><th>Curso</th></tr>";
while ($linha = mysqli_fetch_array($resultado)) {
    echo "<tr><td>" . $linha['nome'] . "</td><td>" . $linha['matricula'] . "</td><td>" . $linha['credito'] . "</td><td>" . $linha['curso'] . "</td></tr>";
}
echo "</table>";
