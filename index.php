<?php include_once "funcoes.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Desafio PHP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <h2>Lista de Produtos </h2>

<?php 
   $listaProdutos = &obterListaProdutos();
?>

<?php if( empty($listaProdutos)) : ?>
    Não há produtos na lista

<?php else: ?>
            <table class="table">
                <thead>
                    <tr>    
                        <th scope="col">Nome</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Preço</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($listaProdutos as $indice => $produto):?>
                    <tr>
                        <td><?=$produto['nome']?></td>  <?php /* sintaxe curta de echo */ ?>
                        <td><?php echo $produto['categoria']?></td> <?php /* echo por extenso */ ?>
                        <td><?=$produto['preco']?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

<?php endif; ?>
 
           </div>
            <div class="col-md-4 border border-success rounded p-3">     
                <form id="formCadastro" method="POST" action="index.php" >
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nome</label>
                        <input type="text" class="form-control" id="nomeProduto" name="nomeProduto" placeholder="Nome do Produto">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Categoria</label>
                        <select class="form-control" id="categoria" name="categoria">
                            <option></option>
                            <option>Canecas</option>
                            <option>Camisetas</option>
                            <option>Cadernos</option>
                            <option>Capas de celular</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"> Descrição </label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="exampleFormControlInput1">Quantidade</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade de Produtos">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Preço</label>
                        <input type="number" step="0.01" class="form-control" id="preco" name="preco" placeholder="Preço unitário">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Upload da foto do produto</label>
                        <input type="file" class="form-control-file" name="img" id="fotoProduto">
                    </div>
                    <button type="submit" name="adicionarProduto" class="btn btn-success mb-2">Enviar</button>

                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="js/validacoes.js"></script>
</body>

</html>