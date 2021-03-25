<?php
    echo "<pre>";
    const MEU_FORMATO_DATA = 'd-m-y H:i:s';
    if(isset($_POST)){
        $nome = $_POST['nome'];
        $hora = date('H', strtotime("-10 hours", strtotime(time())));
        echo "<h2>" . $hora . "h </h2>\n";
        echo "<h1>";
        if ($hora < 12){
            
            echo "Bom DIA " . $nome .  "\n";
        }
        else if ($hora < 19){
            echo "Boa TARDE " . $nome .  "\n";
        }
        else{
            echo "Boa NOITE " . $nome .  "\n";
        }
        echo "<h1>";
    }
    else{
        echo "O formulário veio vazio<br>\n";
    }
    echo "</pre>";
?>