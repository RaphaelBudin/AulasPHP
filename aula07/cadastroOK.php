<!-- 
    Página de Resposta à página script03.php
    Lê os valores:
        - nome
        - numero
        - complemento
        - cepInserido
    
    Informa o cep e solicita um json de retorno com:
        - logradouro
        - bairro
        - cidade (localidade)
        - estado (uf)

    Página feita para exercitar uso de arquivos JSON
-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css" media="screen">
    <title>Cadastro OK</title>
</head>
<body>
    <h1> Cadastro Ok </h1>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST["nomeAluno"];
        $numero = $_POST["numero"];
        $complemento = $_POST["complemento"];
        $cepInserido = $_POST["cepInserido"];

        $cepInserido = trim(str_replace("-","",$cepInserido));
        $jsonViaCep = file_get_contents("https://viacep.com.br/ws/".$cepInserido."/json/");
        $jsonArray = json_decode($jsonViaCep);
        echo "<br><br>";
        echo "<p> Nome: " . $nome . "<br>";
        echo "<p> Rua: " . $jsonArray->logradouro . "<br>";
        echo "<p> Numero: " . $numero . "<br>";
        echo "<p> Complemento:" . $complemento . "<br>";
        echo "<p> Bairro: " . $jsonArray->bairro . "<br>";
        echo "<p> Cidade: " . $jsonArray->localidade . "<br>";
        echo "<p> Estado: " . $jsonArray->uf . "<br>";
        echo "<br><br>";
    }
?>
</body>
</html>
