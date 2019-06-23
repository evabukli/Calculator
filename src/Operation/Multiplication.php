<?php

namespace Calculator\Operation;


class Multiplication extends BinaryOperation
{
    public function selectOperation($match, $numbers)
    {
        $subResult = $numbers[0] * $numbers[1];

        return $subResult;
    }

}