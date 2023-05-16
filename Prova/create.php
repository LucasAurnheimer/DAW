<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Processar o formulário de criação aqui
    $pergunta = $_POST['pergunta'];

    // Verificar se o arquivo existe
    $perguntasFile = 'perguntas.txt';
    if (!file_exists($perguntasFile)) {
        // Criar o arquivo e definir permissões de escrita
        fopen($perguntasFile, 'w');
        
    }

    // Ler o arquivo de perguntas para obter o último índice
    $indice = 1;
    $linhas = file($perguntasFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if (!empty($linhas)) {
        $ultimaLinha = $linhas[count($linhas) - 1];
        $ultimaPergunta = explode('|', $ultimaLinha);
        $indice = intval($ultimaPergunta[0]) + 1;
    }

    // Formatar a pergunta com o índice
    $novaPergunta = $indice . '|' . $pergunta;

    // Adicionar a nova pergunta ao arquivo
    file_put_contents($perguntasFile, $novaPergunta . PHP_EOL, FILE_APPEND);


}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Criar Pergunta</title>
</head>
<body>
    <h1>Criar Pergunta</h1>
    <!-- Formulário de criação -->
    <form method="POST" action="create.php">
        <!-- Campos do formulário -->
        <label for="pergunta">Pergunta:</label>
        <input type="text" id="pergunta" name="pergunta" required>

        <!-- Botão de envio -->
        <input type="submit" value="Criar">
    </form>
</body>
</html>
