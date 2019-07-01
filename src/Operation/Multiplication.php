<?php

namespace Calculator\Operation;


class Multiplication extends BinaryOperation
{
    protected function selectOperation($a, $b)
    {
        return $a* $b;
    }
}
