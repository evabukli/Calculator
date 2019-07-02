<?php

namespace Calculator\Operation;


class Division extends BinaryOperation
{
    public function getOperator() {
        return "/";
    }

    protected function selectOperation($a, $b)
    {
        return $a / $b;
    }
}
