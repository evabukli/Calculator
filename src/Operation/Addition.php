<?php

namespace Calculator\Operation;


class Addition extends BinaryOperation
{
    public function getOperator() {
        return "+";
    }

    protected function selectOperation($a, $b)
    {
        return $a + $b;
    }
}
