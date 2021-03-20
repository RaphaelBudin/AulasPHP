<html>
<head>
<title>Aula 05</title>
</head>
<body>

    <?php
        //Cria uma constante com a formatação de datas desejada, para economizar tempo
        const MEU_FORMATO_DATA = 'd-m-y H:i:s';
    ?>

    <H2>Exemplo de utilização da função printf()</H2>
    <?php
        echo "Exemplo com %d (decimal):</br>";
        printf("Você possui %d itens em sua cesta.</br>\n",10);
        echo "Exemplo com %b (binário):</br>\n";
        printf("Você possui %b itens em sua cesta.</br>\n",10);
        echo "Exemplo com %X (hexadecimal):</br>\n";
        printf("Você possui %X itens em sua cesta.</br>\n",10);
        echo "Exemplo com %x (hexadecimal):</br>\n";
        printf("Você possui %x itens em sua cesta.</br>\n",10);
        echo "Exemplo com %o (octal):</br>\n";
        printf("Você possui %o itens em sua cesta.</br>\n",10);
    ?>
    
    <H2>Outros exemplos</H2>

    <?php
        echo "Especificador %</br>\n";
        printf("Houve um aumento de 30%% no lalala...</br>\n");
        echo "Especificador %e</br>\n";
        printf("Valor aproximado de %e indivíduos</br>\n",7654380000000000);
    ?>

    <H2>Um exemplo prático para converter decimal em hexadecimal na definição da cor da fonte</H2>

    <?php
        printf("<font color='#%X%X%X'>Hello World</font></br>\n", 65, 127, 245);
    ?>

    <H2>Efeito degradê</H2>

    <?php
        $r = $g = $b = 40;
        printf("<font color='#%X%X%X'> Hello World</font><br>\n", $r+80, $g+80, $b+80);
        printf("<font color='#%X%X%X'> Hello World</font><br>\n", $r+40, $g+40, $b+40);
        printf("<font color='#%X%X%X'> Hello World</font><br>\n", $r, $g, $b);
        printf("<font color='#%X%X%X'> Hello World</font><br>\n", $r-40, $g-40, $b-40);
        printf("<font color='#%X%X%X'> Hello World</font><br>\n", $r-80, $g-80, $b-80);
    ?>
    
    <h2> Formatação de strings no printf() </h2>

    <?php
    	printf("O resultado é: $%f</br>\n",123.42/12);
        printf("O resultado é: $%20f</br>\n",123.42/12);
        printf("O resultado é: $%020f</br>\n",123.42/12);
        printf("O resultado é: $%20.2f</br>\n",123.42/12);
        printf("O resultado é: $%020.2ff</br>\n",123.42/12);
        printf("O resultado é: $%'.20.2f</br>\n",123.42/12);
        
        printf("O nome é: %s <br>\n", 'Fatec Mogi das Cruzes');
        printf("O nome é: %40s <br>\n", 'Fatec Mogi das Cruzes');
        printf("O nome é: %'.40s <br>\n", 'Fatec Mogi das Cruzes');
        
        $var = sprintf("O nome é: %'.40s <br>\n", 'Fatec Mogi das Cruzes');
        echo $var;
    ?>

    <h1> Trabalhando com datas </h1>

    <h3> time() </h3>
    <?php
        echo "Horário atual em timestamp: " . time() . "<br>\n";
        echo "Horário atual acrescido de 60 segundos em timestamp: " . (time() + 60) . "<br>\n"; //A adição sempre deve ser feita em termos de segundos
        echo "Horário atual acrescido de 1 hora em timestamp: " . (time() + (60*60)) . "<br>\n"; //Multiplica-se 60 por 60 segundos para obter uma hora, e por aí em diante
        echo "Horário atual acrescido de 1 dia em timestamp: " . (time() + (24*60*60)) . "<br>\n";
        echo "Horário atual acrescido de 1 semana em timestamp: " . (time() + (7*24*60*60)) . "<br>\n";
    ?>

    <h3> mktime() </h3>
    <?php
        echo "Transformando 31/12/2021 23h5920ss em timestamp com mktime(): " . (mktime(23,59,20,12,31,2021)) . "<br>\n";
    ?>

    <h3> date()</h3>
    <?php
        echo "Hoje é dia (custom) "  . date('d/m/y H:i:s',time()) ."<br>\n";
        echo "Hoje é dia (RSS) "     . date(DATE_RSS,time()) . "<br>\n";
        echo "Hoje é dia (W3C) "     . date(DATE_W3C,time()) . "<br>\n";
        echo "Hoje é dia (ATOM) "    . date(DATE_ATOM,time()) . "<br>\n"; 
        echo "Hoje é dia (COOKIE) "  . date(DATE_COOKIE,time()) . "<br>\n";
        echo "Hoje é dia (ISO)"      . date(DATE_ISO8601,time()) . "<br>\n";

        echo "Hoje é dia (const MEU_FORMATO_DATA): " . date(MEU_FORMATO_DATA,time()) . "<br>\n";
    ?>

    <h3> checkdate() </h3>
    <?php
        //checkdate() verifica se a data informada é válida
        if (checkdate(03,18,2021))
            echo "Data 18/03/2021 válida!";
        else
            echo "Data 18/03/2021 inválida!";
        echo "<br>\n";

        echo checkdate(2,29,2021) ? "Data 29/02/2021 válida!" :  "Data 29/02/2021 inválida"; echo "<br>\n";
        echo checkdate(2,29,2020) ? "Data 29/02/2020 válida!" :  "Data 29/02/2020 inválida"; echo "<br>\n";
    ?>

    <h3> date_parse()</h3>
    <?php
        // date_parse()
        $data_atual = '2021-03-19 09:30:03';
        //Transforma a data informada em um array associativo com os campos
        // year, month, day, hour, minute, second, fraction, warning_count, warnings => array(), error_count, errors => array(), is_localtime
        $arr_data = date_parse($data_atual);
        
        echo "<br>\nprint_r(): <br>\n";
        print_r($arr_data); //Exibe o array associativo com identação
        echo "var_dump(): <br>\n";
        var_dump($arr_data); //Exibe o array informado o tamanho do mesmo e o tipo de dados dos elementos
        echo "var_export(): <br>\n";
        var_export($arr_data); //Exibe o array associativo sem identação
    ?>
    
    <h3> getdate()</h3>
    <?php
        //Retorna um array_associativo com as seguintes chaves
        //segundos, minutos, horas, dia_do_mes, int_dia_da_semana, int_mes, ano, dia_do_ano, string_dia_da_semana, string_mes, timestamp
        $minha_data = getdate(time());
        print_r($minha_data);
    ?>

    <h3> strtotime() </h3>
    <?php
        $minha_data = date(MEU_FORMATO_DATA, time());
        //Quando o número do ano for de apenas 2 dígitos ele entende como formato ISO, o que exibirá ao contrário do formato Europeu
        echo "<br>\nData no formato ISO: " . date(MEU_FORMATO_DATA, strtotime($minha_data)) . "<br>\n";

        $minha_data = date(MEU_FORMATO_DATA, strtotime('+3 hous', strtotime($minha_data)));
        echo "Adicionada mais 3 horas: " . date(MEU_FORMATO_DATA, strtotime($minha_data)) . "<br>\n";

        $minha_data = date(MEU_FORMATO_DATA, strtotime('+3 days', strtotime($minha_data)));
        echo "Adicionada mais 3 dias: " . date(MEU_FORMATO_DATA, strtotime($minha_data)) . "<br>\n";

        $minha_data = date(MEU_FORMATO_DATA, strtotime('+3 months', strtotime($minha_data)));
        echo "Adicionada mais 3 meses: " . date(MEU_FORMATO_DATA, strtotime($minha_data)) . "<br>\n";
        
        $minha_data = date(MEU_FORMATO_DATA, strtotime('+3 years', strtotime($minha_data)));
        echo "Adicionada mais 3 anos: " . date(MEU_FORMATO_DATA, strtotime($minha_data)) . "<br>\n";
    ?>

printf() + caracteres de escape + conversão rgb + efeito degradê + formatação string;
Trabalhando com datas: time(), mktime(), date(), checkdate(), date_parse(), getdate(), strtotime(),
    
</body>