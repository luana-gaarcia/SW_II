<?php

// Array para armazenar os números pares
$pares = [];

// Loop de 1 a 20
for ($i = 1; $i <= 20; $i++) {
    if ($i % 2 == 0) { // Verifica se o número é par
        $pares[] = $i; // Adiciona o número par ao array
    }
}

// Exibe a lista de números pares
echo "Números pares de 1 a 20: " . implode(", ", $pares)
?>


