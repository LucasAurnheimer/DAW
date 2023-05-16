<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar o formulário de atualização aqui
    $indice = isset($_POST['indice']) ? $_POST['indice'] : '';
    $pergunta = $_POST['pergunta'];

    // Validar e limpar os dados, se necessário

    // Ler o arquivo de perguntas
    $linhas = file('perguntas.txt');

    // Buscar a pergunta com o índice correspondente
    foreach ($linhas as $linhaIndex => $linha) {
        $perguntaData = explode('|', $linha);
        if ($perguntaData[0] == $indice) {
            // Atualizar a pergunta no arquivo
            $linhas[$linhaIndex] = $indice . '|' . $pergunta . PHP_EOL;
            break;
        }
    }

    // Reescrever o arquivo com as perguntas atualizadas
    $arquivo = fopen('perguntas.txt', 'w');
    fwrite($arquivo, implode('', $linhas));
    fclose($arquivo);

    // Redirecionar para a página de leitura após a atualização
    header('Location: read.php');
    exit();
}

// Obter o índice da pergunta a ser atualizada
$indice = isset($_GET['indice']) ? $_GET['indice'] : '';

// Ler o arquivo de perguntas
$linhas = file('perguntas.txt');

// Buscar a pergunta com o índice correspondente
$perguntaExistente = null;
foreach ($linhas as $linha) {
    $perguntaData = explode('|', $linha);
    if ($perguntaData[0] == $indice) {
        $perguntaExistente = $perguntaData[1];
        break;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Atualizar Pergunta</title>
</head>
<body>
    <h1>Atualizar Pergunta</h1>
    <!-- Formulário de atualização -->
    <form method="POST" action="update.php">
        <!-- Campo de índice -->
        <label for="indice">Índice:</label>
        <input type="text" id="indice" name="indice" value="<?php echo $indice; ?>" required>

        <!-- Campo de pergunta -->
        <label for="pergunta">Pergunta:</label>
        <input type="text" id="pergunta" name="pergunta" value="<?php echo $perguntaExistente; ?>" required>

        <!-- Botão de envio -->
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>
