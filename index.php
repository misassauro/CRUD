<?php include("include/cabecalho.php")?>

<h1 class="text-center">
    Sistema de cadastro de produtos
    <?php 
    if(!isset($_POST) or empty($_POST)) {
        echo "<h2 class='text-center mt-5'>Não há nenhum cadastro no momento</h2>";
    } else {
        echo "<h2 class='text-center mt-5'>Existem produtos cadastrados.</h2>";
    }
?>
</h1>

<?php include("include/rodape.php")?>
