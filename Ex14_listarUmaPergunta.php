<?php
	$pergunta = "";
	$linhas = array();
	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		$pergunta = $_GET["pergunta"]; //variável que vem do formulário de alterarPergunta, no caso a pergunta
	}
	$arquivoAluno = fopen("ask.txt","r") or die ("Erro na abertura do arquivo");
	$cabecalho = fgets($arquivoAluno);
	$x = 0;
	$colunaDados = array(); //declarar um array de colunas
	$achei = false; //nao esquecer de declarar como falso, para caso eu encontre, retornar V
	while (!feof($arquivoAluno)) //enquanto NAO ! for final do arquivo, eu continuo lendo
		{
			$linhas[] = fgets($arquivoAluno); //Vou abrir o arquivo e pegar o conteudo dele linha por linha
            $colunaDados = explode(";", $linhas[$x]); //coloco os dados de linhas separados por ; dentro do array colunaDados
			if ($colunaDados[0] == $pergunta) //posicao 0 pois, é onde está armezenada a matrícula
			{
				$achei = true; //se eu achei a variavel na colunaDados, eu retorno V e paro de procurar
				break;//colunaDados contem a variavel que eu quero
			}
			$x++;
		}
		if (!$achei)
		{
			echo "pergunta: $pergunta não encontrada";
			die;
		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LcSena</title>
</head>
<body>
<h1>3DAW - Buscar Pergunta</h1>
<br>
<a href="Ex14_criarPergunta.php">Criar Pergunta</a><br><br><br>
<a href="Ex14_alterarPergunta.php">Alterar Pergunta</a><br><br><br>
<a href="Ex14_listarPerguntas.php">Listar Perguntas</a><br><br><br>
<a href="Ex14_listarPerguntaDois.php">Listar Pergunta</a><br><br><br>
<a href="Ex14_excluirPergunta.php">Excluir Pergunta</a><br><br><br>
<br>
<form action="Ex14_alterarPerguntaNoArquivo.php" method=POST>
	Pergunta: <input type=text name="pergunta" value='<?php echo $colunaDados[0]; ?>'> <br>
	Resposta: <input type=text name="resposta" value='<?php echo $colunaDados[1]; ?>'> <br>
	Pontos '1-100': <input type=text name="pontos" value='<?php echo $colunaDados[2]; ?>'> <br>
	Dificuldade: <input type=text name="dificuldade" value='<?php echo $colunaDados[3]; ?>'> <br>
	Usuário: <input type=text name="user" value='<?php echo $colunaDados[4]; ?>'> <br>
	<br><br>
</form>
</body>
</html>