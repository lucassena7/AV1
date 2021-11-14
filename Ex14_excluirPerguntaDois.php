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
    $x = 0;
    //$linha = "";
    foreach ($linhas as $linha) 
	{
        $colunaDados = explode(";", $linha);
        if ($colunaDados[0] != $pergunta) 
		{
            $txt = $linha;
            fwrite($arquivoAlunoOut, $txt);
        }
    }
    fclose($arquivoAlunoOut);
}
?>
<!DOCTYPE html>
    <html>
        <head>
        </head>
        <body>
            <h1>Excluir Aluno</h1>
            <br>
            <br>
            <form action="Ex14_buscarPerguntaExcluir.php" method=POST>
                Pergunta: <input type=text name="pergunta" >
                <br><br>
                <input type="submit" value="Procurar">
            </form>
            <br>
        </body>
    </html>