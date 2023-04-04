<!DOCTYPE HTML>
<html lang = "pt-br">
<head>
   <title>Exemplo</title>
   <meta charset = "UTF-8">
</head>
<body>
   <form action="" method="post" >
      Primeiro Numero: <input name="num1" type="text"><br>
	  <br>
      Segundo numero: <input name="num2" type="text"><br>
	  <br>
      <input type="submit" name="operacao" value="+">     
      <input type="submit" name="operacao" value="-">     
      <input type="submit" name="operacao" value="*">     
      <input type="submit" name="operacao" value="/">     
   </form> 
<?php

   $numero1 = $_POST['num1'];
   $numero2 = $_POST['num2'];
   $op= $_POST['operacao'];

   if( !empty($op) ) {
      if($op == '+')
         $c = $numero1 + $numero2;
      else if($op == '-')
         $c = $numero1 - $numero2;
      else if($op == '*')
         $c = $numero1*$numero2;
      else
         $c = $numero1/$numero2;

      echo "O resultado da operação é: $c";
   }

?>       
</body>
</html>