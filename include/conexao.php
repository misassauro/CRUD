<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$db = "Cadastros";

$mysqli = new mysqli($hostname, $username, $password, $db);
if($mysqli->connect_errno) {
    echo 'Falha ao conectar com o banco de dados. (' . $mysqli->connect_errno . ') - ' . $mysqli->connect_error;
}
?>