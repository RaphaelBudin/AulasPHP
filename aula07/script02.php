<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css" media="screen">
    <title>Script 01 - Aula 07</title>
</head>
<body>
    <h1> Formulário sem Tratamento </h1>
    <form id="f1" method="POST" action="<?php $_SERVER['PHP_SELF'];?>">
        <p> Escreva um texto que vai retornar na própria página: </p>
        <input type="text" name="texto"/>
        <br>
        <input type="submit" value="Enviar">
        <br>

    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            echo htmlspecialchars("<br>". $_POST["texto"] . "<br>");
        }
    ?>

</body>
</html>