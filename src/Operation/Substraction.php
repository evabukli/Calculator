<?php

namespace Calculator\Operation;


class Substraction extends BinaryOperation
{
    public function selectOperation($match, $numbers)
    {
        if (!isset($numbers[2])) {
            $subResult = $numbers[0] - $numbers[1];
        } else {
            $subResult = -$numbers[1] - $numbers[2];
        };

        return $subResult;
    }

}