<?php

// 1. Função que recebe um nome e exibe uma mensagem de boas-vindas
function boasVindas($nome) {
    echo "Bem-vindo, $nome!\n";
}
// "\n": Esse é um caractere de nova linha (quebra de linha), para que cada multiplicação seja exibida em uma linha diferente

// 2. Função que recebe dois números e retorna a diferença entre eles
function diferenca($num1, $num2) {
    return abs($num1 - $num2); // abs() retorna o valor absoluto da diferença
}

// 3. Função que recebe um número e informa se ele é par ou ímpar
function parOuImpar($numero) {
    return ($numero % 2 == 0) ? "Par" : "Ímpar"; //? usadado para simplicar em uma linha p operador ternário
}
// OU :
//     return "Par";
// } else {
//     return "Ímpar";
// }

// 4. Função que recebe um número e retorna a tabuada desse número (1 a 10)
function tabuada($numero) {
    for ($i = 1; $i <= 10; $i++) {
        echo "$numero x $i = " . ($numero * $i) . "\n";
    }
}

// $numero x $i = ": Isso cria uma string que mostra a operação de multiplicação. O $numero será o número para o qual estamos gerando a tabuada, e $i será o número da multiplicação (de 1 a 10).
//($numero * $i): Esta parte calcula o produto do número fornecido com o valor atual de $i. Ou seja, para cada iteração, ele multiplica o $numero pelo valor de $i (que vai de 1 até 10).


// 5. Função que recebe um array de números e retorna a soma de seus elementos
function somaArray($numeros) {
    return array_sum($numeros); // array_sum() soma os valores de um array
}

// 6. (Repetição do exercício 4, já implementado como tabuada())

// 7. (Repetição do exercício 5, já implementado como somaArray())

// 8. Função que gera e retorna um array com 10 números aleatórios
function gerarNumerosAleatorios() {
    $numeros = [];
    for ($i = 0; $i < 10; $i++) {
        $numeros[] = rand(1, 100); // rand gera números aleatórios entre 1 e 100
    }
    return $numeros;
}

// 9. Função que recebe um número e retorna seu fatorial
function fatorial($numero) {
    if ($numero < 0) return "Número inválido"; // Fatoriais negativos não existem
    $fatorial = 1;
    for ($i = 1; $i <= $numero; $i++) {
        $fatorial *= $i;  //A cada iteração, o valor de $fatorial é multiplicado pelo valor de $i
    }
    return $fatorial;
}

// Chamadas das funções
echo "\nTestando funções:\n";
boasVindas("Maria");
echo "Diferença: " . diferenca(10, 3) . "\n";
echo "Número 7 é " . parOuImpar(7) . "\n";
tabuada(5);
echo "Soma do array: " . somaArray([1, 2, 3, 4, 5]) . "\n";
echo "Números aleatórios: ";
print_r(gerarNumerosAleatorios());
echo "Fatorial de 5: " . fatorial(5) . "\n";

?>
