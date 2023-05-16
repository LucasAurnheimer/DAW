<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar o formulário de exclusão aqui
    $indice = $_POST['indice'];

    // Ler o arquivo de perguntas
    $linhas = file('perguntas.txt');

    // Criar um novo array para armazenar as perguntas atualizadas
    $novasLinhas = array();

    // Percorrer as linhas e adicionar apenas as perguntas que não correspondem ao índice informado
    foreach ($linhas as $linha) {
        $perguntaData = explode('|', $linha);
        if ($perguntaData[0] != $indice) {
            $novasLinhas[] = $linha;
        }
    }

    // Reescrever o arquivo com as perguntas atualizadas
    $arquivo = fopen('perguntas.txt', 'w');
    fwrite($arquivo, implode('', $novasLinhas));
    fclose($arquivo);

    // Redirecionar para a página de leitura após a exclusão
    header('Location: read.php');
    exit();
}

// Obter o índice da pergunta a ser excluída
$indice = $_GET['indice'];

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
    <title>Excluir Pergunta</title>
</head>
<body>
    <h1>Excluir Pergunta</h1>
    <!-- Formulário de exclusão -->
    <form method="POST" action="delete.php">
        <!-- Campo de índice -->
        <label for="indice">Índice:</label>
        <input type="text" id="indice" name="indice" value="<?php echo htmlspecialchars($indice); ?>" readonly>

        <!-- Campo de pergunta (apenas para exibição) -->
        <label for="pergunta">Pergunta:</label>
        <input type="text" id="pergunta" name="pergunta" value="<?php echo htmlspecialchars($perguntaExistente); ?>" readonly>

        <!-- Botão de envio -->
        <input type="submit" value="Excluir">
    </form>
</body>
</html>
