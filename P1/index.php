<!DOCTYPE html>
<html>
<head>
<title>Email</title>
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
<h2><b>Formulário de envio</b></h2>
<form action="respostas.php" id="form1" method="post" name="form1">
    <p><b>Tipo de Reclama&ccedil;&atilde;o</b></p>
    <p>
        <select name="lista1" id="lista1">
        <option value="hard">Defeito no hardware</option>
        <option value="soft">Defeito no software</option>
        <option value="naoid">Defeito n&atilde;o identificado</option>
        <option value="outro">Outro</option>
        </select>
    </p>
    <p>   <b>Menssagem</b></p>
    <p> <textarea cols="50" name="mensagem" id="mensagem" required="required" rows="10"></textarea></p>

    <p>   <b>Nome</b></p>
    <p> <input name="nome" id="nome" required="required" type="text" maxlength="50"  size="50"  /></p>

    <p>   <b>E-Mail</b></p>
    <p> <input name="email" id="email" required="required" type="text" maxlength="50"  size="50"  /></p>

    <p>   <b>Tipo de Pessoa</b>
    <p> <input checked="checked" name="tppessoa" id="tppessoa" type="radio" value="F" /> F&iacute;sica</p>
    <p> <input name="tppessoa" id="tppessoa" type="radio" value="J" />&nbsp;Jur&iacute;dica</p>

    <p>   <b>CPF / CNPJ</b></p>
    <p> <input name="cpfcnpj" id="cpfcnpj" required="required" type="text"  maxlength="15"  size="15"   /></p>

    <p>   <b>Data da compra</b></p>
    <p> <input type="date" name="vdata" id="vdata" required="required" /></p>

    <p>   <b>Site onde foi feita a compra</b></p>
    <p> <input type="text" name="site" id="site" required="required" /></p>

    <p>   <b>CEP da regi&atilde;o</b></p>
    <p> <input type="text" name="cep" id="cep" required="required" /></p>
    <p> <input name="Enviar" type="submit" value="Enviar" /></p>
</form>

<p>&nbsp;</p>

</body>
</html>
