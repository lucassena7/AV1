<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $pergunta = $_POST["pergunta"];
	$resposta = $_POST["resposta"];
    $pontos = $_POST["pontos"];
	$dificuldade = $_POST["dificuldade"];
	$user = $_POST["user"];
    
	$arquivoAlunoIn = fopen("ask.txt", "r") or die("Erro na abertura do arquivo");
    while (!feof($arquivoAlunoIn)) 
	{
        $linhas[] = fgets($arquivoAlunoIn);
    }
    fclose($arquivoAlunoIn);

    $arquivoAlunoOut = fopen("ask.txt", "w") or die("Erro na abertura do arquivo");
    foreach ($linhas as $linha) 
	{
        $colunaDados = explode(";", $linha);
        if ($colunaDados[0] == $pergunta) 
		{
			$txt = "$pergunta;$resposta;$pontos;$dificuldade;$user\n";
        } 
		else 
		{
            $txt = $linha;
        }
        fwrite($arquivoAlunoOut, $txt);
    }
    fclose($arquivoAlunoOut);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LcSena</title>
</head>
<body>
<h1>3DAW - Alterar Aluno</h1>
<br>
<a href="Ex14_criarPergunta.php">Criar Pergunta</a><br><br><br>
<a href="Ex14_alterarPergunta.php">Alterar Pergunta</a><br><br><br>
<a href="Ex14_listarPerguntas.php">Listar Perguntas</a><br><br><br>
<a href="Ex14_listarPerguntaDois.php">Listar Pergunta</a><br><br><br>
<a href="Ex14_excluirPergunta.php">Excluir Pergunta</a><br><br><br>
<br>
<form action="Ex14_criarPergunta.php" method=POST>
	Pergunta: <input type=text name="pergunta"> <br>
	Resposta: <input type=text name="resposta"> <br>
	Pontos '1-100': <input type=text name="pontos"> <br>
	Dificuldade: <input type=text name="dificuldade"> <br>
	Usuário: <input type=text name="user"> <br>
	<br><br>
	<input type="submit" value="Alterar Pergunta">
</form>
</body>
</html>