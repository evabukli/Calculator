<?php

namespace Calculator\Operation;


class Division extends BinaryOperation
{
    public function selectOperation($match, $numbers)
    {
        $subResult = $numbers[0] / $numbers[1];

        return $subResult;
    }

}