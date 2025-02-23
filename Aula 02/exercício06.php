echo "Exercicio 6" . "<br>";

$soma = 0;

for ($i = 1; $i <= 50; $i++) {
    $soma += $i;
}

echo "A soma dos números de 1 a 50 é: " . $soma;

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

echo "Exercicio 7" . "<br>";

$nomes = ["Ana", "Bruno", "Carlos", "Lucas", "Anderson", "Luana", "Vinicius", "Raphaela"]; 
foreach ($nomes as $nome) {
    echo "Nome: $nome " . "<br>";
}
