<?php

function weekend(string $begin, string $end) : int {
    $beginTimestamp = strtotime($begin);
    $endTimestamp = strtotime($end);

    if ($beginTimestamp > $endTimestamp) {
        return 0;
    }

    $weekendDays = 0;

    $firstSaturday = strtotime('saturday', $beginTimestamp);
    if ($firstSaturday < $beginTimestamp) {
        $firstSaturday = strtotime('saturday +1 week', $beginTimestamp);
    }

    $firstSunday = strtotime('sunday', $beginTimestamp);
    if ($firstSunday < $beginTimestamp) {
        $firstSunday = strtotime('sunday +1 week', $beginTimestamp);
    }

    while ($firstSaturday <= $endTimestamp) {
        $weekendDays++;
        if ($firstSunday <= $endTimestamp) {
            $weekendDays++;
        }
        $firstSaturday = strtotime('+1 week', $firstSaturday);
        $firstSunday = strtotime('+1 week', $firstSunday);
    }

    if ($beginTimestamp == $endTimestamp && (date('w', $beginTimestamp) != 6 && date('w', $beginTimestamp) != 0)) {
        $weekendDays = 0;
    }

    return $weekendDays;
}

// Пример использования
echo weekend('06.01.2024', '07.01.2024'); // Вернет 0, если дата не попадает на выходные

