<?php

namespace Calculator\Operation;


class Substraction extends BinaryOperation
{
    protected function selectOperation($match, $numbers)
    {
        if (!isset($numbers[2])) {
            return(float)$numbers[0] - (float)$numbers[1];
        } else {
            return (float)-$numbers[1] - (float)$numbers[2];
        }
    }

}