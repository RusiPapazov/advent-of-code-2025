<?php

declare(strict_types=1);

$input = file_get_contents('./input-day3');

function findLargestDigit(string $bank): int {
    $largestDigit = -1;
    for ($potentialNumber = 9; $potentialNumber >= 0; $potentialNumber--) {
        if (str_contains($bank, (string) $potentialNumber)) {
            return $potentialNumber;
        }
    }

    return $largestDigit;
}

$totalJoltage = 0;
$banks = explode("\n", $input);

foreach ($banks as $bank) {
    $firstDigit = findLargestDigit($bank);
    $largestDigitPos = strpos($bank, (string) $firstDigit);
    if ($largestDigitPos === strlen($bank) - 1) {
        $secondDigit = $firstDigit;
        $firstDigit = findLargestDigit(substr($bank, 0, -1));
        $largestDigitPos = strpos($bank, (string) $firstDigit);
    } else {
        $secondDigit = findLargestDigit(substr($bank, $largestDigitPos + 1));
    }

    $currentJoltage = $firstDigit * 10 + $secondDigit;

    echo "Bank: " . $bank . "\n \tcurrent Joltage: " . $totalJoltage . "\n";
    echo "\t adding " . $currentJoltage . "\n";

    $totalJoltage += $currentJoltage;
    echo "\t new joltage = " . $totalJoltage . "\n";
}

echo $totalJoltage;
