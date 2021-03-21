<?php
    echo "<h1> Obrigado por preencher o nosso formulário! </h1><br>\n";
    echo "As informações que você preencheu: <br>\n";
    echo "Primeiro nome: " . $_POST['primeiro_nome'] . "<br>\n";
    echo "Sobrenome: " .  $_POST['sobrenome'] . "<br>\n";
    echo "Email: " . $_POST['email'] . "<br>\n";
    echo "Sexo: " . $_POST['sexo'] . "<br>\n";
    echo "Lado da aplicação: " . $_POST['ladoaplicacao'] . "<br>\n";    
    echo "Senioridade: " . $_POST['senioridade'] . "<br>\n";

    // Verifica se o usuário selecionou algum checkbox
    if (isset($_POST['tecnologias'])){
        echo "<br>\nAs tecnologias selecionada são: <br>\n";
        foreach($_POST["tecnologias"] as $tecnologia){
            echo " - " . $tecnologia . "<br>\n";
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