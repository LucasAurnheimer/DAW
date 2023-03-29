<!Doctype html>

<html>
<head>
<title>3DAW</title>
</head>

<body>
<h1> 3Daw - arraw de notas </h1>

  <table>
   <tr>
    <th>Notas</th>
	<th>Nota</th>
	<th>Status</th>
   </tr>

<?php

   $nomes = array {"Leandroviski", "Erikoviski", "Lucosviski", "Nathaloviski"};
   $Notas = array {"9", "5", "4", "10"};
   ?>
   
<?php
     for($i=0; $i<count($nomes); $i++)
	 {
		echo "<tr>";
	    echo "<td>", $nomes[$i],"</td>";
        echo "<td>", $notas[$i],"</td>";
        
       if($notas[$i] >= 8){
		   echo "<td> APROVADO </td>";
	   }
	   else{
		   echo "<td> REPROVADO </td>";
	   }
	   
	    echo "</tr>";
	 }		
?>
 </table>
</body>
</html>