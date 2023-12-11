 <?php

    include("include/cabecalho.php");
    include("include/conexao.php");

    if (isset($_POST) && !empty($_POST)) {
        if (empty($_POST["nome"]) || empty($_POST["qtde"])) {
            ?>
                <div class="alert alert-warning">
                    O preenchimento dos campos <strong>Nome</strong> e <strong>Quantidade</strong> é obrigatório.
                </div>
            <?php
        } else {
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $peso = $_POST["peso"];
            $qtde = $_POST["qtde"];

            if(isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])) {
                $path = "assets/img/".$_FILES["foto"]["name"];
                move_uploaded_file($_FILES["foto"]["tmp_name"], $path);
            } else {
                $path = "assets/img/imagem-padrao.png";
            }

            if (empty($_POST["descricao"]) && empty($_POST["peso"])) {
                $descricao = $_POST["descricao"] = "Descrição indefinida";
                $peso = $_POST["peso"] = "Peso indefinido";
            } else if (empty($_POST["descricao"])) {
                $descricao = $_POST["descricao"] = "Descrição indefinida";
            } else if (empty($_POST["peso"])) {
                $peso = $_POST["peso"] = "Peso indefinido";
            }

            $query = "INSERT INTO produtos (nome, descricao, peso, qtde, imagem, data_upload) VALUES ('$nome', '$descricao', '$peso', '$qtde', '$path', now())";

                $resultado = mysqli_query($conexao, $query);
                if ($resultado == 1) {
                    ?>
                        <div class="alert alert-success">
                            Cadastro realizado com sucesso!
                        </div>
                    <?php
                }
            } 
        }
    else {
    }

    ?>
<div class="card">    
    <div class="card-header">
        <h1>Cadastro de produto</h1>
    </div>
    <form action="cadastroProd.php" method="POST" enctype="multipart/form-data">
        <div class="m-4">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control mb-3" placeholder="Informe o nome do produto">

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" class="form-control mb-3" rows="1" placeholder="Informe a descrição do produto"></textarea>

            <label for="peso">Peso (em kg):</label>
            <input type="text" name="peso" class="form-control mb-3" id="peso" placeholder="Exemplo: 1,5kg">

            <label for="qtde">Quantidade (unidades):</label>
            <input type="number" name="qtde" class="form-control mb-3" placeholder="Exemplo: 20">

            <label for="foto">Foto do produto:</label><br>
            <input type="file" name="foto" class="form-control-file mb-1" accept="image/.jpg, .jpeg, .png">
            <hr>
            <div class="mt-4 text-center">
            <button type="submit" name="submit" class="btn btn-primary">Cadastrar</button>
        </div>
        </div>
    </form>
 </div>
 <?php
    include("include/rodape.php");
?>