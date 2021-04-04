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

    <h1 class="titulo"> Cadastro de Aluno com Via CEP </h1>

    <form name="cadastroAluno" id="cadastroAluno" method="POST" action="cadastroOK.php">
        <label> Nome: </label>
        <input type="text" name="nomeAluno" id="nomeAluno"> <br>
        <br>

        <label> Curso: </label> <br>
        <div class="opCursos">
            <label> ADS     <input type="radio" name="curso" id="curso" value="ADS">    </label>
            <label> AGRO    <input type="radio" name="curso" id="curso" value="AGRO">   </label>  
            <label> LOG     <input type="radio" name="curso" id="curso" value="LOG">    </label>
            <label> RH      <input type="radio" name="curso" id="curso" value="RH">     </label> 
        </div>
        
        
        <br> <br>  

        <label> Email:          </label>
        <input type="email"     name="emailAluno"   id="emailAluno">    <br>

        <label> CEP:            </label> 
        <input type="text"      name="cepInserido"  id="cepInserido">   <br>

        <label> Número:         </label>
        <input type="number"    name="numero"       id="numero">        <br>
                                                                        
        <label> Complemento:    </label>
        <input type="text"      name="complemento"  id="complemento">   <br>    <br>

        <input type="submit"    value="Enviar">
    </form>
    
</body>
</html>