<?php

// Exercício 1 - Criar um JSON a partir de um array e salvar em um arquivo
// Criamos um array associativo com informações de 3 produtos
$produtos = [
    ["nome" => "Produto A", "preco" => 10.50, "quantidade" => 5],
    ["nome" => "Produto B", "preco" => 20.30, "quantidade" => 3],
    ["nome" => "Produto C", "preco" => 15.00, "quantidade" => 8]
];

// Convertemos o array para JSON com json_encode()
$jsonProdutos = json_encode($produtos, JSON_PRETTY_PRINT);

// Salvamos o JSON no arquivo produtos.json
file_put_contents("produtos.json", $jsonProdutos);

echo "Arquivo produtos.json criado com sucesso!<br>";

// Exercício 2 - Ler um arquivo JSON e exibir os dados na tela
// Lemos o conteúdo do arquivo usuarios.json
$usuariosJson = file_get_contents("usuarios.json");

// Convertamos o JSON para um array associativo PHP
$usuarios = json_decode($usuariosJson, true);

echo "<h3>Lista de Usuários:</h3>";

// Percorremos o array e exibimos nome e email de cada usuário
foreach ($usuarios as $usuario) {
    echo "Nome: " . $usuario["nome"] . " - Email: " . $usuario["email"] . "<br>";
}

// Exercício 3 - Adicionar um novo item ao arquivo JSON existente
// Criamos um novo produto
$novoProduto = ["nome" => "Produto D", "preco" => 25.99, "quantidade" => 4];

// Adicionamos o novo produto ao array de produtos
$produtos[] = $novoProduto;

// Convertamos o array atualizado para JSON
$jsonProdutos = json_encode($produtos, JSON_PRETTY_PRINT);

// Salvamos de volta no arquivo produtos.json
file_put_contents("produtos.json", $jsonProdutos);

echo "Novo produto adicionado com sucesso!<br>";

// Exercício 4 - Buscar um item dentro do JSON
// Definimos o email a ser buscado (pode ser recebido via $_GET)
$emailBuscado = "usuario@example.com"; // Pode ser substituído por $_GET['email']

// Inicializamos a variável para armazenar o usuário encontrado
$usuarioEncontrado = null;

// Percorremos o array buscando o usuário com o email informado
foreach ($usuarios as $usuario) {
    if ($usuario["email"] === $emailBuscado) {
        $usuarioEncontrado = $usuario;
        break; // Paramos a busca assim que encontramos o usuário
    }
}

// Exibimos os dados do usuário se encontrado, caso contrário, mostramos erro
if ($usuarioEncontrado) {
    echo "Usuário encontrado: Nome: " . $usuarioEncontrado["nome"] . " - Email: " . $usuarioEncontrado["email"] . "<br>";
} else {
    echo "Usuário não encontrado.<br>";
}

// Exercício 5 - Remover um item de um arquivo JSON
// Definimos o nome do produto a ser removido
$nomeProdutoRemover = "Produto B";

// Filtramos o array removendo o produto que corresponde ao nome definido
$produtos = array_filter($produtos, function ($produto) use ($nomeProdutoRemover) {
    return $produto["nome"] !== $nomeProdutoRemover;
});

// Reindexamos o array após a remoção e convertemos para JSON
$jsonProdutos = json_encode(array_values($produtos), JSON_PRETTY_PRINT);

// Salvamos o JSON atualizado no arquivo produtos.json
file_put_contents("produtos.json", $jsonProdutos);

echo "Produto removido com sucesso!<br>";

?>
