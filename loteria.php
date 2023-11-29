<?php

function escolherJogo()
{
    echo "Escolha o jogo:\n";
    echo "1 - Mega Sena\n";
    echo "2 - Quina\n";
    echo "3 - Lotomania\n";
    echo "4 - Lotofácil\n";

    $opcao = (int) readline("Opção: ");
    
    switch ($opcao) {
        case 1:
            return ["Mega Sena", 6, 60];
        case 2:
            return ["Quina", 5, 80];
        case 3:
            return ["Lotomania", 50, 100];
        case 4:
            return ["Lotofácil", 15, 25];
        default:
            echo "Opção inválida. Tente novamente.\n";
            return escolherJogo();
    }
}

function gerarAposta($min, $max, $quantidade)
{
    $aposta = [];

    while (count($aposta) < $quantidade) {
        $numero = rand($min, $max);
        if (!in_array($numero, $aposta)) {
            $aposta[] = $numero;
        }
    }

    sort($aposta);

    return $aposta;
}

function exibirAposta($aposta)
{
    echo "Aposta: " . implode(', ', $aposta) . "\n";
}

function jogarLoteria($jogo)
{
    echo "Jogando {$jogo[0]}...\n";
    
    $numDezenas = (int) readline("Quantas dezenas para {$jogo[0]}? ({$jogo[1]} a {$jogo[2]}): ");
    $numApostas = (int) readline("Quantas apostas deseja gerar? ");

    for ($i = 1; $i <= $numApostas; $i++) {
        $aposta = gerarAposta(1, $jogo[2], $numDezenas);
        exibirAposta($aposta);
    }
}

$jogoEscolhido = escolherJogo();
jogarLoteria($jogoEscolhido);
?>
