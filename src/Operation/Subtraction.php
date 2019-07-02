<?php

namespace Calculator\Operation;


class Subtraction extends BinaryOperation
{
    public function getOperator() {
        return "-";
    }

    protected function selectOperation($a, $b)
    {
        return $a - $b;
    }
}
