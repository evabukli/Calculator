<?php

namespace Calculator\Operation;


abstract class BinaryOperation
{
    public function useOperation($input, $matches)
    {
        foreach ($matches[0] as $match) {

            $numbers = explode($this->getOperator(), $match);

            if (isset($numbers[2])) {
                // hack for -3 - 5
                $numbers[0] = -$numbers[1];
                $numbers[1] = $numbers[2];
            }

            $a = (float)$numbers[0];
            $b = (float)$numbers[1];
            $subResult = $this->selectOperation($a, $b);

            $input = str_replace($match, $subResult, $input);
        }
        return $input;
    }

    abstract public function getOperator();

    abstract public function selectOperation($a, $b);

}
