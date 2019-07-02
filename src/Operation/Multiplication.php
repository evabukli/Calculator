<?php

namespace Calculator\Operation;


class Multiplication extends BinaryOperation
{
    public function getOperator() {
        return "*";
    }

    protected function selectOperation($a, $b)
    {
        return $a* $b;
    }
}
