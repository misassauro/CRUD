<?php
include("include/cabecalho.php");
include("include/conexao.php");

if(isset($_GET["mensagem"]) && !empty($_GET["mensagem"])) {
    ?>
        <div class="alert alert-warning">
            <?php echo $_GET["mensagem"];?>
        </div>
    <?php
}
?>
<div class="card">
    <div class="card-header">
        <h1 class="text-center">Lista de produtos</h1>
    </div>
    <div class="card-body">
        <?php 
            $query = "SELECT * FROM produtos";
            $resultado = mysqli_query($conexao, $query);

            if (mysqli_num_rows($resultado) == 0) {
                ?>
                    <p>Você ainda não possui produtos cadastrados. Por favor, acesse a área <a href="cadastroProd.php">Cadastrar produtos</a> para adicionar seu primeiro produto à lista.</p>
                <?php
            } else {
        ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="table-dark">
                    <th class="text-center">Foto</th>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Quantidade</th> 
                    <th class="text-center">Data de cadastro</th>
                    <th></th>
                </tr>
                <tbody>
                    <?php
                        $query = "SELECT id, nome, qtde, imagem, data_upload from produtos";
                        $dados = mysqli_query($conexao, $query);

                        if ($dados) {
                            while ($linha = mysqli_fetch_assoc($dados)) {
                        ?>
                            <tr>
                                <td class="text-center">
                                    <img src="<?php echo $linha["imagem"];?>" width="80px"/>
                                </td>
                                <td class="text-center align-middle"><?php echo $linha["nome"];?></td>
                                <td class="text-center align-middle"><?php echo $linha["qtde"];?></td>
                                <td class="text-center align-middle"><?php echo date('d/m/Y (H:i)', strtotime($linha["data_upload"]));?></td>
                                <td class="text-center align-middle">
                                    <a class="btn btn-secondary" href="prodView.php?id=<?php echo $linha["id"];?>">Visualizar</a>
                                    <a class="btn btn-warning" href="prodEditar.php?id=<?php echo $linha["id"];?>">Editar</a>
                                    <a class="btn btn-danger" href="prodExcluir.php?id=<?php echo $linha["id"];?>">Excluir</a>
                                </td>
                            </tr>
                <?php
                        }
                    } else {

                    }
                ?>
                </tbody>
            </thead>
        </table>
        <?php 
            }
        ?>
    </div>
</div>

<?php include("include/rodape.php") ?>