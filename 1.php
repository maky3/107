<?php

function search(array $data, int $number): int {
    $left = 0;
    $right = count($data) - 1;

    while ($left <= $right) {
        $mid = (int) (($left + $right) / 2);

        if ($data[$mid] < $number) {
            $left = $mid + 1;
        } elseif ($data[$mid] > $number) {
            $right = $mid - 1;
        } else {
            return $mid;
        }
    }

    return -1;
}


$data = [1, 6, 7, 10, 25, 100, 124, 145];

echo search($data, 1);
echo search($data, 100);
echo search($data, 124);
echo search($data, 145);