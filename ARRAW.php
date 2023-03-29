<!DOCTYPE html>
<html>
<head>
</head>
<body>
<h1> 3DAW </h1>

<?php

echo "<h2> Exercitando arraw </h2>";

$Carros = array ("Fusquinha", "Palio", "Sandero", "bmw");

for($x=0 ; $x<count($Carros); $x++)
{
  echo "meu carro é um $Carros[$x]";
  echo "<br>";
}
?>
</body>
</html>