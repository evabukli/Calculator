<?php

namespace Calculator\Operation;


class Subtraction extends BinaryOperation
{
    protected function selectOperation($a, $b)
    {
        return $a - $b;
    }
}
