<?php
		//Escrever os dados do formulário em um arquivo de dados txt
		$linhas = array();//criando um array das linhas para os dados de cada pergunta
		$colunas = array(); //criando um array colunas para preencher a primeira linha das colunas
		$arquivoAluno = fopen("ask.txt","r") or die ("Erro na abertura do arquivo"); //arvuivoAluno é uma variável que aponta para o arquivo ask txt, o R significa read
		$cabecalho = fgets($arquivoAluno); //jogando a primeira linha do arquivo na variavel cabecalho
		$colunas = explode(";", $cabecalho); //criou um array de colunas a partir da quebra de linhas ; pela variavel cabecalho
		//$x = 0;
		while (!feof($arquivoAluno)) //enquanto NAO ! for final do arquivo, eu continuo lendo
		{
			$linhas[] = fgets($arquivoAluno); //Vou abrir o arquivo e pegar o conteudo dele linha por linha
			//echo $linhas[$x] . "<br>";
			//$x++;
		}
		fclose($arquivoAluno);//fechando o arquivo
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LcSena</title>
</head>
<body>
<h1>3DAW - Listar Perguntas</h1>
<br>
<a href="Ex14_criarPergunta.php">Criar Pergunta</a><br><br><br>
<a href="Ex14_alterarPergunta.php">Alterar Pergunta</a><br><br><br>
<a href="Ex14_listarPerguntas.php">Listar Perguntas</a><br><br><br>
<a href="Ex14_listarPerguntaDois.php">Listar Pergunta</a><br><br><br>
<a href="Ex14_excluirPergunta.php">Excluir Pergunta</a><br><br><br>
<br><br>
<table border="1">
	<?php
    echo "<tr>";
		foreach ($colunas as $cabeca)
		{
			echo "<th>$cabeca</th>";
		}
			echo "<th>Alterar Pergunta</th>";
			echo "<th>Excluir Pergunta</th>";
    echo "</tr>";
	
        foreach ($linhas as $linha) //pego cada linha da variavel linhaS e jogo em linhA
		{
            echo "<tr>";
            $colunas1 = array(); //declarar um array de colunas
            $colunas1 = explode(";", $linha); //coloco os dados de linhA separados por ; dentro do array colunas1
//            echo $linha . "<br>";
			$perg = $colunas1[0]; //atribuindo a variavel perg recebendo o primeiro dado de colunas1, que é a pergunta
            foreach ($colunas1 as $coluna) //pego cada dado de colunas1 e jogo em coluna
			{
                echo "<td>$coluna</td>";
            }
			echo "<td><a href='Ex14_buscarPergunta.php?pergunta=$perg'>Alterar</a></td>"; //metodo GET para buscar o aluno no formulário buscarAluno
            echo "<td><a href='Ex14_buscarPerguntaExcluir.php?pergunta=$perg'>Excluir</a></td>";
			echo "</tr>";
        }
    ?>
</table>
</body>
</html>