<?php 

include("include/cabecalho.php");
include("include/conexao.php");

if(isset($_POST) && !empty($_POST)) {
            $id = $_POST["id"];
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $peso = $_POST["peso"];
            $qtde = $_POST["qtde"];

            if (empty($_POST["descricao"]) && empty($_POST["peso"])) {
                $descricao = $_POST["descricao"] = "Descrição indefinida";
                $peso = $_POST["peso"] = "Peso indefinido";
            } else if (empty($_POST["descricao"])) {
                $descricao = $_POST["descricao"] = "Descrição indefinida";
            } else if (empty($_POST["peso"])) {
                $peso = $_POST["peso"] = "Peso indefinido";
            }
            
            if(isset($_FILES["foto"]) && !empty($_FILES["foto"])) {

                $path = "assets/img/".$_FILES["foto"]["name"];
                move_uploaded_file($_FILES["foto"]["tmp_name"], $path);

                } else {
                    $path = "assets/img/padrao.png";
                    
                }

            $query = "UPDATE produtos SET nome = '$nome', descricao = '$descricao', peso = '$peso', qtde = '$qtde', imagem = '$path', data_upload = now() WHERE id = '$id'";

                $resultado = mysqli_query($conexao, $query);
                if ($resultado == 1) {
                    header("Location: index.php?mensagem=Produto editado com sucesso!");
                } else {
                    header("Location: index.php?mensagem=Ocorreu um erro ao editar o produto.");
                }

} else if(isset($_GET["id"]) && !empty($_GET["id"])) {
    include("include/conexao.php");

    $query = "SELECT * from produtos where id = ".$_GET["id"];

    $resultado = mysqli_query($conexao, $query);

    $dados = mysqli_fetch_array($resultado);

    $id = $dados["id"];
    $nome = $dados["nome"];
    $descricao = $dados["descricao"];
    $peso = $dados["peso"];
    $qtde = $dados["qtde"];
    $foto = $dados["imagem"];

} 
else {
    header("Location: index.php?mensagem=Escolha o produto que deseja editar");
    exit();
}

?>

<div class="card m-4">    
    <div class="card-header">
        <h1>Editar produto</h1>
    </div>
        <div class="card-img-top text-center mt-5">
            <img src="<?php echo $foto?>" alt="Card image cap" width="200px">
    </div>
        <h2 class="card-title m-4">Produto: <?php echo $nome?></h2>
        <form action="prodEditar.php" method="POST" enctype="multipart/form-data">
        <div class="m-4">

            <label for="nome">ID:</label>
                <input type="text" name="id" value="<?php  echo $id; ?>" readonly class="form-control mb-3" >

                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="<?php  echo $nome; ?>" class="form-control mb-3">

                <label for="descricao">Descrição:</label>
                <textarea name="descricao" class="form-control mb-3" rows="1"><?php  echo $descricao; ?></textarea>

                <label for="peso">Peso (em kg):</label>
                <input type="text" name="peso" value="<?php  echo $peso; ?>" class="form-control mb-3" id="peso">

                <label for="qtde">Quantidade (unidades):</label>
                <input type="number" name="qtde" value="<?php  echo $qtde; ?>" class="form-control mb-3">

                <label for="foto">Nova foto:</label><br>
                <input type="file" name="foto" class="form-control-file mb-1" accept="image/.jpg, .jpeg, .png">
                <hr>
                <div class="mt-4 text-center">
                    <button type="submit" name="submit" class="btn btn-primary">Editar</button>
                </div>
    </form>
       
  </div>
</div>
 <?php
    include("include/rodape.php");
?>