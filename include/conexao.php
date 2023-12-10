<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$db = "cadastros";

$conexao = mysqli_connect($hostname, $username, $password) or die ("Erro ao conectar (" . $conexao->connect_errno .") " . $conexao->connect_error);

mysqli_select_db($conexao, $db);
?>