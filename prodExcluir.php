<?php 

    if(isset($_GET["id"]) && !empty($_GET["id"])) {
        include("include/conexao.php");

        $query = "Delete from produtos where id = ".$_GET["id"];
        $resultado = mysqli_query($conexao, $query);

        if($resultado) {
            header("Location: index.php?mensagem=Produto excluído com sucesso!");
            exit();
        } else {
            header("Location: index.php?mensagem=Erro ao excluir o produto.");
            exit();
        }
    } 
    else {
        header("Location: index.php?mensagem=Escolha o produto que deseja excluir");
        exit();
    }

?>