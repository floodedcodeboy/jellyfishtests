<?php

class StringCalculator
{
    private array $defaultDelimiters = ['|', ','];

    private string $delimiterInidicator = '//';

    /**
     * Returns the sum  of the numbers in the given string
     *
     * @param string $numbers
     * @return int
     */
    public function add(string $numbers): int
    {
        if ($numbers == '') {
            return 0;
        }

        $items = explode(',', $numbers);

        return count($items) == 1 ? $numbers : array_sum($items);
    }

}