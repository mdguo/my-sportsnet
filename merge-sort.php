<?php
    /*
     * merge sorts an array
     * sorts from index $start to $end
     * by order of ascending
     */
    function merge_sort(&$array, $start, $end) {
        if ( $start < $end ) {
            $mid = floor(($start + $end) / 2);

            merge_sort($array, $start, $mid);
            merge_sort($array, ($mid + 1), $end);

            merge($array, $start, $mid, $end);
        }
    }

    /*
     * splits $array into two sub-arrays
     * merges the two subarrays into a larger sorted array
     * merge from index $start to $end
     */

    function merge(&$array, $start, $mid, $end) {
        $n1 = $mid - $start + 1;
        $n2 = $end - $mid;

        $left = new SplFixedArray($n1 + 1);
        $right = new SplFixedArray($n2 + 1);

        $left[0] = $array[$start];
        for ($i = 1; $i < $n1; $i++) {
            $left[$i] = $array[$start + $i];
        }
        $left[$n1] = 100;

        $right[0] = $array[$mid + 1];
        for ($j = 1; $j < $n2; $j++) {
            $right[$j] = $array[ $mid + $j + 1];
        }
        $right[$n2] = 100;

        $i = 0;
        $j = 0;
        $k = 0;

        for ($k = $start; $k <= $end; $k++) {
            if($left[$i] <= $right[$j]) {
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
