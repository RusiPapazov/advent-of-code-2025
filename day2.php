<?php

declare(strict_types=1);

$input = file_get_contents('./input');

$rows = explode("\n", $input);

$totalPositions = 100;
$zeroesCount = 0;
$currentPosition = 50;

foreach ($rows as $row) {
    $direction = $row[0];
    $distance = (int) substr($row, 1);
    $steps = $distance;
    $distance = $direction === 'L' ? $distance * -1 : $distance;
    $diff = $direction === 'L' ? -1 : 1;
    for ($i = 0; $i < $steps; $i++) {
        $currentPosition += $diff;
        $currentPosition %= $totalPositions;
        if ($currentPosition === 0) {
            $zeroesCount++;
        }
    }
}

echo $zeroesCount;
