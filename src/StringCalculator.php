<?php


namespace App;

use Exception;

class StringCalculator
{
    const MAX_NUMBER_ALLOWED = 1000;

    protected string $delimiter = ",|\n";

    public function add(string $numbers)
    {
        if (!$numbers) {
            return 0;
        }

        $numbers = $this->parseString($numbers);

        $sum = 0;
        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new Exception('Negative numbers not allowed.');
            }
            if ($number <= self::MAX_NUMBER_ALLOWED) {
                $sum += $number;
            }
        }
        return $sum;
    }

    protected function parseString(string $numbers)
    {
        $customDelimiter = '\/\/(.)\n';
        if (preg_match("/{$customDelimiter}/", $numbers, $matches)) {
            $this->delimiter = $matches[1];

            $numbers = str_replace($matches[0], '', $numbers);
        }

        return preg_split("/{$this->delimiter}/", $numbers);
    }
}
