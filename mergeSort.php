<?php
/**
 * Merge Sort for an indexed array
 * @param {array} $arr - an array passed by reference
 * @param {int} $size - the size of the array
 * @return {array} $arr - the sorted indexed array
 */ 
function mergeSort(&$arr, $size) {
    if ($size === 1 || $size <= 0) {
        return $arr; // size 1 is sorted by definition
    }

    $mid = $size / 2; // Odd numbers will become a float
    $mid = intval($mid, 10); // base 10 to cast to an int

    $arrA = array_slice($arr, 0, $mid);
    $arrB = array_slice($arr, $mid);

    mergeSort($arrA, count($arrA));
    mergeSort($arrB, count($arrB));

    $arr = merge($arrA, $arrB);
    return $arr;
}

function merge($arrA, $arrB) {
    $sorted = array();
    $arrALength = count($arrA);
    $arrBLength = count($arrB);

    for ($a = 0, $b = 0; $a < $arrALength || $b < $arrBLength;) {
        if ($a < $arrALength && $b < $arrBLength) {
            if ($arrA[$a]<= $arrB[$b]) {
                $sorted[] = $arrA[$a];
                $a++;
            } else {
                $sorted[] = $arrB[$b];
                $b++;
            }
        } elseif ($a < $arrALength && !($b < $arrBLength)) {
            $sorted[] = $arrA[$a];
            $a++;
        } elseif (!($a < $arrALength) && $b < $arrBLength) {
            $sorted[] = $arrB[$b];
            $b++;
        }
    }

    return $sorted;
}