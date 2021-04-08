<?php
    // 0,4 ponto
    function higieniza_string($string){
        // deverá tratar o string e devolvê-lo após sua sanitização
        $string = preg_replace( '/[^0-9]/is', '', $string);
		return $string;
    }

    // 0,2 ponto
    function retorna_nome(){
        // deverá retornar o nome sanitizado fornecido no form1
        global $nome;
		return $nome;
    }

    // 0,2 ponto
    function retorna_data(){
        date_default_timezone_set('America/Sao_Paulo');
        // deverá retornar a data atual no formato mm-yyyy
        return date("d-m-y", time());
    }

    // 0,2 ponto
    function retorna_tipo(){
        // deverá retornar Pessoa Física ou Pessoa Jurídica de acordo com o valor do tipo de pessoa do form1
        global $tppessoa;
        return ($tppessoa == 'F'? "Física" : "Jurídica");
    }

    // 0,2 ponto
    function retorna_documento(){
        // deverá retornar o número sanitizado do documento informado no formulário form1
        // este valor deve ser validado na função valida_documento()
        // se o valor não for válido, deve ser retornado um string com o texto 
        // documento inválido após o número do documento informado
        global $cpfcnpj;
        $resultado = higieniza_string($cpfcnpj);
        $resultado =  valida_documento($resultado);
        if ($resultado = true){
            return higieniza_string($cpfcnpj);
        }
        return "Documento inválido após o número do documento informado\n";
    }

    // 0,2 ponto
    function valida_documento(){
        // se a pessoa for física, retornar o retorno da função que valida CPF
        // se a pessoa for jurídica, retornar o retorno da função que valida CNPJ
        global $cpfcnpj;
        $tipo = retorna_tipo();
        if (($tipo == "Física")){
            return valida_cpf();
        }
        else{
            return valida_cnpj();
        }
    }

    // 0,3 ponto
    function valida_cpf(){
         // fazer um validador de cpf a partir da entrada do formulário
        global $cpfcnpj;
        $cpf = $cpfcnpj;
        
        //guarda apenas os números
        $cpf = higieniza_string($cpf);
     
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }
    
    // 0,3 ponto
    function valida_cnpj(){
        // fazer um validador de cnpj a partir da entrada do formulário
        global $cpfcnpj;
        $cnpj = $cpfcnpj;
        //guarda
        $cnpj = higieniza_string($cnpj);
        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
        {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
            return false;
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
        {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }
    
    // 0,3 ponto
    function valida_site(){
        // fazer um validador de site a partir da entrada do formulário
        global $site;
        $url = parse_url($site);
        unset($url['host']); 
        unset($url['scheme']);
        if (count($url)){
            return false;
        }
        return true;
    }
    
    // 0,2 ponto
    function retorna_site(){
        // deverá retornar o site sanitizado que foi informado no formulário.
        // Se o site não for válido, informar SITE INVÁLIDO depois do nome do site
        global $site;
        $valido = valida_site();
        return ($valido == true? $site : $site . " - SITE INVÁLIDO. Usar formato http:// ");
    }
    
    // 0,3 ponto
    function valida_email(){
        // fazer um validador de email a partir da entrada do formulário
        global $email;
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    
    // 0,2 ponto
    function retorna_email(){
        // deverá retornar o email sanitizado a partir da entrada do formulário depois de validado
        // caso o validador acuse email inválido, deverá retornar o string EMAIL INVÁLIDO
        // após o email fornecido
        global $email;
        $resultado = valida_email();
        $string = ($resultado == true ? $email : "EMAIL INVÁLIDO");
        //Retornar raphaelconta@hotmail.com
        return $string;
    }
    
    // 0,2 ponto
    function retorna_tipo_reclamacao(){
        // deverá retornar o tipo da reclamação a partir da entrada do formulário
        global $lista1;
        if ($lista1 == "hard"){
            return "Defeito no Hardware";
        }
        elseif ($lista1 == "soft"){
            return "Defeito no Software";
        }
        elseif ($lista1 == "naoid"){
            return "Defeito não identificado";
        }
        elseif($lista1 == "naoid"){
            return "Outros";
        }
        return $lista1;
    }
    
    // 0,3 ponto
    function retorna_estado(){
        global $cep;
        // deverá analisar o CEP fornecido no formulário e buscar o estado no site via cep
        // e retornar o estado a que o CEP pertence
        $cep = str_replace("-","", $cep);
        $cep = trim($cep);                  //Remove espaços em branco no começo e final da string. '   Exemplo   ' vira 'Exemplo'
        $json = file_get_contents("https://viacep.com.br/ws/".$cep."/json/");
        $jsonDecodificado = json_decode($json);
        return $jsonDecodificado->uf;
    }
    
    // 0,5 ponto
    function retorna_quantidade(){
        // deverá retornar a quantidade de palavras postadas no campo referente à reclamação
        // a partir do formulário
        global $mensagem;
        return strlen($mensagem);
    }
    
    // 0,5 ponto
    function retorna_positivas(){
        // a partir do texto postado na reclamação do usuário, retornar quantas palavras positivas
        // podem ser identificadas, utilizando o array abaixo
        global $mensagem;
        $positivas = array('bom','bons','boa','boas','excelente','ótimo');
        $quantidade = 0;
        foreach($positivas as $chave =>$valor){
            $quantidade += substr_count($mensagem, $valor);
        }
        return $quantidade;
    }
    
    // 0,5 ponto
    function retorna_negativas(){
        // a partir do texto postado na reclamação do usuário, retornar quantas palavras negativas
        // podem ser identificadas, utilizando o array abaixo
        global $mensagem;
        $negativas = array('ruim','ruins','péssimo','horrível');
        $quantidade = 0;
        foreach($negativas as $chave =>$valor){
            $quantidade += substr_count($mensagem, $valor);
        }
        return $quantidade;
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Respostas</title>
<style>
body {
  background-color: silver;
  text-align: left;
  color: black;
  font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>
<body>

<h1>Avaliação de PHP</h1>
<h2><b>Questões resolvidas</b></h2>
<?php
    print_r($_POST);
    extract($_POST);

?>
<h2>Olá <?php echo retorna_nome();?></h2>
<p><b>Data da reclamação: <?php echo retorna_data();?></b></p>
<p><b>Tipo de documento: <?php echo retorna_tipo();?></b></p>
<p><b>Dados do reclamante: <?php echo retorna_documento() . " - " . retorna_email();?></b></p>
<p><b>Tipo de reclamação: <?php echo retorna_tipo_reclamacao();?></b></p>
<p><b>Estado de origem: <?php echo retorna_estado();?></b></p>
<p><b>Site da compra: <?php echo retorna_site();?></b></p>
<p><b>Quantidade de palavras postadas: <?php echo retorna_quantidade();?></b></p>
<p><b>Quantidade de palavras positivas: <?php echo retorna_positivas();?></b></p>
<p><b>Quantidade de palavras negativas: <?php echo retorna_negativas();?></b></p>
<p>&nbsp;</p>

</body>
</html>
