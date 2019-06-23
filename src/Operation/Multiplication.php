<?php

namespace Calculator\Operation;


class Multiplication extends BinaryOperation
{
    protected function selectOperation($match, $numbers)
    {
        return (float)$numbers[0] * (float)$numbers[1];
    }

}