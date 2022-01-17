<?php


namespace App\Repositories;


class MaxSumRepository {

    public function maxSumArray($options) {

        //declaração das variaveis
        $options = $options['list'];
        $positions = [];
        $push = [];
        $sum = 0;
        $positionFinal = [];
        $initia = 1;
        if (max($options) > 0){
            //for para fazer a soma de todas as posições do array e separar em um sub_array
            for ($i = 0; $i < count($options); $i++) {
                $sum = $options[$i];
                array_push($push, $options[$i]);

                for ($j = $i + 1; $j < count($options); $j++) {
                    $sum += $options[$j];
                    array_push($push, $sum);
                }
                array_push($positions, $push);
                $sum = 0;
                $push = [];
            }

            $sumTotal = $positions[0][0];
            $positionInitialSum = 0;

            //for para pegar a maior soma dos subArray
            // maior soma, a posicao que ele está
            for ($i = 0; $i < count($positions); $i++) {
                for ($j = 1; $j < count($positions[$i]); $j++) {
                    if ($positions[$i][$j] > $sumTotal) {
                        $sumTotal = $positions[$i][$j];
                        $position = $j;
                        $positionInitialSum = $i;
                    }
                }
            }

            //pegar a posicao correta no array original
            // obs acrescentei +1 e +2 para voltar o numero de casas igual o exercicio(o vetor começa da posicao 1)
            array_push($positionFinal,$positionInitialSum+1);
            for ($i = $positionInitialSum; $i <= $position; $i++){
                array_push($positionFinal, $i+2);
            }
            return ['sum' => $sumTotal, 'positions' => $positionFinal];
        }

        return ['sum' => max($options), 'positions' => array_search(max($options),$options) +1];


    }
}
