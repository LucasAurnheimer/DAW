<!DOCTYPE html>
<html>
<head>
    <title>Exibir Pergunta</title>
</head>
<body>
    <h1>Exibindo Perguntas</h1>
    <!-- Exibir ou listar as perguntas -->
    <ul>
        <?php
        // Ler as perguntas do arquivo
        $arquivo = fopen('perguntas.txt', 'r');

        if ($arquivo) {
            while (($pergunta = fgets($arquivo)) !== false) {
                echo "<li>" . htmlspecialchars(trim($pergunta)) . "</li>";
            }

            fclose($arquivo);
        }
        ?>
    </ul>
</body>
</html>