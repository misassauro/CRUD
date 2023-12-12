<?php 

include("include/cabecalho.php");
include("include/conexao.php");

if(isset($_GET["id"]) && !empty($_GET["id"])) {
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
    header("Location: index.php?mensagem=Escolha o produto que deseja visualizar.");
    exit();
}

?>

<div class="card m-4">    
    <div class="card-header">
        <h1>Produto: <?php echo $nome?></h1>
    </div>
        <div class="card-img-top text-center mt-5">
            <img src="<?php echo $foto?>" alt="Card image cap" width="300px">
        </div>
        <div class="m-4">

            <label for="nome">ID:</label>
                <input type="text" name="id" value="<?php  echo $id; ?>" readonly class="form-control mb-3" >

                <label for="nome">Nome:</label>
                <input type="text" name="nome" value="<?php  echo $nome; ?>" readonly class="form-control mb-3">

                <label for="descricao">Descrição:</label>
                <textarea name="descricao" readonly class="form-control mb-3" rows="1"><?php  echo $descricao; ?></textarea>

                <label for="peso">Peso (em kg):</label>
                <input type="text" name="peso" value="<?php  echo $peso; ?>" readonly class="form-control mb-3" id="peso">

                <label for="qtde">Quantidade (unidades):</label>
                <input type="number" name="qtde" value="<?php  echo $qtde; ?>" readonly class="form-control mb-3">
       
        </div>
</div>
 <?php
    include("include/rodape.php");
?>