<?php

    function merge_sort(&$array, $start, $end, $param, $max) {

        if ( $start < $end ) {
            $mid = floor(($start + $end) / 2);

            merge_sort($array, $start, $mid, $param, $max);
            merge_sort($array, ($mid + 1), $end, $param, $max);

            new_merge($array, $start, $mid, $end, $param, $max);
        }
    }

    function new_merge(&$array, $start, $mid, $end, $param, $max) {
        $n1 = $mid - $start + 1;
        $n2 = $end - $mid;

        $left = new SplFixedArray($n1 + 1);
        $right = new SplFixedArray($n2 + 1);

        $left[0] = $array[$start];
        for ($i = 1; $i < $n1; $i++) {
            $left[$i] = $array[$start + $i];
        }
        $left[$n1] = new stdclass;
        $left[$n1]->$param = $max;

        $right[0] = $array[$mid + 1];
        for ($j = 1; $j < $n2; $j++) {
            $right[$j] = $array[ $mid + $j + 1];
        }
        $right[$n2] = new stdclass;
        $right[$n2]->$param = $max;

        $i = 0;
        $j = 0;
        $k = 0;

        for ($k = $start; $k <= $end; $k++) {
            if($left[$i]->$param <= $right[$j]->$param) {
                $array[$k] = $left[$i];
                $i++;
            } else {
                $array[$k] = $right[$j];
                $j++;
            }
        }

        return $array;
    }
?>
