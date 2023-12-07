<?php 
    include("include/conexao.php");
    
    if(isset($_POST["submit"])) {
        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $peso = $_POST["peso"];
        $qtde = $_POST["qtde"];
    }
?>
