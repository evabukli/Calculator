<?php

namespace Calculator\Operation;


abstract class BinaryOperation
{
    public function useOperation($input, $matches, $operator)
    {
        foreach ($matches[0] as $match) {

            $numbers = explode($operator, $match);

            if (isset($numbers[2])) {
                // hack for -3 - 5
                $numbers[0] = -$numbers[1];
                $numbers[1] = $numbers[2];
            }

            $subResult = $this->selectOperation((float)$numbers[0], (float)$numbers[1]);

            $input = str_replace($match, $subResult, $input);
        }
        return $input;
    }

    abstract protected function selectOperation($a, $b);

}
