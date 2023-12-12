 <?php

    include("include/cabecalho.php"); //O include, como o próprio nome sugere, inclui em nosso arquivo os códigos inseridos em outro arquivo. Estamos, basicamente, "reescrevendo" o código de outro arquivo, mas sem ter o trabalho de realmente escrevê-lo de novo.
    include("include/conexao.php"); 

    if (isset($_POST) && !empty($_POST)) { //Confirmando se, depois de apertarmos o botão "Cadastrar", o array $_POST foi definido e não se encontra vazio. Ou seja, esta verificação confirma se os dados cadastrados foram enviados para o array $_POST.

            //Atribuindo cada um dos campos cadastrados para suas respectivas variáveis
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $peso = $_POST["peso"];
            $qtde = $_POST["qtde"];

            if(isset($_FILES["foto"]) && !empty($_FILES["foto"]["name"])) { //Se o array $_FILES["foto"] estiver definido e sua posição "nome", que contém o caminho da imagem do produto, não estiver vazia...
                $path = "assets/img/".$_FILES["foto"]["name"]; //A variável $path, que contém o caminho para a pasta, é concatenada com o nome da imagem postada. 
                move_uploaded_file($_FILES["foto"]["tmp_name"], $path); //Movemos a imagem para a pasta onde iremos armazenar as fotos dos produtos.
            } else { //Se não for enviada nenhuma imagem, uma imagem padrão será definida para o produto.
                $path = "assets/img/imagem-padrao.png";
            }

            //Se o usuário não preencher os campos "Descrição" e "Peso", será atribuída uma string para essas variáveis dizendo que elas foram indefinidas.
            if (empty($_POST["descricao"]) && empty($_POST["peso"])) {
                $descricao = $_POST["descricao"] = "Descrição indefinida";
                $peso = $_POST["peso"] = "Peso indefinido";
            } else if (empty($_POST["descricao"])) {
                $descricao = $_POST["descricao"] = "Descrição indefinida";
            } else if (empty($_POST["peso"])) {
                $peso = $_POST["peso"] = "Peso indefinido";
            }

            //Se nenhuma das condições acima forem atendidas, significando então que está tudo certo, realizamos a inserção dos dados cadastrados pelo usuário dentro de nossa tabela "produtos".

            $query = "INSERT INTO produtos (nome, descricao, peso, qtde, imagem, data_upload) VALUES ('$nome', '$descricao', '$peso', '$qtde', '$path', now())";

                $resultado = mysqli_query($conexao, $query);
                if ($resultado == 1) {
                    ?>
                        <div class="alert alert-success">
                            Cadastro realizado com sucesso!
                        </div>
                    <?php
                } else {
                    ?>
                        <div class="alert alert-danger" >
                            Algo deu errado. Erro <?php echo mysqli_error($conexao);?> <!--Mensagem de erro-->
                        </div>
                    <?php
                }
            } 
            else {
                //Else vazio, já que, ao ingressar na página não existe $_POST definido. Sendo assim, qualquer coisa que colocarmos aqui aparecia antes mesmo do usuário cadastrar um produto. Ele poderia ser retirado daqui, mas preferi deixá-lo a fim de tomar nota.
    }

    ?>
<div class="card">    
    <div class="card-header">
        <h1>Cadastrar produto</h1>
    </div>
    <form action="cadastroProd.php" method="POST" enctype="multipart/form-data"> <!--From que encaminha, através do método POST, as informações cadastradas para o array $_POST dentro da própria página cadastroProd.php-->
        <div class="m-4"> <!--O nome inserido dentro do atributo "name" em cada um dos inputs servirá como chave para posteriormente acessarmos os valores dentro de cada campo de um cadastro.-->
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control mb-3" required placeholder="Informe o nome do produto">

            <label>Descrição:</label>
            <textarea name="descricao" class="form-control mb-3" rows="1" placeholder="Informe a descrição do produto"></textarea>

            <label>Peso (em kg):</label>
            <input type="text" name="peso" class="form-control mb-3" id="peso" placeholder="Exemplo: 1,5kg">

            <label>Quantidade (unidades):</label>
            <input type="number" name="qtde" class="form-control mb-3" required placeholder="Exemplo: 20">

            <label>Foto do produto:</label><br>
            <input type="file" name="foto" class="form-control-file mb-1" accept="image/jpeg, .jpg, .png">
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