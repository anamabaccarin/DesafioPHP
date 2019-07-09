<?php
///////////////////////////////////////////////////////////////////////////////
// Definicao das Funcoes

function mockCreateInitialProducts() {
   $listaProdutos = &obterListaProdutos();
   array_push($listaProdutos, createProduct("Caneca de Vidro", "Caneca", "Suporta 350 ml", 100, 50.00, "camiseta.png"));
   array_push($listaProdutos, createProduct("Caneca de Plastico", "Caneca", "Suporta 500 ml", 200, 20.00, "camiseta.png"));
}

function createProduct($nome, $categoria, $descricao, $quantidade, $preco, $uploadFoto) {
    // Recebe variaveis (parametros) separados e desconectados e, com eles, cria um array (objeto) para representar um produto.
    return [
        'nome' => $nome,
        'categoria' => $categoria, 
        'descricao' => $descricao,
        'quantidade' => $quantidade,
        'preco' => $preco, 
        'uploadFoto' => $uploadFoto
    ];
}

function &obterListaProdutos() {
    if(!isset($_SESSION['ĹistaProdutos'])) { 
        //Quando não existe lista de produtos definida na sessão, essa funçao cria uma lista vazia!
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
    array_push($listaProdutos, $novoProduto); //Adiciono item a lista
}

function excluirProduto() {
    $indiceProduto = $_POST['excluirProduto'];

    $listaProdutos = &obterListaProdutos();// obtendo a lista da sessao, por meio da funcao ja existente
    unset($listaProdutos[$indiceProduto]); //Renovo item da lista
}

function executarAcoes() {
    if(isset($_POST['adicionarProduto']) ){
        adicionarProduto();
        return; // Apenas sai da função, sem retornar nada (retorno "void")
    }

    if(isset($_POST['excluirProduto']) ){
        excluirProduto();
        return;
    }
}

///////////////////////////////////////////////////////////////////////////////
// Execucoes

session_start();
executarAcoes();


// Utilizamos essa função para adicionar produtos na sessão e programar o caso de uso "Listar Produtos"
//mockCreateInitialProducts();