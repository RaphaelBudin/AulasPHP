<!-- 
    Página feita para treinar preencher campos de input na mesma página, expandindo o que foi passado pela professora em aula
!-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css" media="screen">
    <title>Script 03 - Aula 07 - Formulário Alunos Fatec com Via CEP </title>
</head>
<body>

    <h1> Cadastro de Aluno com Via CEP </h1>

    <form name="cadastroAluno" id="cadastroAluno" method="POST" action="<?php $_SERVER["PHP_SELF"]?>">
        <label> Nome: </label>
        <input type="text" name="nome" id="nome")> <br>

        <br>
        <label> Curso: </label>
        <input type="radio" name="curso" id="curso" value="ADS">    ADS
        <input type="radio" name="curso" id="curso" value="AGRO">   AGRO
        <input type="radio" name="curso" id="curso" value="LOG">    LOG
        <input type="radio" name="curso" id="curso" value="RH">     RH
        <br> <br>  

        <label> Email: </label>
        <input type="email" name="email" id="email"> <br>

        <label> CEP:</label> 
        <input type="text" name="cepInserido" id="cepInserido"> <br>

        <label> Número: </label>
        <input type="number" name="numero" id="numero"> <br>

        <label> Complemento: </label>
        <input type="text" name="complemento" id="complemento"> <br>

        <input type="submit" value="Enviar">
    </form>

    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST"){

            extract($_POST);

            $curso_ads  = " ";
            $curso_agro = " ";
            $curso_log  = " ";
            $curso_rh   = " ";
            switch($curso){
                case 'ADS'  : $curso_ads    = "checked";  break;
                case 'AGRO' : $curso_agro   = "checked";  break;
                case 'LOG'  : $curso_log    = "checked";  break;
                case 'RH'   : $curso_rh     = "checked";  break;
            }


            $cep = str_replace("-","", $cep);
            $cep = trim($cep);                  //Remove espaços em branco no começo e final da string. '   Exemplo   ' vira 'Exemplo'
            $json = file_get_contents("https://viacep.com.br/ws/".$cepInserido."/json/");
            $jsonDecodificado = json_decode($json);

            echo "<br><br>";
            echo "<h1> Informações Preenchidas:  </h1>";

            echo "Nome:         <input type=text    name=nome         value='$nome'>                         <br>";
            echo "Email:        <input type=email   name=email        value='$email'>                        <br>";
            
            echo "Curso:        <input type=radio   name=curso        value='$curso' $curso_ads>   ADS       <br>";
            echo "              <input type=radio   name=curso        value='$curso' $curso_agro>  AGRO      <br>";
            echo "              <input type=radio   name=curso        value='$curso' $curso_log>   LOG       <br>";
            echo "              <input type=radio   name=curso        value='$curso' $curso_rh>    RH        <br>";
            
            echo "CEP:          <input type=text    name=cep          value='$cepInserido'>                  <br>";
            echo "Logradouro:   <input type=text    name=logardouro   value='$jsonDecodificado->logradouro'> <br>";
            echo "Número:       <input type=number  name=numero       value='$numero'>                       <br>";
            echo "Complemento:  <input type=text    name=complemento  value='$complemento'                   <br>";
            echo "Bairro:       <input type=text    name=bairro       value='$jsonDecodificado->bairro'>     <br>";
            echo "Cidade:       <input type=text    name=localidade   value='$jsonDecodificado->localidade'> <br>";
            echo "Estado:       <input type=text    name=uf           value='$jsonDecodificado->uf'>         <br>";
            
            echo "<br><br>";
        }
    ?>
    
</body>
</html>