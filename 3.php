<?php

function rgb(int $r, int $g, int $b): int {
    if ($r < 0 || $r > 255 || $g < 0 || $g > 255 || $b < 0 || $b > 255) {
        throw new Exception('Color components must be in the range 0-255');
    }

    $rgb = ($r << 16) | ($g << 8) | $b;

    return $rgb;
}

// Пример использования
try {
    echo rgb(255, 0, 255); // Вывод: 16711935
} catch (Exception $e) {
    echo 'Ошибка: ' . $e->getMessage();
}