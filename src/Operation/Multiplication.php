<?php

namespace Calculator\Operation;


class Multiplication extends BinaryOperation
{
    public function getOperator() {
        return "*";
    }

    public function selectOperation($a, $b)
    {
        return $a* $b;
    }
}
