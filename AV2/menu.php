<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Menu de informações gerais</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-top: 50px;
        }

        ul {
            list-style-type: none;
            margin: 50px auto;
            padding: 0;
            width: 400px;
        }

        li {
            margin-bottom: 20px;
        }

        a {
            display: block;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <h1>Quais informações deseja consultar: </h1>
    <ul>
        <li><a href="incluir.php">Cadastrar Candidato</a></li>
        <li><a href="incluirFiscal.php">Incluir Fiscal</a></li>
        <li><a href="listagem.php">Listar Candidatos por sala</a></li>
        <li><a href="alterar.php">Alterar Candidato de Sala</a></li>
        
    </ul>
</body>

</html>
