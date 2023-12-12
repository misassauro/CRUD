<?php 

//Conexão com o banco de dados. Abaixo, é como se estivéssemos fazendo um login dentro da nossa base de dados a fim de conseguirmos usá-la.

$hostname = "localhost";
$username = "root";
$password = "";
$db = "cadastros";

//Efetuamos a conexão com o mysqli_connect, que, caso dê certo, nos retornará um objeto que representará nossa conexão com o servidor MySQL, ou, caso dê errado, nos retornará o valor "false". Neste último caso, podemos saber mais informações sobre o erro com $conexao->connect_errno e $conexao->connect_error 
$conexao = mysqli_connect($hostname, $username, $password) or die ("Erro ao conectar (" . $conexao->connect_errno .") " . $conexao->connect_error);

//Selecionando o banco de dados "cadastros"
mysqli_select_db($conexao, $db);
?>