<?php
echo "Exercicio 8" . "<br>";

$numero = 3; // Recebe um número do usuário

echo "Tabuada de $numero:\n"; // Exibe a tabuada do número de 1 a 10
for ($i = 1; $i <= 10; $i++) {
    echo "$numero x $i = " . ($numero * $i) . "\n" . "<br>";
}

?>