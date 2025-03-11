<?php
echo "Exercicio 1" . "<br>";
// a) Crie um array associativo chamado $pessoa com as seguintes chaves: nome, idade, cidade. OK
$pessoa = array("Nome" => "Luana", "Idade" => "Luana", "Cidade" => "RP");
// b) Adicione uma nova chave chamada profissao ao array. OK
$profissao[] = "TI";
// c) Crie um array indexado chamado $amigos com os nomes de três amigos.
$amigos = array("Garcia", "Murilo", "Jacare");
// d) Combine os arrays $pessoa e $amigos em um novo array chamado $dados.
$dados = array_merge($pessoa, $amigos);
// e) Exiba o conteúdo do array $dados usando print_r.
print_r($dados);

echo "<br>";
echo "<br>";

echo "Exercicio 2" . "<br>"; 
// Crie um array com 10 números inteiros. Use um laço de repetição para calcular a soma de todos os elementos do array e exiba o resultado.
$inteiros = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
$soma = 0;

foreach($inteiros as $inteiro) {
    $soma += $inteiro;
}
echo "A soma é:" . $soma;

echo "<br>";
echo "<br>";

echo "Exercicio 3" . "<br>"; 
// Crie um array com 8 números inteiros.
$numeros = array(1, 2, 3, 4, 5, 6, 7, 8);
$maior = $numeros[0];
$menor = $numeros[0];

//Use um laço de repetição para encontrar o maior e o menor valor no array e exiba ambos.
foreach ($numeros as $numero) {
    if ($numero > $maior) {
        $maior = $numero;
    }
    if ($numero < $menor) {
        $menor = $numero;
    }
}

echo "Maior valor: " . $maior . "<br>";
echo "Menor valor: " . $menor;

echo "<br>";
echo "<br>";

// Exercício 4
// Crie um array com 15 números inteiros. 
$numeros = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
$pares = 0;
$impares = 0;

// Use um laço de repetição para contar quantos números são pares e quantos são ímpares. Exiba os resultados.
foreach ($numeros as $numero){
    if ($numero % 2 == 0) {
        $pares++;
    }
    else {
        $impares++;
    }
}

echo "Pares: " . $pares . "<br>";
echo "Ímpares: " . $impares;


// Exercício 5 
// 4 pessoas
// Crie um array associativo onde cada chave é o nome de um aluno e o valor é a sua
// nota.Use um laço de repetição para calcular a média das notas e exiba o resultado.
// Dicas para Resolução:
// • Use for ou foreach para percorrer os arrays.
// • Utilize funções como count() para determinar o tamanho do array.
// • Para arrays associativos, lembre-se de acessar as chaves e valores corretamente.

$notas = [
    'João' => 8.5,
    'Maria' => 9.0,
    'Carlos' => 7.5,
    'Ana' => 6.0
];

$somaNotas = 0;
$count = count($notas);

foreach ($notas as $nome => $nota) {
    $somaNotas += $nota;
}

$media = $somaNotas / $count;
echo "A média das notas é: " . $media;





// Desafio Extra
// Modifique o Exercício 5 para exibir o nome do aluno com a maior nota. Use um laço
// de repetição para encontrar essa informação


$notas = [
    'João' => 8.5,
    'Maria' => 9.0,
    'Carlos' => 7.5,
    'Ana' => 6.0
];

$maiorNota = max($notas); // Encontra a maior nota
$alunoMaiorNota = array_search($maiorNota, $notas); // Encontra o nome do aluno com a maior nota

echo "O aluno com a maior nota é: " . $alunoMaiorNota;

?>