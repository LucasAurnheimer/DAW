<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter o índice da pergunta a ser excluída
    $indice = isset($_POST['indice']) ? $_POST['indice'] : '';

    // Ler o arquivo de perguntas
    $linhas = file('perguntas.txt');

    // Buscar a pergunta com o índice correspondente
    foreach ($linhas as $linhaIndex => $linha) {
        $perguntaData = explode('|', $linha);
        if ($perguntaData[0] == $indice) {
            // Remover a pergunta do arquivo
            unset($linhas[$linhaIndex]);
            break;
        }
    }

    // Reescrever o arquivo com as perguntas excluidas
    $arquivo = fopen('perguntas.txt', 'w');
    fwrite($arquivo, implode('', $linhas));
    fclose($arquivo);

    // Redirecionar para a página de leitura após a exclusão
    header('Location: read.php');
    exit();
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Excluir Pergunta</title>
</head>
<body>
    <h1>Excluir Pergunta</h1>

    <!-- Formulário de exclusão -->
    <form method="POST" action="delete.php">
        <!-- Campo de índice -->
        <label for="indice">Índice:</label>
        <input type="text" id="indice" name="indice" required>

        <!-- Botão de exclusão -->
        <input type="submit" value="Excluir">
    </form>
</body>
</html>
