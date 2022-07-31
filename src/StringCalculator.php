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

        $items = $this->splitNumbers($numbers);
        return count($items) == 1 ? $numbers : array_sum($items);
    }

    /**
     * Splits the string of numbers based on internal delimiters
     * if none are provided within the string.
     *
     * @param string $numbers
     * @return array
     */
    protected function splitNumbers(string $numbers): array
    {
        $delimiters = $this->defaultDelimiters;
        if (substr($numbers, 0, 2) === $this->delimiterInidicator) {
            $customDelim = substr($numbers, 2, 1);
            $needle = str_replace($this->delimiterInidicator . $customDelim, '', $numbers);
            $numbers = str_replace("\\n", "", $needle);
            $items = explode($customDelim, $numbers);
        } else {
            $items = preg_split('/[' . implode(',', $delimiters) . ']/', $numbers);
        }
        return $items;
    }

}