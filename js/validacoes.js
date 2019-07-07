
document.getElementById("formCadastro").addEventListener("submit", function(event){
    
    let nomeProduto = document.getElementById("nomeProduto");
    if(nomeProduto.value == ""){
        alert("Nome do produto deve ser informado!");
        event.preventDefault(); // cancela o submit
        nomeProduto.focus();
        return;
    }

    let categoria = document.getElementById("categoria");
    if(categoria.value == ""){
        alert("Selecione uma categoria!");
        event.preventDefault();
        categoria.focus();
        return;
    }

    let descricao = document.getElementById("descricao");
    if(descricao.value == ""){
        alert("Descrição deve ser informada!");
        event.preventDefault(); // cancela o submit
        descricao.focus();
        return;
    }   

    let quantidade = document.getElementById("quantidade");
    if (quantidade.value <= 0 ){
        alert("Selecione quantidade de produtos!");
        event.preventDefault();
        quantidade.focus();
        return;
    }

    let preco = document.getElementById("preco");
    if (preco.value <= 0){
        alert("Apresente preço válido");
        event.preventDefault();
        preco.focus();
        return;
    }

    let fotoProduto = document.getElementById("fotoProduto");
    if (fotoProduto.value == ""){
        alert ("Inserir foto do produto");
        event.preventDefault();
        fotoProduto.focus();
        return;
    }
    

 
});
