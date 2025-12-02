<?php

declare(strict_types=1);

$input = file_get_contents('../input');

$rows = explode("\n", $input);

$totalPositions = 100;
$zeroesCount = 0;
$currentPosition = 50;

foreach ($rows as $row) {
    $direction = $row[0];
    $distance = (int) substr($row, 1);
    if ($direction === 'L') {
        $currentPosition -= $distance;
    } elseif ($direction === 'R') {
        $currentPosition += $distance;
    }
    $currentPosition %= $totalPositions;
    if ($currentPosition === 0) {
        $zeroesCount++;
    }

}

echo $zeroesCount;
