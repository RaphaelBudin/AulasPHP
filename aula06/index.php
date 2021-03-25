<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 06</title>
</head>
<body>
    <h1> Formulário - Cálculo IMC </h1>
    <form name="imc" id="imc" method="post" action="imc.php">
        <label for="peso"> Peso (em kg): </label>
        <input type="number" name="peso" id="peso"> <br>
        <label for="altura"> Altura (em cm): </label> 
        <input type="number" name="altura" id="altura"> <br>
        <input type="submit">
    </form>
    
    <h1> Formuláro - Saudação de acordo com o tempo </h1>
    <form name="saudacao" id="saudacao" method="post" action="saudacao.php">
        <label for="nome"> Insira seu nome:  </label>
        <input type="text" name="nome" id="nome">
        <input type="submit" name="descobrir" id="descobrir">
    </form>

</body>
</html>