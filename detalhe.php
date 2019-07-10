<?php

if(!isset($_GET['indice']) ){
    header('Location: index.php');// se não estiver definido o parâmetro índice, a funcao header envia um comando para redirecionar a pagina pra index.php
    exit(); //poderia ser usado die() ao invés de exit() para parar a execução da funcao
}

include_once "funcoes.php";

$listaProdutos = &obterListaProdutos();
$indice = $_GET['indice'];
$produto = $listaProdutos[$indice];

//print_r($produto); //para mostrar o array produto
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Detalhe do Produto <?=$produto['nome']?></title>
</head>
<body>
<form action="detalhes.php" method="POST">
<div class="card border-primary mb-3 " style="max-width: 600px; max-height: 600px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="uploads/<?=$produto['id']?>" class="card-img" alt="<?=$produto['nome']?>">
    </div>
    <div class="col-md-8">
      <div class="card-body text-primary">
        <h5 class="card-title">Nome: <?=$produto['nome']?></h5>
        <p class="card-text">Categoria: <?=$produto['categoria']?></p>
        <p class="card-text">Descrição: <?=$produto['descricao']?></p>
        <p class="card-text"><small class="text-muted">Quantidade em estoque: <?=$produto['quantidade']?></small></p>
        <h3 class="card-text">Preço: <?=$produto['preco']?></h3>

      </div>
    </div>
  </div>
</div>
</form>

<a href="index.php">Voltar</a>

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