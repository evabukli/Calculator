<?php

namespace Calculator\Operation;


class Addition extends BinaryOperation
{
    public function selectOperation($match)
    {
        $numbers = explode("+", $match);

        $subResult = (float)$numbers[0] + (float)$numbers[1];

        return $subResult;
    }

}