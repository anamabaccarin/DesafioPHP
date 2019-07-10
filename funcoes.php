<?php
///////////////////////////////////////////////////////////////////////////////
// Definicao das Funcoes

function mockCreateInitialProducts() {
   $listaProdutos = &obterListaProdutos();

   $produto = createProduct("Caneca de Vidro", "Caneca", "Suporta 350 ml", 100, 50.00, "camiseta.png");
   $listaProdutos[$produto['id']] = $produto;

   $produto = createProduct("Caneca de Plastico", "Caneca", "Suporta 500 ml", 200, 20.00, "camiseta.png");
   $listaProdutos[$produto['id']] = $produto;
}

function createProduct($nome, $categoria, $descricao, $quantidade, $preco, $foto) {
    // Recebe variaveis (parametros) separados e desconectados e, com eles, cria um array (objeto) para representar um produto.
    return [
        'id' => hash('sha256', uniqid("")), // gera um idenficador unico para o registro
        'nome' => $nome,
        'categoria' => $categoria, 
        'descricao' => $descricao,
        'quantidade' => $quantidade,
        'preco' => $preco, 
        'foto' => $foto
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
    $img = $_FILES['img'];

    $novoProduto = createProduct($nomeProduto, $categoria, $descricao, $quantidade, $preco, $img);
   
    //Movimenta o arquivo temporario que foi carregado por upload no servidor para um diretorio conhecido e accessivel via http
    move_uploaded_file($img['tmp_name'], dirname(__FILE__) . "/uploads/" . $novoProduto['id']);

    $listaProdutos = &obterListaProdutos(); 
    $listaProdutos[$novoProduto['id']] = $novoProduto; //Adiciono item a lista
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