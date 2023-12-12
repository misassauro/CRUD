<?php
include("include/cabecalho.php");
include("include/conexao.php");

if(isset($_GET["mensagem"]) && !empty($_GET["mensagem"])) { //Se a URL possuir um valor setado para a variável "mensagem", ela será exibida na tela.
    ?>
        <div class="alert alert-warning">
            <?php echo $_GET["mensagem"];?>
        </div>
    <?php
}
?>
<div class="card">
    <div class="card-header">
        <h1 class="text-center">Tabela de produtos</h1>
    </div>
    <div class="card-body">
        <?php 
            $query = "SELECT * FROM produtos"; //Query/Consulta que será feita dentro do banco de dados.
            $resultado = mysqli_query($conexao, $query); //mysqli_query insere dentro do banco de dados ($conexao) a consulta desejada ($query).

            if (mysqli_num_rows($resultado) == 0) { //Se o número de linhas de dados armazenados em $resultado for igual a 0, ou seja, se não houver nenhum cadastro dentro de nossa tabela de produtos, então a mensagem abaixo será exibida.
                ?>
                    <p>Você ainda não possui produtos cadastrados. Por favor, acesse a área <a href="cadastroProd.php">cadastrar produtos</a> para adicionar seu primeiro produto à lista.</p>
                <?php
            } else { //Caso contrário, será construída uma tabela para suportar os dados encontrados.
        ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="table-dark">
                    <th class="text-center">Foto</th>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Quantidade</th> 
                    <th class="text-center">Data de cadastro</th>
                    <th class="text-center">Opções</th>
                </tr>
                <tbody>
                    <?php
                        $query = "SELECT id, nome, qtde, imagem, data_upload from produtos"; //Consulta que puxará os dados que desejamos exibir dentro da tabela.
                        $dados = mysqli_query($conexao, $query);

                        if ($dados) { //Se $dados == true, ou seja, se nossa consulta retornar os valores esperados, executaremos o loop abaixo.
                            while ($linha = mysqli_fetch_assoc($dados)) { //Enquanto forem atribuídas linhas de dados para o array $linha, linhas de tabela serão construídas exibindo os cadastros encontrados através da busca (fetch) dentro de $dados (mysqli Object que armazena os cadastros já realizados).
                        ?> 
                            <tr>
                                <td class="text-center">
                                    <img src="<?php echo $linha["imagem"];?>" width="80px" alt="Imagem do produto" />
                                </td>
                                <td class="text-center align-middle"><?php echo $linha["nome"];?></td>
                                <td class="text-center align-middle"><?php echo $linha["qtde"];?></td>
                                <td class="text-center align-middle"><?php echo date('d/m/Y - H:i', strtotime($linha["data_upload"]));?></td>
                                <td class="text-center align-middle">
                                    <a class="btn btn-secondary" href="prodView.php?id=<?php echo $linha["id"];?>">Visualizar</a> <!--Ao clicar, o usuário é redirecionado para uma página de visualização do produto selecionado. Isso é possível com a captura com inserção do "id" dentro da URL, que será capturado pelo $_GET e tratado dentro de prodView. O mesmo acontece com os outros dois botões abaixo, com a diferença que o redirecionamento é feito para páginas diferentes.-->
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