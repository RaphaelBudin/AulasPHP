<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="resposta.css">
    <title>Obrigado por preencher o formulário</title>
</head>
<body>
    <div class="resposta">
        <h1> Obrigado por preencher o nosso formulário! </h1>
        <h3> As informações que você preencheu: </h3>
        <label class="resposta"> Primeiro nome: <?php echo $_POST['primeiro_nome']?> </label><br>
        <?php
        //echo "As informações que você preencheu:                           <br>\n";
        echo "Primeiro nome: "          . $_POST['primeiro_nome']       . "<br>\n";
        echo "Sobrenome: "              . $_POST['sobrenome']           . "<br>\n";
        echo "Email: "                  . $_POST['email']               . "<br>\n";
        echo "Sexo: "                   . $_POST['sexo']                . "<br>\n";
        echo "Lado da aplicação: "      . $_POST['ladoaplicacao']       . "<br>\n";    
        echo "Senioridade: "            . $_POST['senioridade']         . "<br>\n";

        // Verifica se o usuário selecionou algum checkbox
        if (isset($_POST['tecnologias'])){
            echo "<br>\nAs tecnologias selecionada são:                    <br>\n";
            foreach($_POST["tecnologias"] as $tecnologia){
                echo " - " . $tecnologia .                                "<br>\n";
            }
        }
        else{
            echo "<br>\nVoce não selecionou nenhuma tecnologia <br>\n";
        }
        
        if(isset($_POST['experiencia'])){
            echo "<br>\nSeu texto: <br><br>\n\n";
            echo $_POST['experiencia'] . "<br>\n";
        }
        else{
            echo "Você não escreveu nenhum texto sobre suas experiências profissionais <br>\n";
        }  
        ?>    
    </div>
</body>
</html>


