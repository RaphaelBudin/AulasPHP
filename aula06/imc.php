<?php
    if (isset($_POST)){

        echo "<h1>Cálculo IMC </h1>";
        echo "Peso: " . $_POST['peso'] . "<br>\n";
        echo "Altura: " . $_POST['altura'] . "<br>\n";
        extract($_POST);
        $var_IMC = $_POST['peso'] / ($_POST['altura'] * $_POST['altura']) * 10000;

        printf("Seu IMC é: %.2f  <br>\n", $var_IMC);
        echo "Sua situação: ";
    
        if ($var_IMC < 18.5)        {echo "ABAIXO do ideal";}
        else if ($var_IMC > 25.0)   {echo "ACIMA do ideal";}
        else                        {echo "PESO IDEAL";}
        echo "<br>\n";

        echo "<h2> Informações do Extract </h2>\n<br>";
        echo $peso . "kg \n<br>";
        echo $altura . " cm\n<br>";
    }
    else    {echo "Você não inseriu nenhuma informação <br>\n";}
    
?>