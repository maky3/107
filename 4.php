<?php

function fiborow(int $limit): string {
    if ($limit < 0) {
        throw new Exception('Limit must be a non-negative integer');
    }

    $fibonacciSequence = [];
    $a = 0;
    $b = 1;

    $fibonacciSequence[] = $a;
    if ($limit > 0) {
        $fibonacciSequence[] = $b;
    }

    while ($b < $limit) {
        $next = $a + $b;
        $a = $b;
        $b = $next;
        $fibonacciSequence[] = $b;
    }

    if (end($fibonacciSequence) > $limit) {
        array_pop($fibonacciSequence);
    }

    return implode(' ', $fibonacciSequence);
}

// Пример использования
try {
    echo fiborow(10); // Вывод: 0 1 1 2 3 5 8
} catch (Exception $e) {
    echo 'Ошибка: ' . $e->getMessage();
}