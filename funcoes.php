<?php
///////////////////////////////////////////////////////////////////////////////
// Definicao das Funcoes

function mockCreateInitialProducts() {
   $listaProdutos = &obterListaProdutos();
   array_push($listaProdutos, createProduct("Caneca de Vidro", "Caneca", "Suporta 350 ml", 100, 50.00, "camiseta.png"));
   array_push($listaProdutos, createProduct("Caneca de Plastico", "Caneca", "Suporta 500 ml", 200, 20.00, "camiseta.png"));
}

function createProduct($nome, $categoria, $descricao, $quantidade, $preco, $uploadFoto) {
    // Recebe variaveis (parametros) separados e desconectados e, com eles, cria um array (objecto) para representar um produto.
    return ['nome' => $nome, 
        'categoria' => $categoria, 
        'descricao' => $descricao, 
        'preco' => $preco, 
        'uploadFoto' => $uploadFoto];
}

function &obterListaProdutos() {
    if(!isset($_SESSION['ĹistaProdutos'])) { 
        //Quando não existe lista de produtos definida na sessão, tenho que definir!
        $_SESSION['ĹistaProdutos'] = array();//cria array vazio
    }
    return $_SESSION['ĹistaProdutos'];
}

function adicionarProduto(){
    //Pegando informaçoes do form e associando às respectivas variáveis.
    $nomeProduto = $_POST['nomeProduto'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $img = $_POST['img'];

    $novoProduto = createProduct($nomeProduto, $categoria, $descricao, $quantidade, $preco, $img);
   
    $listaProdutos = &obterListaProdutos(); 
    array_push($listaProdutos, $novoProduto);
}

///////////////////////////////////////////////////////////////////////////////
// Execucoes

session_start();

if(isset($_POST['adicionarProduto']) ){
    adicionarProduto();
}
