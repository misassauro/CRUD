 <?php

use function PHPSTORM_META\type;

    include("include/conexao.php");
    include("include/cabecalho.php");

    if(isset($_POST) && !empty($_POST[""])) {
        if(empty($_POST["nome"])) {
            ?>
                <div class="alert alert-danger">
                    O campo "Nome do produto" não pode estar vazio.
                </div>
            <?php
        }
    } else if (empty($_POST["descricao"])) {
        $_POST["descricao"] = "Indefinida";
    } 
    else if (empty($_POST["peso"])) {
        $_POST["peso"] = "Indefinido";
    }
     else if (!is_float($_POST["peso"]) or !is_int($_POST["peso"])) {
        ?>
             <div class="alert alert-danger">
                    O campo "Peso" deve ser preenchido apenas com números.
            </div>
        <?php
    }
    if(isset($_POST["submit"])) {
        $nome = $_POST["nome"];
        $descricao = $_POST["descricao"];
        $peso = $_POST["peso"];
        $qtde = $_POST["qtde"];
        $path = $_POST["img"];
    }
?>
<h1>Cadastro de produto</h1>
<form action="cadastroProd.php" method="post">
    <div class="mb-3">
        <label for="nome">Nome do produto:</label>
        <input type="text" name="nome" class="form-control mb-3">

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" class="form-control mb-3" rows="1"></textarea>

        <label for="peso">Peso (em kg):</label>
        <input maxlength="6" type="text" name="peso" class="form-control mb-3" id="mascara">

        <label for="qtde">Quantidade (unidades):</label>
        <input type="number" name="qtde" class="form-control mb-3" placeholder="Exemplo: 20">

        <label for="img">Foto do produto:</label>
        <input type="file" name="img" enctype="multipart/form-data" class="form-control-file">
        <hr>
    </div>
    <div class="mt-3 text-center">
        <button type="submit" name="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</form>
<?php 
    include("include/rodape.php");
?>