<?php

namespace Calculator\Operation;


class Division extends BinaryOperation
{
    public function selectOperation($match)
    {
        $numbers = explode("/", $match);

        $subResult = (float)$numbers[0] / (float)$numbers[1];

        return $subResult;
    }

}