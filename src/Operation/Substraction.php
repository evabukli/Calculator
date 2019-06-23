<?php

namespace Calculator\Operation;


class Substraction extends BinaryOperation
{
    public function selectOperation($match)
    {
        $numbers = explode("-", $match);

        if (!isset($numbers[2])) {
            $subResult = (float)$numbers[0] - (float)$numbers[1];
        } else {
            $subResult = (float)-$numbers[1] - (float)$numbers[2];
        };

        return $subResult;
    }

}