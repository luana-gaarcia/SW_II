<?php
echo "Exercicio 4" . "<br>";

 $opcao = 2; //variavel opcao
switch ($opcao) { // seleciona a opcao que foi requerida, mas em passas
    case 1: // primeira opção
        echo "Número 01 escolhida"; // texto da opção
        break; // se essa foi a requerida, quebra-para aqui
    case 2: // se não, vai para a próxima opção, número 2
        echo "Número 02 escolhida"; 
        break;// se essa foi a requerida, quebra-para aqui
    case 3: // se não, vai para a próxima opção, número 3
        echo "Contato escolhido";
        break; // se essa foi a requerida, quebra-para aqui
    default: // Caso o cliente não tenha selecionado nenhuma opção da lista, usamos para mostrar que é inválido
        echo "Opção inválida";
} 
?>
