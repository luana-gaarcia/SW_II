<?php
echo "Exercicio 2" . "<br>";

$numero = 519;

if ($numero > 0) {  //se número for maior que zero
    echo "O número $numero é positivo."; //vai aparecer na tela que numero é positivo
} else if ($numero < 0) { //porem (else) se (vai conferir if) é negativo
    echo "O número $numero é negativo."; //vai mostrar que o número é negativo
} else { //se não o número é zero
    echo "O número $numero é zero.";
}

?>