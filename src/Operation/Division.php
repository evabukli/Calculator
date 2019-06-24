<?php

namespace Calculator\Operation;


class Division extends BinaryOperation
{
    protected function selectOperation($match, $numbers, $operator)
    {
        return (float)$numbers[0] / (float)$numbers[1];
    }

}