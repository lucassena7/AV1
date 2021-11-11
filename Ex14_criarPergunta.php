<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
        $pergunta = $_POST["pergunta"];
		$resposta = $_POST["resposta"];
        $pontos = $_POST["pontos"];
		$dificuldade = $_POST["dificuldade"];
		$user = $_POST["user"];
		
		//Escrever os dados do formulário em um arquivo de dados txt
		if (!file_exists("ask.txt")) //se o alunoNovo NAO existir
		{
			$txt = "pergunta;resposta;pontos;dificuldade;user\n"; //atribuindo a primeira linha aos dados que há no arquivo, Nao esquecer do n para quebrar  linha
			file_put_contents("ask.txt", $txt); //Se o arquivo não existir, ele cria e manda gravar o que esta no txt 
		}
		$txt = $pergunta . ";" . $resposta . ";" . $pontos . ";" . $dificuldade . ";" . $user . "\n";// colocando as variáveis dentro de txt
		file_put_contents("ask.txt", $txt, FILE_APPEND); 
	}
	//Esse formato serve para verificar se o arquivo existe, se existir ele escreve no final. Se nao existir, ele escreve o cabeçalho e escreve o restante no final
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LcSena</title>
</head>
<body>
<h1>3DAW - Criar Pergunta</h1>
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
	<input type="submit" value="Criar Pergunta">
</form>
</body>
</html>