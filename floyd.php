<?php

function floyd($matrix, $length)
{   
    $matrixs = array();
    $iterasi = array();

    for($i=0; $i<$length; $i++) {
        for($j=0; $j<$length; $j++) {
            if($i != $j)
                $iterasi[$i][$j] = $j+1;
            else
                $iterasi[$i][$j] = 0;
        }
    }

    for($i=0; $i<$length; $i++) {
        $pivot = $i;
        $flag = 0;

        for($j=0; $j<$length; $j++){
            for($k=0; $k<$length; $k++){
                if($j==$pivot || $k==$pivot)
                    continue;

                $temp = $matrix[$j][$pivot] + $matrix[$pivot][$k];
                if($temp < $matrix[$j][$k]) {
                    $matrix[$j][$k] = $temp;
                    $iterasi[$j][$k] = $i+1;
                }                
            }
            
        }
        echo '---------------- Iterasi ';
        echo $i;
        echo ' ----------------';
        echo '<br>';
        echo '-------------------- D --------------------';
        echo '<br>';
        for($a=0; $a<$length; $a++){
            for($b=0; $b<$length; $b++){
                echo $matrix[$a][$b];

                if($matrix[$a][$b] <10) {
                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                } else if ($matrix[$a][$b]>=10 && $matrix[$a][$b]!=INF ) {
                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                } else {
                    echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
                }
            }
            echo '<br>';
        }
        echo '-------------------- S --------------------';
        echo '<br>';
        for($a=0; $a<$length; $a++){
            for($b=0; $b<$length; $b++){
                echo $iterasi[$a][$b];
                echo "&nbsp;&nbsp;&nbsp;&nbsp;";
            }
            echo '<br>';
        }
        array_push($matrixs, $matrix);
        echo '<br><br>';
    }

    return $matrixs;
}

$nodes = array(
        array(0, 3, 10, INF, INF),
        array(3, 0, INF, 5, INF),
        array(10, INF, 0, 6, 15),
        array(INF, 5, 6, 0, 4),
        array(INF, INF, INF, 4, 0)
);

$hasil = floyd($nodes, 5);

?>