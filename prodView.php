<?php 

include("include/cabecalho.php");
include("include/conexao.php");

//Essa página se trata da visualização das informações de um produto escolhido pelo usuário. Para que seja exibido o produto correto, usamos o ID único como referência.

if(isset($_GET["id"]) && !empty($_GET["id"])) { //Se o ID do produto estiver definido dentro da URL e não estiver vazio, ou seja, se nos for informado o ID do produto, executamos as instruções abaixo.

    $query = "SELECT * from produtos where id = ".$_GET["id"]; //Puxando todos os dados do produto especificado.

    $resultado = mysqli_query($conexao, $query);

    $dados = mysqli_fetch_array($resultado); //Transformamos em um array o $resultado de nossa consulta, que conterá todos os campos do produto desejado, e o atribuímos à $dados.

    //Abaixo, armazenamos cada um dos campos do array $dados em uma variável. Usaremos cada uma dessas variáveis para exibir os dados do produto dentro do código HTML. 

    $id = $dados["id"];
    $nome = $dados["nome"];
    $descricao = $dados["descricao"];
    $peso = $dados["peso"];
    $qtde = $dados["qtde"];
    $path = $dados["imagem"];
    $data_upload = $dados["data_upload"];

} 
else { //Se não for detectado nenhum ID, como aconteceria caso o usuário digitasse apenas prodView.php no final da URL, redirecionamos o usuário para a página inicial e exibimos uma mensagem pedindo para que ele selecione um produto.
    header("Location: index.php?mensagem=Escolha o produto que deseja visualizar.");
    exit();
}

?>

<div class="card m-4">    
    <div class="card-header">
        <h1>Produto: <?php echo $nome?></h1>
    </div>
        <div class="card-img-top text-center mt-5">
            <img src="<?php echo $path?>" alt="Card image cap">
        </div>
        <div class="exibir m-4">
            <!--Os inputs estão com o atributo readonly haja vista que esta página proporciona apenas a visualização das informações do produto, não sua edição.-->
            <label>ID:</label>
            <input type="text" name="id" value="<?php  echo $id; ?>" readonly class="form-control mb-3" >

            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php  echo $nome; ?>" readonly class="form-control mb-3">

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" readonly class="form-control mb-3" rows="1"><?php  echo $descricao; ?></textarea>

            <label for="peso">Peso (em kg):</label>
            <input type="text" name="peso" value="<?php  echo $peso; ?>" readonly class="form-control mb-3" id="peso">

            <label for="qtde">Quantidade (unidades):</label>
            <input type="number" name="qtde" value="<?php  echo $qtde; ?>" readonly class="form-control mb-3">

            <label>Data e hora de cadastro:</label>
            <input type="datetime" value="<?php echo date('d/m/Y - H:i', strtotime($data_upload));?>" readonly class="form-control">
        </div>
</div>
 <?php
    include("include/rodape.php");
?>