 <?php 
    include("include/conexao.php");
    include("include/cabecalho.php");
?>
<h1>Cadastro de produto</h1>
<form action="salvarForm.php" method="post">
    <div class="mb-3">
        <label for="nome">Nome do produto:</label>
        <input type="text" name="nome" class="form-control mb-3">

        <label for="descricao">Descrição:</label>
        <textarea name="descricao" class="form-control mb-3" rows="1"></textarea>

        <label for="peso">Peso (em kg):</label>
        <input type="number" name="peso" class="form-control mb-3" placeholder="Exemplo: 0.5kg">

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